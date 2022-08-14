<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class LaundryOrderItem extends Component
{
    public Order $order;

    public function render()
    {
        return view('livewire.laundry-order-item');
    }

    public function updateStatus($status, Order $order)
    {
        $order->update([
            'status' => $status,
        ]);

        if ($status === 'Selesai Dicuci') {
            return redirect()->route('laundry.order', ['type' => 'Selesai Dicuci']);
        } else if ($status === 'Proses Pengembalian') {
            return redirect()->route('laundry.order', ['type' => 'Proses Pengembalian']);
        }
        $this->order = Order::find($order->id);
    }
}
