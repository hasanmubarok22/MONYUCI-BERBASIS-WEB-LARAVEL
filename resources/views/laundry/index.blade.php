@extends('layout.customer.app')
@section('content')
    <div class="content">

        <div class="container-fluid">
            <div class="row p-5 g-2">
                <div class="col-md-12">
                    <h3 class="text-center" style="text-decoration: underline;">
                        List Penatu
                    </h3>
                </div>
                <!-- Search -->
                <div class="col-md-12 card">
                    <div class="card-body">
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm">
                            <form action="{{ route('laundry.search') }}" method="get">
                                <div class="input-group">
                                    <input type="search" placeholder="Search" name="search" aria-describedby="button-addon1"
                                        class="form-control border-0 rounded-pill bg-light">
                                    <div class="input-group-append">
                                        <button id="button-addon1" type="submit"
                                            class="btn btn-link text-primary rounded-pill"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if ($search)
                    <div class="col-md-12 card">
                        <div class="card-body">
                            <h5 class="card-text">Masukkan {{ $search }}</h5>
                            @if (!$laundries->total())
                                <h5 class="card-text">Tidak ditemukan</h5>
                            @endif
                        </div>
                    </div>
                @endif
                @foreach ($laundries as $laundry)
                    <div class="col-md-12 card text-dark">
                        <a href="{{ route('laundry.show', $laundry) }}" style="text-decoration: none;">
                            <div class="row g-0">
                                <div class="col-md-2 p-3">
                                    <img class="card-img" src="@if (!$laundry->avatar) {{ asset('src/bg.png') }}@else{{ asset($laundry->avatar) }} @endif" alt="laundry" style="height: 128px; object-fit: cover;">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $laundry->name }}</h5>
                                        <h6 class="card-subtitle text-secondary">{{ $laundry->address->first()->compact() }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @auth('web')
                            <div class="p-2 px-3">
                                <livewire:favorite-button :laundry="$laundry" />
                            </div>
                        @endauth
                    </div>
                @endforeach
                <nav class="mx-3" aria-label="Page navigation">
                    {{ $laundries->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection
