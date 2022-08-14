<?php

namespace App\Http\Livewire;

use App\Models\Laundry;
use Livewire\Component;

class FavoriteCards extends Component
{
    public $laundries;

    public function render()
    {
        return view('livewire.favorite-cards');
    }

    public function switch(Laundry $laundry)
    {
        if ($laundry->favBy(auth()->user())) {
            auth()->user()->laundries()->detach($laundry);
        } else {
            auth()->user()->laundries()->attach($laundry);
        }
        $this->laundries = auth()->user()->laundries;
    }
}
