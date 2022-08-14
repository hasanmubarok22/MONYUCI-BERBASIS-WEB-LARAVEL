<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Courier;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    public function indexCustomer()
    {
        $orders =  auth()->user()->orders()->latest()->get();
        // dd($orders);
        return view('customer.orders', ['orders' => $orders]);
    }

    public function indexLaundry(Request $request)
    {
        if ($request->has('search')) {
            $orders =  auth('laundry')->user()->orders()->whereHas('user', function (Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('username', 'like', '%' . $request->search . '%');
            })->orWhereHas('courier', function (Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('username', 'like', '%' . $request->search . '%');
            })->orWhereHas('address', function (Builder $query) use ($request) {
                $query->where('province', 'like', '%' . $request->search . '%')
                    ->orWhere('city', 'like', '%' . $request->search . '%')
                    ->orWhere('district', 'like', '%' . $request->search . '%')
                    ->orWhere('other', 'like', '%' . $request->search . '%')
                    ->orWhere('zipcode', 'like', '%' . $request->search . '%');
            })->orWhere('status', 'like', '%' . $request->search . '%')
                ->orWhere('notes', 'like', '%' . $request->search . '%')
                ->orWhere('total_cost', 'like', '%' . $request->search . '%')
                ->get()->where('laundry_id', auth('laundry')->user()->id);
            // dd($orders);
            $search = $request->search;
            $type = null;
        } else {
            if ($request->has('type')) {
                $orders =  auth('laundry')->user()->orders()->where('status', $request->type)->get();
                if ($request->type === 'Diterima Penatu')
                    $orders =  auth('laundry')->user()->orders()->whereIn('status', [$request->type, 'Proses Pencucian'])->get();
                $type = $request->type;
                $search = '';
            } else {
                $orders =  auth('laundry')->user()->orders;
                $type = '';
                $search = '';
            }
        }
        // dd($orders);
        return view('laundry.orders', ['orders' => $orders, 'type' => $type, 'search' => $search]);
    }

    public function create()
    {
        $cart = auth()->user()->cart()->first();
        // dd($cart);
        $address = auth()->user()->address()->first();
        return view('order.create', ['cart' => $cart, 'address' => $address]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'pickedup_at' => 'required|date',
            'total_cost' => 'required|numeric',
            'city' => 'required',
            'province' => 'required',
            'district' => 'required',
            'zipcode' => 'required',
        ]);

        $order = new Order([
            'total_cost' => $request->total_cost,
            'pickedup_at' => $request->pickedup_at,
            'status' => 'Menunggu Kurir',
        ]);
        $serve = collect([]);
        foreach (auth()->user()->cart->services as $service) {
            $serve->put($service->id, ['quantity' => $service->pivot->quantity]);
        }
        $order->user()->associate(auth()->user());
        $order->address()->associate(auth()->user()->address);
        // dd(auth()->user()->cart->services);
        $order->laundry()->associate(auth()->user()->cart->services[0]->laundry);
        $order->courier()->associate(Courier::all()->random(1)->first());
        $order->save();
        $order->services()->attach($serve);
        auth()->user()->address()->update([
            'city' => $request->city,
            'province' => $request->province,
            'district' => $request->district,
            'zipcode' => $request->zipcode,
            'other' => $request->other,
        ]);

        return redirect()->route('order');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->status,
        ]);
    }

    public function updateConfirmation(Order $order, Request $request)
    {
        // dd($request->all());
        $order->services()->sync($request->quantity);
        return redirect()->route('courier.index');
    }
}
