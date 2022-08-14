<?php

namespace App\Http\Livewire;

use App\Models\Laundry;
use Livewire\Component;

class FavoriteButton extends Component
{
    public Laundry $laundry;

    public function render()
    {
        return view('livewire.favorite-button');
    }

    public function switch(Laundry $laundry)
    {
        if ($laundry->favBy(auth()->user())) {
            auth()->user()->laundries()->detach($laundry);
        } else {
            auth()->user()->laundries()->attach($laundry);
        }
        $this->laundry = Laundry::find($laundry->id);
    }
}
