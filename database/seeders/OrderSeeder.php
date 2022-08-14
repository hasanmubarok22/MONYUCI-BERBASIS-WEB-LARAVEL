<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Courier;
use App\Models\Laundry;
use App\Models\Service;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function ($user) {
            $address = $user->address->first();
            $courier = Courier::all()->random(1)->first();
            $laundry = Laundry::all()->random(1)->first();
            $service = Service::where('laundry_id', $laundry->id)->get()->random(3);
            // dd($service);
            $order = Order::factory(4)->for($user)->for($laundry)->for($address)->for($courier)->hasAttached($service, ['quantity' => '0'])->create();
        });

        Order::all()->each(function ($order) {
            $order->syncTotal();
        });
    }
}
