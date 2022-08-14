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
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='' ) active @endif" aria-current="page"
                                            href="{{ route('laundry.order') }}">Semua</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='Menunggu Kurir' ) active @endif" aria-current="page"
                                            href="{{ route('laundry.order', ['type' => 'Menunggu Kurir']) }}">Belum Dikirim
                                            Kurir</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='Diterima Penatu' ) active @endif" aria-current="page"
                                            href="{{ route('laundry.order', ['type' => 'Diterima Penatu']) }}">Perlu
                                            Diproses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='Selesai Dicuci' ) active @endif" aria-current="page"
                                            href="{{ route('laundry.order', ['type' => 'Selesai Dicuci']) }}">Selesai
                                            Pencucian</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='Proses Pengembalian' ) active @endif" aria-current="page"
                                            href="{{ route('laundry.order', ['type' => 'Proses Pengembalian']) }}">Pengembalian</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='Batal' ) active @endif" aria-current="page"
                                            href="{{ route('laundry.order', ['type' => 'Batal']) }}">Pembatalan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type==='Diterima Pelanggan' ) active @endif" aria-current="page"
                                            href="{{ route('laundry.order', ['type' => 'Diterima Pelanggan']) }}">Selesai</a>
                                    </li>
                                </ul>
                                <div class="col-md-12">
                                    <div class="p-1 bg-light rounded rounded-pill shadow-sm">
                                        <form action="{{ route('laundry.order') }}" method="get">
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
                                <div class="col-md-12">
                                    <h5>{{ $orders->count() }} Pesanan</h5>
                                </div>
                                <div class="col-md-12 container-fluid px-3">
                                    <livewire:laundry-orders-table :orders="$orders" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
