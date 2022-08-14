<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class UserOrdersTable extends Component
{
    public $orders;

    public function render()
    {
        return view('livewire.user-orders-table');
    }

    public function updateStatus($status, Order $order)
    {
        $order->update([
            'status' => $status,
        ]);

        $this->orders =  auth()->user()->orders()->latest()->get();
    }
}
