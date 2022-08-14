@extends('layout.laundry.app', ['user'=>true])
@section('content')
    <div class="content-sidebar">

        <div class="d-flex justify-content-between h-100">
            @include('include.laundry.sidebar')
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Pengaturan Akun Saya</h5>
                            <div class="border-bottom my-2"></div>
                            <form action="{{ route('laundry.profile.edit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nama Toko" name="name" required
                                                value="{{ old('name') ?? auth('laundry')->user()->name }}">
                                            <label for="floatingInputGrid">Nama Toko</label>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                placeholder="Nomor Telepon" name="phone_number" required
                                                value="{{ old('phone_number') ?? auth('laundry')->user()->phone_number }}">
                                            <label for="floatingInputGrid">Nomor Telepon</label>
                                            @error('phone_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="time"
                                                class="form-control @error('operational_start') is-invalid @enderror"
                                                placeholder="Nomor Telepon" name="operational_start" required value="{{ old('operational_start') ??
                            auth('laundry')->user()->operational_start->format('H:i') }}">
                                            <label for="floatingInputGrid">Jam Buka</label>
                                            @error('operational_start')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="time"
                                                class="form-control @error('operational_end') is-invalid @enderror"
                                                placeholder="Nomor Telepon" name="operational_end" required value="{{ old('operational_end') ??
                            auth('laundry')->user()->operational_end->format('H:i') }}">
                                            <label for="floatingInputGrid">Jam Tutup</label>
                                            @error('operational_end')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="input-group-text" for="inputGroupFile01">Avatar</label>
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                                name="avatar">
                                            @error('avatar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
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
