@extends('layout.laundry.app')
@section('content')
    @include('include.laundry.sidebar')
    <div class="content-sidebar">
        <div class="container-fluid p-3">
            <div class="row g-3">
                <div class="col-md-12">
                    <livewire:notifications-table :user="auth('laundry')->user()" />
                </div>
            </div>
        </div>
    </div>
@endsection
