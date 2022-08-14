@extends('layout.admin.app')
@section('content')
    <div class="content-sidebar">
        <div class="d-flex justify-content-between h-100">
            @include('include.admin.sidebar')
            <div class="container-fluid">
                <div class="row p-3 g-3">
                    <div class="col-md-12">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title text-start">Daftar Riwayat Terakhir</h5>
                                <div class="m-3">
                                    <div class="p-1 bg-light rounded rounded-pill shadow-sm">
                                        <form action="{{ route('admin.orders') }}" method="get">
                                            <div class="input-group">
                                                <input type="search" name="search" placeholder="Search"
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
                                @isset($search)
                                    <h5 class="my-3">Masukkan: {{ $search }}</h5>
                                @endisset
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Invoice Id</th>
                                            <th>Pelanggan</th>
                                            <th>Penatu</th>
                                            <th>Kurir</th>
                                            <th>Kuantitas</th>
                                            <th>Biaya</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <livewire:admin-orders-table :latest="$latest" />
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
