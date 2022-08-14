<div class="row g-3">
    @forelse ($laundries as $laundry)
        <div class="col-md-3">
            <div class="card border-0 shadow">
                <a href="#" wire:click.prevent="switch({{ $laundry }})"
                    class="w-100 p-2 text-end position-absolute h5 bg-transparent rounded-bottom"
                    id="{{ $laundry->username }}">
                    <i class="text-danger @if ($laundry->favBy(auth()->user())) fas
                    fa-heart @else far fa-heart @endif">
                    </i>
                </a>
                <img src="{{ asset($laundry->avatar ?? 'src/bg.png') }}" class="card-img-top" alt="laundry"
                    style="height: 128px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $laundry->name }}</h5>
                    <small class="card-subtitle text-secondary">{{ $laundry->address->compact() }}</small>
                </div>
            </div>
        </div>
    @empty
        <div class="card border-0 shadow">
            <div class="card-body">
                <h5 class="card-title">Favorit Kosong</h5>
            </div>
        </div>
    @endforelse
</div>
