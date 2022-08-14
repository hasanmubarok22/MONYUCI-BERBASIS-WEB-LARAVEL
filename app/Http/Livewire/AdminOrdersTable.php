<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminOrdersTable extends Component
{
    public $latest;

    public function render()
    {
        return view('livewire.admin-orders-table');
    }
}
