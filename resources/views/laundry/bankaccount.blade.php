@extends('layout.laundry.app')
@section('content')
<div class="content-sidebar">
  <div class="d-flex justify-content-between h-100">
    @include('include.laundry.sidebar')
    <div class="container-fluid">
      <div class="row p-3 g-3">
        <div class="card col-md-12 shadow-sm border-0">
          <div class="card-body">
            <h4 class="mb-4">Rekening Bank</h4>
            <div class="row">
              @foreach (auth('laundry')->user()->bankaccounts as $payment)
              <div class="col-md-6 mb-2">
                <div class="card shadow border-0 h-100">
                    <div class="row no-gutters d-flex justify-content-between">
                          <div class="col-md-12">
                              <div class="float-end">
                                  @if (in_array('Main',$payment->getLabels()))
                                  <span class="badge bg-success me-2">Utama</span>
                                  @endif
                              </div>
                              <div class="card-body">
                                  <h5 class="card-title">{{$payment->card_type}}</h5>
                                  <h6 class="card-title">{{$payment->card_holder}}</h6>
                                  <p class="card-text mb-0">{{$payment->card_number}}</p>
                                  <small class="text-muted">{{$payment->card_branch}} - {{$payment->card_city}}</small>
                              </div>
                          </div>
                          <div class="float-right btn-group mt-4 w-100">
                              <a href="{{route('laundry.bank.edit', ['bankaccount'=>$payment])}}" class="btn btn-primary btn-sm">Ubah</a>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
            <div class="col-md-12">
                <a href="{{route('laundry.bank.create')}}" class="btn btn-secondary w-100 h-100 shadow border-0">
                    <h5 class="fas fa-plus align-self-center">
                    <h6 class=" align-self-center">Add Bank Account</h6>
                </a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection