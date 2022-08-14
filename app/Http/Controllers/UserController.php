<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function setting()
    {
        return view('customer.setting');
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'birthday' => 'required|date',
            'avatar.*' => 'image'
        ]);

        $avatarUrl = null;
        if ($request->file('avatar')) {
            $request->file('avatar')->move(
                'storage/avatars',
                auth()->user()->id . '_' . now()->format('d-m-Y')
            );
            if (auth()->user()->avatar)
                Storage::disk('local')->delete(auth()->user()->avatar);
            $avatarUrl = 'storage/avatars/' . $request->user()->id . '_' . now()->format('d-m-Y');
        }

        auth()->user()->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'birthday' => $request->birthday,
            'avatar' => $avatarUrl,
        ]);

        return redirect()->route('account.setting');
    }

    public function address()
    {
        return view('customer.address');
    }

    public function addressUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'province' => 'required',
            'district' => 'required',
            'zipcode' => 'required',
        ]);

        auth()->user()->address->update([
            'name' => $request->name,
            'city' => $request->city,
            'province' => $request->province,
            'district' => $request->district,
            'zipcode' => $request->zipcode,
            'other' => $request->other,
        ]);

        return redirect()->route('account.setting');
    }

    public function favorite()
    {
        $laundries = auth()->user()->laundries;
        return view('customer.favorite', ['laundries' => $laundries]);
    }

    public function favoriteStore(Laundry $laundry)
    {
        if ($laundry->favBy(auth()->user())) {
            auth()->user()->laundries()->detach($laundry);
            return response(['data' => 'far']);
        } else {
            auth()->user()->laundries()->attach($laundry);
            return response(['data' => 'fas']);
        }
    }

    public function notification()
    {
        return view('customer.notifications');
    }
}
