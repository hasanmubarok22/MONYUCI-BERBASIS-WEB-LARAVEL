<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class LaundryOrdersTable extends Component
{
    public $orders;

    public function render()
    {
        return view('livewire.laundry-orders-table');
    }
}
