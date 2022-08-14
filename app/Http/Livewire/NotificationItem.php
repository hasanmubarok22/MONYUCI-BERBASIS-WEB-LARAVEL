<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationItem extends Component
{
    public $notification;

    public $listeners = [
        'rerenderMe' => '$refresh',
    ];

    public function getDataProperty()
    {
        return $this->model->get_data();
    }

    public function render()
    {
        return view('livewire.notification-item');
    }

    public function read()
    {
        $this->notification->markAsRead();
    }

    public function delete()
    {
        $this->notification->delete();
        $this->emitUp('rerenderParent');
    }
}
