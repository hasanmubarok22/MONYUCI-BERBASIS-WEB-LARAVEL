@extends('layout.laundry.app', ['user'=>true])
@section('content')
<div class="content-sidebar">

  <div class="d-flex justify-content-between h-100">
    @include('include.laundry.sidebar')
    <div class="container-fluid p-4">
      <div class="row">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Pengaturan</h5>
            
            <div class="border-bottom my-2"></div>
            <form action="{{route('laundry.address.edit')}}" method="POST">
            @csrf
            @method('put')
              <div class="row g-3">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" required value="{{old('name')??auth('laundry')->user()->name}}">
                    <label for="floatingInputGrid">Nama Penerima</label>
                    @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('province') is-invalid @enderror" placeholder="Provinsi" name="province" required value="{{old('province')??auth('laundry')->user()->address->province}}">
                    <label for="floatingInputGrid">Provinsi</label>
                    @error('province')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="Kota" name="city" required value="{{old('city')??auth('laundry')->user()->address->city}}">
                    <label for="floatingInputGrid">Kota</label>
                    @error('city')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('district') is-invalid @enderror" placeholder="Kecamatan" name="district" required value="{{old('district')??auth('laundry')->user()->address->district}}">
                    <label for="floatingInputGrid">Kecamatan</label>
                    @error('district')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('zipcode') is-invalid @enderror" placeholder="Kode Pos" name="zipcode" required value="{{old('zipcode')??auth('laundry')->user()->address->zipcode}}">
                    <label for="floatingInputGrid">Kode Pos</label>
                    @error('zipcode')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <textarea type="text" class="form-control" placeholder="Lainnya" name="other">{{old('other')??auth('laundry')->user()->address->other}}</textarea>
                    <label for="floatingInputGrid">Lainnya</label>
                  </div>
                </div>
                <input class="btn btn-danger" type="submit" value="Ubah Alamat">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection