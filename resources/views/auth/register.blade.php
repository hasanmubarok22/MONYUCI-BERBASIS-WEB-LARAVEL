@extends('layout.app')

@section('content')
    <div class="center-screen h-100">
        <div class="container-fluid p-3 h-100 align-item-center">
            <div class="row h-100 align-items-center">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 25rem;">
                        <div class="card-body p-5 text-center">
                            <h5 class="card-title mb-3">DAFTAR PELANGGAN</h5>
                            <div class="row g-2">
                                <a href="{{ route('register.customer') }}" class="btn btn-primary w-100">Daftar
                                    Pelanggan</a>
                                <a href="{{ route('register.laundry') }}" class="btn btn-primary w-100">Daftar Penatu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
