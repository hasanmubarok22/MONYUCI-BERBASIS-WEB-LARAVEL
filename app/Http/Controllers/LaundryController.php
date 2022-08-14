<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Bankaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class LaundryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $laundries = Laundry::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('username', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('operational_start', 'like', '%' . $request->search . '%')
                ->orWhere('operational_end', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhereHas('services', function (Builder $query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('price', 'like', '%' . $request->search . '%')
                        ->orWhere('type', 'like', '%' . $request->search . '%')
                        ->orWhere('unit', 'like', '%' . $request->search . '%');
                })->with('address')
                ->paginate(10);
        } else {
            $search = null;
            $laundries = Laundry::with('address')->paginate(10);
            // foreach ($laundries as $laundry) {
            //     dump('laundry');
            //     dump($laundry->address->first()->compact());
            // }
            // dd();
        }
        return view('laundry.index', ['laundries' => $laundries, 'search' => $search]);
    }

    public function show(Laundry $laundry, Request $request)
    {
        $comment = $request->has('comment') ? $request->comment : null;
        $services = $laundry->services()->get()->groupBy('type')->sortKeys();
        $address = $laundry->address()->get();
        return view(
            'laundry.show',
            [
                'laundry' => $laundry, 'services' => $services, 'address' => $address, 'comment' => $comment,
                'type' => $request->type,
            ],
        );
    }

    public function updateComment(Request $request, Laundry $laundry)
    {
        $laundry->comments()->attach(auth()->user()->id, [
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);
        if ($request->has('alert') && $request->alert === 'without redirect') return;
        return redirect()->route('laundry.show', ['laundry' => $laundry, 'type' => 'review']);
    }

    public function dashboard()
    {
        $orderCount = auth('laundry')->user()->orders->countBy('status');
        return view('laundry.dashboard', ['orderCount' => $orderCount]);
    }

    public function finance()
    {
        $bankaccounts = auth('laundry')->user()->bankaccounts;
        foreach ($bankaccounts as $bankaccount) {
            if ($bankaccount->hasLabel('Main')) {
                break;
            }
        }
        $yetFinance = auth('laundry')->user()->orders->where('status', 'Proses Pengembalian')->sum('total_cost');
        $finance = auth('laundry')->user()->orders->where('status', 'Diterima Pelanggan')->sum('total_cost');
        $thismonth = auth('laundry')->user()->orderThisMonth()->sum('total_cost');
        return view('laundry.finance', ['yetFinance' => $yetFinance, 'finance' => $finance, 'thismonth' => $thismonth, 'bankaccount' => $bankaccount]);
    }

    public function bankaccount()
    {
        return view('laundry.bankaccount');
    }

    public function bankaccountEdit(Bankaccount $bankaccount)
    {
        return view('laundry.bankaccount-edit', ['bankaccount' => $bankaccount]);
    }

    public function bankaccountUpdate(Request $request, Bankaccount $bankaccount)
    {
        $this->validate($request, [
            'card_holder' => 'required',
            'card_type' => 'required',
            'card_number' => 'required',
            'card_branch' => 'required',
            'card_city' => 'required',
        ]);

        $bank = $bankaccount->update([
            'card_holder' => $request->card_holder,
            'card_type' => $request->card_type,
            'card_number' => $request->card_number,
            'card_branch' => $request->card_branch,
            'card_city' => $request->card_city,
        ]);

        if ($request->has('main')) {
            foreach (auth('laundry')->user()->bankaccounts as $bank) {
                $bank->hasLabelToDetach('Main');
            }
            $bankaccount->assignLabel('Main');
        }

        return redirect()->route('laundry.bank');
    }

    public function bankaccountCreate()
    {
        return view('laundry.bankaccount-create');
    }

    public function bankaccountStore(Request $request)
    {
        $this->validate($request, [
            'card_holder' => 'required',
            'card_type' => 'required',
            'card_number' => 'required',
            'card_branch' => 'required',
            'card_city' => 'required',
        ]);

        auth('laundry')->user()->bankaccounts()->create([
            'card_holder' => $request->card_holder,
            'card_type' => $request->card_type,
            'card_number' => $request->card_number,
            'card_branch' => $request->card_branch,
            'card_city' => $request->card_city,
        ]);

        return redirect()->route('laundry.bank');
    }

    public function profile()
    {
        return view('laundry.profile');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'avatar.*' => 'image'
        ]);

        $avatarUrl = null;
        if ($request->file('avatar')) {
            $request->file('avatar')->move(
                'storage/avatars',
                auth('laundry')->user()->id . '_' . now()->format('d-m-Y')
            );
            if (auth('laundry')->user()->avatar)
                Storage::disk('local')->delete(auth('laundry')->user()->avatar);
            $avatarUrl = 'storage/avatars/' . auth('laundry')->user()->id . '_' . now()->format('d-m-Y');
        }

        auth('laundry')->user()->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'avatar' => $avatarUrl,
        ]);

        return redirect()->route('laundry.index');
    }

    public function address()
    {
        return view('laundry.address');
    }

    public function addressUpdate(Request $request)
    {
        auth('laundry')->user()->address->update($request->all());

        return redirect()->route('laundry.index');
    }

    public function account()
    {
        return view('laundry.setting');
    }

    public function notification()
    {
        return view('laundry.notifications');
    }
}
