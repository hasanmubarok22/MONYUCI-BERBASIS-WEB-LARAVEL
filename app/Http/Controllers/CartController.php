<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'total_cost' => 'required',
        ]);

        auth()->user()->cart()->update([
            "total_cost" => $request->total_cost,
        ]);
        // dd($request->service);
        $service = collect([]);
        foreach ($request->service as $key => $qty) {
            if ($qty > 0)
                $service->put($key, ['quantity' => $qty]);
        }
        // dd($service);
        auth()->user()->cart->services()->sync($service);

        return redirect()->route('order.create');
    }
}
