@extends('layout.laundry.app')
@section('content')
    <div class="content-sidebar">
        <div class="d-flex justify-content-between h-100">
            @include('include.laundry.sidebar')
            <div class="container-fluid">
                <div class="row p-3 g-3">
                    <div class="card col-md-12 shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="mb-4">Dashboard</h4>
                            <div class="row text-center">
                                <div class="col-md-4 vl">
                                    <span class="text-secondary">Belum Dikirim Kurir</span>
                                    <h2>{{ $orderCount['Menunggu Kurir'] ?? 0 }}</h2>
                                </div>
                                <div class="col-md-4 vl">
                                    <span class="text-secondary">Pengiriman Perlu Diproses</span>
                                    <h2>{{ $orderCount['Diterima Penatu'] ?? 0 }}</h2>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-secondary">Pengiriman Telah Diproses</span>
                                    <h2>{{ $orderCount['Proses Pencucian'] ?? 0 }}</h2>
                                </div>
                            </div>
                            <div class="row text-center my-5">
                                <div class="col-md-4 vl">
                                    <span class="text-secondary">Menunggu Penjemputan Kurir</span>
                                    <h2>{{ $orderCount['Selesai Dicuci'] ?? 0 }}</h2>
                                </div>
                                <div class="col-md-4 vl">
                                    <span class="text-secondary">Menunggu Respon Pengembalian</span>
                                    <h2>{{ $orderCount['Proses Pengembalian'] ?? 0 }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-12 shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Bisnis Saya</h4>
                            {{-- <div class="row me-5">
                                <div class="col-md-6 vl">
                                    <span class="text-secondary">Total Pengunjung</span>
                                    <h2>20</h2>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-secondary">This Month</span>
                                    <h2>20</h2>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-secondary">This Day</span>
                                    <h2>20</h2>
                                </div>
                            </div>
                            <div class="my-3 border-bottom"></div> --}}
                            <div class="row me-5 mt-3">
                                <div class="col-md-6 vl">
                                    <span class="text-secondary">Total Pesanan</span>
                                    <h2>{{ auth('laundry')->user()->orders->count() }}</h2>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-secondary">This Week</span>
                                    <h2>{{ auth('laundry')->user()->orderThisWeek()->count() }}</h2>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-secondary">This Day</span>
                                    <h2>{{ auth('laundry')->user()->orderThisDay()->count() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
