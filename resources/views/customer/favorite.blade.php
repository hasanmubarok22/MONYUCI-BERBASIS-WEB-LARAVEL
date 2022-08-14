@extends('layout.customer.app')
@section('content')
    <div class="content-sidebar">
        <div class="d-flex justify-content-between h-100">
            @include('include.customer.sidebar',['favorit'=>true])
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Favorit</h5>
                            <div class="border-bottom my-2"></div>
                            <div class="row g-4">
                                <livewire:favorite-cards :laundries="$laundries" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
