<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourierController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->has('type') ? $request->type : '';
        // $ordersAvailable = [];
        $ordersConfirm = [];
        $orderEdit = [];
        if ($type === 'confirm' || $type === '') {
            $ordersConfirm = auth('courier')->user()->orders
                // ->whereIn('status', ['Menunggu Kurir', 'Proses Pengiriman', 'Proses Pegembalian']);
                ->all();
        }
        // else if ($type === 'available') {
        //     $ordersAvailable = Order::all()->whereNull('courier_id');
        // }

        if ($request->has('order')) {
            $order = $request->order;
            $orderEdit = Order::where('id', $order)->where('courier_id', auth('courier')->user()->id)->whereIn('status', ['Menunggu Kurir'])->first();
            $type = 'input';
        } else {
            $order = null;
        }
        // dd($orderEdit);
        // dd($type);
        return view('courier.index', [
            'ordersConfirm' => $ordersConfirm,
            // 'ordersAvailable' => $ordersAvailable,
            'type' => $type,
            'order' => $order,
            'orderEdit' => $orderEdit,
        ]);
    }

    public function setting()
    {
        return view('courier.setting');
    }

    public function profile()
    {
        return view('courier.profile');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'license_plate' => 'required',
            'avatar.*' => 'image'
        ]);

        $avatarUrl = null;
        if ($request->file('avatar')) {
            $request->file('avatar')->move(
                'storage/avatars',
                auth('courier')->user()->id . '_' . now()->format('d-m-Y')
            );
            if (auth('courier')->user()->avatar)
                Storage::disk('local')->delete(auth('courier')->user()->avatar);
            $avatarUrl = 'storage/avatars/' . auth('courier')->user()->id . '_' . now()->format('d-m-Y');
        }

        auth('courier')->user()->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'license_plate' => $request->license_plate,
            'avatar' => $avatarUrl,
        ]);

        return redirect()->route('courier.setting');
    }

    public function address()
    {
        return view('courier.profile');
    }
}
