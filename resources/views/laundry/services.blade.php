@extends('layout.laundry.app')
@section('content')
    <div class="content-sidebar">
        <div class="d-flex justify-content-between h-100">
            @include('include.laundry.sidebar')
            <div class="container-fluid">
                <div class="row p-3 g-3">
                    <div class="card col-md-12 shadow-sm border-0">
                        <div class="card-body">
                            <div class="row g-3">
                                {{-- <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='' ) active @endif" aria-current="page" href="{{ route('') }}">Semua</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='Habis' ) active @endif" aria-current="page"
                                            href="{{ route('', ['type' => 'Habis']) }}">Habis</a>
                                    </li>
                                </ul> --}}
                                <div class="col-md-12">
                                    <div class="p-1 bg-light rounded rounded-pill shadow-sm">
                                        <form action="{{ route('laundry.services') }}" method="get">
                                            <div class="input-group">
                                                <input type="search" name="search" placeholder="Cari Pesanan"
                                                    aria-describedby="button-addon1"
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
                                @if ($search !== '')
                                    <div class="col-md-12">
                                        <h5>Masukkan {{ $search }}</h5>
                                    </div>
                                @endif
                                <div class="col-md-12 d-flex justify-content-between">
                                    <h5>{{ $services->count() }} Layanan Jasa</h5>
                                    <a href="{{ route('laundry.services.create') }}" class="btn btn-primary"> <i
                                            class="fas fa-plus"></i> Tambah Produk</a>
                                </div>
                                <div class="col-md-12 container-fluid px-3">
                                    <div class="row g-3">
                                        <div class="card card-body shadow border-0 col-md-12 bg-success text-light">
                                            <div class="row h5">
                                                <div class="col-md-3 vl">
                                                    Nama Produk Layanan
                                                </div>
                                                <div class="col-md-2 vl">
                                                    Harga
                                                </div>
                                                <div class="col-md-2 vl">
                                                    Tipe Jasa
                                                </div>
                                                <div class="col-md-2 vl">
                                                    Total Penjualan
                                                </div>
                                                <div class="col-md-3">
                                                    Pilihan
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($services as $service)
                                            <div class="card card-body shadow border-0 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3 vl">
                                                        <img class="rounded-circle card-img"
                                                            src="{{ asset($service->picture ?? 'src/bg.png') }}" alt=""
                                                            style="height: 32px; width:32px; object-fit: cover;">
                                                        {{ $service->name }}
                                                    </div>
                                                    <div class="col-md-2 vl text-end">
                                                        Rp{{ number_format($service->price) }}
                                                    </div>
                                                    <div class="col-md-2 vl text-center">
                                                        {{ $service->type }}
                                                    </div>
                                                    <div class="col-md-2 vl text-center">
                                                        {{ $service->orders->count() }}
                                                    </div>
                                                    <div class="col-md-3  text-center">
                                                        <a href="{{ route('laundry.services.edit', $service) }}"
                                                            class="badge bg-primary rounded-pill">Ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if ($services->count() <= 0)
                                            <div class="card h4 card-body shadow border-0 col-md-12 bg-light text-dark">
                                                <div class="text-center">
                                                    <i class="fas fa-times"></i>
                                                    <p class="mb-0">Tidak Ada Pesanan</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
