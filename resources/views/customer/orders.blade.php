@extends('layout.customer.app')
@section('content')
    <div class="content-sidebar">
        <div class="d-flex justify-content-between h-100">
            @include('include.customer.sidebar', ['pesanan'=>true])
            <div class="container-fluid py-4 h-100">
                <div class="row">
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="ml-5 text-dark">Orders Control</h5>
                                <div class="border-bottom mb-3"></div>
                                <table class="table table-bordered">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th style="width: 20%">ID</th>
                                            <th style="width: 15%">Laundry</th>
                                            <th style="width: 15%">Alamat Penjemputan</th>
                                            <th style="width: 10%">Total(Rp)</th>
                                            <th style="width: 10%">Waktu Penjemputan</th>
                                            <th style="width: 15%">Catatan</th>
                                            <th style="width: 5%">status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <livewire:user-orders-table :orders="$orders" />
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
