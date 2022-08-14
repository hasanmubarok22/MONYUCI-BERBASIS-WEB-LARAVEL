<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationsTable extends Component
{
    public $user;

    public $listeners = [
        'rerenderMe' => '$refresh',
        'rerenderParent' => '$refresh',
    ];

    public function getDataProperty()
    {
        return $this->model->get_data();
    }

    public function render()
    {
        return view('livewire.notifications-table');
    }

    public function readAll()
    {
        $this->user->unreadNotifications->markAsRead();
        $this->emit('rerenderMe');
    }
}
