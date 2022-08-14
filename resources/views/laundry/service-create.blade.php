@extends('layout.laundry.app')
@section('content')
<div class="content-sidebar">
  <div class="d-flex justify-content-between h-100">
    @include('include.laundry.sidebar')
    <div class="container-fluid">
      <div class="row p-3 g-3">
        <div class="card col-md-12 shadow-sm border-0">
          <div class="card-body">
            <h4 class="mb-4">Tambah Layanan Jasa</h4>
            <form action="{{route('laundry.services.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="row g-3">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Jasa" name="name" required value="{{old('name')}}">
                    <label for="floatingInputGrid">Nama Jasa</label>
                    @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Harga jasa" name="price" required value="{{old('price')}}">
                    <label for="floatingInputGrid">Harga Jasa</label>
                    @error('price')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('type') is-invalid @enderror" placeholder="Tipe Jasa" name="type" required value="{{old('type')}}">
                    <label for="floatingInputGrid">Tipe Jasa</label>
                    @error('type')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('unit') is-invalid @enderror" placeholder="Unit Jasa" name="unit" required value="{{old('unit')}}">
                    <label for="floatingInputGrid">Unit Jasa</label>
                    @error('unit')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="floatingInputGrid" class="form-label">Gambar</label>
                    <input type="file" class="form-control @error('picture') is-invalid @enderror" placeholder="Gambar" name="picture" required>
                    @error('picture')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <input class="btn btn-danger" type="submit" value="Tambah Jasa">
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection