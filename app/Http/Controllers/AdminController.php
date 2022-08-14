<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Courier;
use App\Models\Laundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class AdminController extends Controller
{
    public function dashboard()
    {
        $customer = User::count();
        $laundry = Laundry::count();
        $courier = Courier::count();
        $success = Order::where('status', 'Diterima Pelanggan')->count();
        $fail = Order::where('status', 'Batal')->count();
        $latest = Order::latest()->limit(10)->get();
        return view('admin.dashboard', [
            'customer' => $customer,
            'laundry' => $laundry,
            'courier' => $courier,
            'success' => $success,
            'fail' => $fail,
            'latest' => $latest,
        ]);
    }

    public function user(Request $request)
    {
        if ($request->has('search')) {
            if ($request->type === 'customer' || !$request->has('type')) {
                $users = User::where('id', 'like', '%' . $request->search . '%')
                    ->orWhere('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone_number', 'like', '%' . $request->search . '%')
                    ->orWhereHas('address', function (Builder $query) use ($request) {
                        $query->where('province', 'like', '%' . $request->search . '%')
                            ->orWhere('district', 'like', '%' . $request->search . '%')
                            ->orWhere('other', 'like', '%' . $request->search . '%')
                            ->orWhere('city', 'like', '%' . $request->search . '%')
                            ->orWhere('zipcode', 'like', '%' . $request->search . '%');
                    })->paginate(5);
            } else if ($request->type === 'laundry') {
                $users = Laundry::where('id', 'like', '%' . $request->search . '%')
                    ->orWhere('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone_number', 'like', '%' . $request->search . '%')
                    ->orWhereHas('address', function (Builder $query) use ($request) {
                        $query->where('province', 'like', '%' . $request->search . '%')
                            ->orWhere('district', 'like', '%' . $request->search . '%')
                            ->orWhere('other', 'like', '%' . $request->search . '%')
                            ->orWhere('city', 'like', '%' . $request->search . '%')
                            ->orWhere('zipcode', 'like', '%' . $request->search . '%');
                    })->paginate(5);
            } else if ($request->type === 'courier') {
                $users = Courier::where('id', 'like', '%' . $request->search . '%')
                    ->orWhere('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone_number', 'like', '%' . $request->search . '%')
                    ->orWhere('license_plate', 'like', '%' . $request->search . '%')
                    ->paginate(5);
            }
        } else {
            if ($request->type === 'customer' || !$request->has('type')) {
                $users = User::paginate(5);
            } else if ($request->type === 'laundry') {
                $users = Laundry::paginate(5);
            } else if ($request->type === 'courier') {
                $users = Courier::paginate(5);
            }
        }

        return view('admin.user', [
            'users' => $users,
            'type' => $request->type,
            'search' => $request->search,
        ]);
    }

    public function userEdit(Request $request)
    {
        if ($request->role === 'customer') {
            $user = User::find($request->id);
        } else if ($request->role === 'laundry') {
            $user = Laundry::find($request->id);
        } else if ($request->role === 'courier') {
            $user = Courier::find($request->id);
        } else {
            $user = null;
        }

        return view('admin.user-edit', [
            'user' => $user,
            'id' => $request->id,
            'role' => $request->role,
        ]);
    }

    public function userUpdate(Request $request)
    {
        if ($request->role === 'customer') {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
            ]);
            User::find($request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else if ($request->role === 'laundry') {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
            ]);
            Laundry::find($request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else if ($request->role === 'courier') {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'license_plate' => 'required',
            ]);
            Courier::find($request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'license_plate' => $request->license_plate,
            ]);
        }

        return redirect()->route('admin.user', ['type' => $request->role]);
    }

    public function userDelete(User $user, Request $request)
    {
        $user->delete();

        return redirect()->route('admin.user', ['type' => $request->role]);
    }

    public function order(Request $request)
    {
        if ($request->has('search')) {
            $latest = Order::latest()->where('id', 'like', '%' . $request->search . '%')
                ->orWhereHas('user', function (Builder $query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })->orWhereHas('laundry', function (Builder $query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->orWhere('status', 'like', '%' . $request->search . '%')
                ->get();
        } else {
            $latest = Order::latest()->get();
        }

        return view('admin.orders', [
            'latest' => $latest,
            'search' => $request->search,
        ]);
    }

    public function setting()
    {
        return view('admin.setting');
    }

    public function profile()
    {
        return view('admin.profile');
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
                auth('admin')->user()->id . '_' . now()->format('d-m-Y')
            );
            if (auth('admin')->user()->avatar)
                Storage::disk('local')->delete(auth('admin')->user()->avatar);
            $avatarUrl = 'storage/avatars/' . auth('admin')->user()->id  . '_' . now()->format('d-m-Y');
        }

        auth('admin')->user()->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'avatar' => $avatarUrl,
        ]);

        return redirect()->route('admin.setting');
    }

    public function notification()
    {
        return view('admin.notifications');
    }
}
