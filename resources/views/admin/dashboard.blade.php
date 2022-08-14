@extends('layout.admin.app')
@section('content')
<div class="content-sidebar">
  <div class="d-flex justify-content-between h-100">
    @include('include.admin.sidebar')
    <div class="container-fluid">
      <div class="row p-3 g-3">
        <div class="card col-md-12 shadow-sm border-0">
          <div class="card-body">
            <h4 class="mb-4">Dashboard</h4>
            <div class="row text-center g-3">
              <div class="col-md-3">
                <div class="card border-0 shadow">
                  <div class="card-body text-start">
                    <p class="mb-0 card-subtitle text-secondary">
                      Pelanggan
                    </p>
                    <h1 class="far fa-user float-end"></h1>
                    <h1 class="mb-0">{{$customer}}</h1>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card border-0 shadow">
                  <div class="card-body text-start">
                    <p class="mb-0 card-subtitle text-secondary">
                      Penatu
                    <h1 class="far fa-user float-end"></h1>
                    <h1 class="mb-0">{{$laundry}}</h1>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card border-0 shadow">
                  <div class="card-body text-start">
                    <p class="mb-0 card-subtitle text-secondary">
                      Kurir
                    <h1 class="far fa-user float-end"></h1>
                    <h1 class="mb-0">{{$courier}}</h1>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card border-0 shadow">
                  <div class="card-body text-start">
                    <p class="mb-0 card-subtitle text-secondary">
                      Pesanan
                      <div class="row g-0">
                        <div class="col-md-6">
                          <span class="mb-0 h2"> {{$success}}</span>
                          <span class="badge bg-success rounded-pill"> </span> <small class="text-secondary"> Sukses</small>
                        </div>
                        <div class="col-md-6">
                          <span class="mb-0 h2"> {{$fail}}</span>
                          <span class="badge bg-danger rounded-pill"> </span> <small class="text-secondary"> Gagal</small>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card border-0 shadow">
                  <div class="card-body">
                    <h5 class="card-title text-start">Daftar Riwayat Terakhir</h5>
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
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($latest as $order)    
                        <tr>
                          <td>{{$order->id}}</td>
                          <td>{{$order->user->name}}</td>
                          <td>{{$order->laundry->name}}</td>
                          <td>{{$order->courier->name??''}}</td>
                          <td>
                            @foreach ($order->services as $service)
                            <div class="badge bg-dark text-light">
                              {{$service->name}} &times; {{$service->pivot->quantity}}
                            </div>
                            @endforeach
                          </td>
                          <td>{{number_format($order->total_cost)}}</td>
                          <td>
                            <span class="badge bg-success">{{$order->status}}</span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
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