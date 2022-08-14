@extends('layout.courier.app')
@section('content')
<div class="content">
  <div class="d-flex justify-content-between h-100">
    <div class="container-fluid p-4">
      <div class="row">
        <div class="card shadow-sm">
          <div class="card-body">
            {{-- <h5 class="card-title">Pengaturan</h5> --}}
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('courier.setting')}}" style="text-decoration: none;"><h5 class="mb-0">Pengaturan</h5></a></li>
                <li class="breadcrumb-item active h5 mb-0" aria-current="page">Profil Saya</li>
              </ol>
            </nav>
            <div class="border-bottom my-2"></div>
            <form action="{{route('courier.profile.edit')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="row g-3">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" required value="{{old('name')??auth('courier')->user()->name}}">
                    <label for="floatingInputGrid">Nama Lengkap</label>
                    @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nomor Telepon" name="phone_number" required value="{{old('phone_number')??auth('courier')->user()->phone_number}}">
                    <label for="floatingInputGrid">Nomor Telepon</label>
                    @error('phone_number')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('license_plate') is-invalid @enderror" placeholder="Plat Nomor Kendaraan" name="license_plate" required value="{{old('license_plate')??auth('courier')->user()->license_plate}}">
                    <label for="floatingInputGrid">Plat Nomor Kendaraan</label>
                    @error('license_plate')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <label class="input-group-text" for="inputGroupFile01">Avatar</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                    @error('avatar')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <input class="btn btn-danger" type="submit" value="Ubah Profil">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection