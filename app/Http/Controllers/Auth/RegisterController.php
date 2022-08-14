<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Address;
use App\Models\Laundry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function customerIndex()
    {
        return view('auth.customer.register');
    }

    public function laundryIndex()
    {
        return view('auth.laundry.register');
    }

    public function customerRegister(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number',
            'birthday' => 'required|date',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function laundryRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:laundries,username',
            'email' => 'required|email|unique:laundries,email',
            'phone_number' => 'required|unique:laundries,phone_number',
            'password' => 'required|min:8|confirmed',
            'city' => 'required',
            'province' => 'required',
            'district' => 'required',
            'zipcode' => 'required',
        ]);

        $laundry = Laundry::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        $address = new Address([
            'name' => $request->name,
            'city' => $request->city,
            'province' => $request->province,
            'district' => $request->district,
            'zipcode' => $request->zipcode,
            'other' => $request->other,
        ]);

        $laundry->address()->save($address);

        return redirect()->route('laundry.login');
    }
}
