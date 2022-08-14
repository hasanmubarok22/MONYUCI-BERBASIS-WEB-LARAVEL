<?php

namespace App\Http\Livewire;

use App\Models\Laundry;
use Livewire\Component;

class Commenter extends Component
{
    public $body;
    public Laundry $laundry;
    public $star = 1;

    public function render()
    {
        return view('livewire.commenter');
    }

    public function rating($star)
    {
        $this->star = $star;
    }

    public function postComment()
    {
        $this->laundry->comments()->attach(auth()->user()->id, [
            'comment' => $this->body,
            'rating' => $this->star,
        ]);

        $this->laundry = Laundry::find($this->laundry->id);
    }
}
