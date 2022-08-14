<div>
    @auth('web')
        <h5 class="float-end mx-2">{{ $laundry->favCount() }}</h5>
        <a href="#" class="float-end h5 bg-transparent rounded-bottom" wire:click.prevent="switch({{ $laundry }})">
            <i class="text-danger 
        @if ($laundry->favBy(auth()->user())) fas fa-heart @else far
                fa-heart @endif">
            </i>
        </a>
    @else
        <h5 class="float-end mx-2">{{ $laundry->favCount() }}</h5>
        <span class="float-end h5 bg-transparent rounded-bottom">
            <i class="text-danger 
        @if ($laundry->favBy(auth()->user())) fas fa-heart @else far
                fa-heart @endif">
            </i>
        </span>
    @endauth
</div>
