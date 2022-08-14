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
            <form action="{{route('laundry.bank.store')}}" method="post">
              @csrf
              @method('POST')
              <div class="row g-2">
                <div class="form-floating">
                  <input type="text" class="form-control @error('card_holder') is-invalid @enderror" placeholder="Nama Pemegang Kartu" name="card_holder" value="{{old('card_holder')}}">
                  <label for="floatingInputGrid">Nama Pemegang Kartu</label>
                  @error('card_holder')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control @error('card_type') is-invalid @enderror" placeholder="Nama Bank" name="card_type" value="{{old('card_type')}}">
                  <label for="floatingInputGrid">Nama Bank</label>
                  @error('card_type')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control @error('card_number') is-invalid @enderror" placeholder="Nomor Kartu" name="card_number" value="{{old('card_number')}}">
                  <label for="floatingInputGrid">Nomor Kartu</label>
                  @error('card_number')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control @error('card_branch') is-invalid @enderror" placeholder="Cabang" name="card_branch" value="{{old('card_branch')}}">
                  <label for="floatingInputGrid">Cabang</label>
                  @error('card_branch')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control @error('card_city') is-invalid @enderror" placeholder="Kota" name="card_city" value="{{old('card_city')}}">
                  <label for="floatingInputGrid">Kota</label>
                  @error('card_city')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
                <button class="btn btn-success" type="submit">
                  <h5 class="my-2">
                    Tambah Rekening
                  </h5>
                </button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection