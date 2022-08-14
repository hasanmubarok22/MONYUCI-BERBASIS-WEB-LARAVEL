<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.customer.login');
    }

    public function laundryIndex()
    {
        return view('auth.laundry.login');
    }

    public function courierIndex()
    {
        return view('auth.courier.login');
    }

    public function adminIndex()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (!Auth::guard('web')->attempt($credentials)) {
            return back()->with('status', 'Invalid login details');
        } else {
            return redirect()->route('index');
        }
    }

    public function laundryLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (!Auth::guard('laundry')->attempt($credentials)) {
            return back()->with('status', 'Invalid login details');
        } else {
            return redirect()->route('laundry.index');
        }
    }

    public function courierLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (!Auth::guard('courier')->attempt($credentials)) {
            return back()->with('status', 'Invalid login details');
        } else {
            return redirect()->route('courier.index');
        }
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (!Auth::guard('admin')->attempt($credentials)) {
            return back()->with('status', 'Invalid login details');
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function logout(Request $request)
    {
        if ($request->has('admin')) {
            // dd('admin');
            auth('admin')->logout();
            return redirect()->route('admin.login');
        } else if ($request->has('courier')) {
            // dd('courier');
            auth('courier')->logout();
            return redirect()->route('courier.login');
        } else if ($request->has('laundry')) {
            // dd('laundry');
            auth('laundry')->logout();
            return redirect()->route('laundry.login');
        } else if ($request->has('web')) {
            // dd('web');
            auth('web')->logout();
            return redirect()->route('login');
        }
    }
}
