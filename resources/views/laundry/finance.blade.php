@extends('layout.laundry.app')
@section('content')
<div class="content-sidebar">
  <div class="d-flex justify-content-between h-100">
    @include('include.laundry.sidebar')
    <div class="container-fluid">
      <div class="row p-3 g-3">
        <div class="card col-md-12 shadow-sm border-0">
          <div class="card-body">
            <h4 class="mb-4">Penghasilan</h4>
            <div class="row ml-5 g-2">
              <div class="col-md-6 vl">
                  <h5>Segera Dilepas</h5>
                  <span class="text-secondary">Total</span>
                  <h2>Rp{{number_format($yetFinance)}}</h2>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <h5 class="col-md-12">Sudah Dilepas</h5>
                    <div class="col-md-6">
                        <span class="text-secondary">This Month</span>
                        <h2>Rp{{number_format($thismonth)}}</h2>
                    </div>
                    <div class="col-md-6">
                        <span class="text-secondary">Total</span>
                        <h2>Rp{{number_format($finance)}}</h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <a href="{{route('laundry.bank')}}" class="btn bg-secondary h5 text-light w-100 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Rekening Bank Saya: {{$bankaccount->card_number}}</h5>
                    <i class="fas fa-chevron-right"></i>
                  </a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection