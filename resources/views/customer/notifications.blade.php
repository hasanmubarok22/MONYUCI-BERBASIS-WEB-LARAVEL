@extends('layout.customer.app')
@section('content')
    @include('include.customer.sidebar', ['notifikasi'=>true])
    <div class="content-sidebar">
        <div class="container-fluid p-3">
            <div class="row g-3">
                <div class="col-md-12">
                    <livewire:notifications-table :user="auth()->user()" />
                </div>
            </div>
        </div>
    </div>
@endsection
