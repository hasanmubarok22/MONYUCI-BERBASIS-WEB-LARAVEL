<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class CourierOrdersTable extends Component
{
    public $ordersConfirm;

    public function render()
    {
        return view('livewire.courier-orders-table');
    }

    public function updateStatus($status, Order $order)
    {
        $order->update([
            'status' => $status,
        ]);
        $this->ordersConfirm = auth('courier')->user()->orders;
    }
}
