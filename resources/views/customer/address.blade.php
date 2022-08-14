@extends('layout.customer.app')
@section('content')
    <div class="content-sidebar">

        <div class="d-flex justify-content-between h-100">
            @include('include.customer.sidebar',['setting'=>true])
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Pengaturan</h5>
                            --}}
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                                aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('account.setting') }}"
                                            style="text-decoration: none;">
                                            <h5 class="mb-0">Pengaturan</h5>
                                        </a></li>
                                    <li class="breadcrumb-item active h5 mb-0" aria-current="page">Alamat Saya</li>
                                </ol>
                            </nav>
                            <div class="border-bottom my-2"></div>
                            <form action="{{ route('account.address.edit') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nama Lengkap" name="name" required
                                                value="{{ old('name') ?? auth()->user()->name }}">
                                            <label for="floatingInputGrid">Nama Penerima</label>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('province') is-invalid @enderror"
                                                placeholder="Provinsi" name="province" required
                                                value="{{ old('province') ?? auth()->user()->address->province }}">
                                            <label for="floatingInputGrid">Provinsi</label>
                                            @error('province')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                placeholder="Kota" name="city" required
                                                value="{{ old('city') ?? auth()->user()->address->city }}">
                                            <label for="floatingInputGrid">Kota</label>
                                            @error('city')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('district') is-invalid @enderror"
                                                placeholder="Kecamatan" name="district" required
                                                value="{{ old('district') ?? auth()->user()->address->district }}">
                                            <label for="floatingInputGrid">Kecamatan</label>
                                            @error('district')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('zipcode') is-invalid @enderror"
                                                placeholder="Kode Pos" name="zipcode" required
                                                value="{{ old('zipcode') ?? auth()->user()->address->zipcode }}">
                                            <label for="floatingInputGrid">Kode Pos</label>
                                            @error('zipcode')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <textarea type="text" class="form-control" placeholder="Lainnya"
                                                name="other">{{ old('other') ?? auth()->user()->address->other }}</textarea>
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
