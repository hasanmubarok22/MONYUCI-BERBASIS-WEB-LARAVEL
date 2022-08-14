<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminOrderItem extends Component
{
    public $order;

    public function render()
    {
        return view('livewire.admin-order-item');
    }

    public function updateStatus($status, Order $order)
    {
        $order->update([
            'status' => $status,
        ]);
        $this->order = Order::find($order->id);
    }
}
