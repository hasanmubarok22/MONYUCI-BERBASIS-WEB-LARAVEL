@extends('layout.admin.app')
@section('content')
    <div class="content-sidebar">
        <div class="d-flex justify-content-between h-100">
            @include('include.admin.sidebar')
            <div class="container-fluid">
                <div class="row p-3 g-3">
                    <div class="card col-md-12 shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="mb-4">Ubah User</h4>
                            <form action="" method="get">
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInputValue"
                                                placeholder="ID User" name="id" value="{{ $id }}">
                                            <label for="floatingInputValue">ID User</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelectGrid"
                                                aria-label="Floating label select example" name="role">
                                                <option value="customer" @if ($role === 'customer') selected @endif>Customer</option>
                                                <option value="laundry" @if ($role === 'laundry') selected @endif>Laundry</option>
                                                <option value="courier" @if ($role === 'courier') selected @endif>Courier</option>
                                            </select>
                                            <label for="floatingSelectGrid">Role User</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cari Data</button>
                                </div>
                            </form>
                            @if ($user)
                                <div class="row g-3">

                                    <form action="{{ route('admin.user.update', ['role' => $role, 'id' => $id]) }}"
                                        method="post" class="mt-3">
                                        @csrf
                                        @method('put')
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="floatingInputValue" placeholder="Nama User" name="name"
                                                        value="{{ $user->name ?? '' }}">
                                                    <label for="floatingInputValue">Nama User</label>
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
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="floatingInputValue" placeholder="Email" name="email"
                                                        value="{{ $user->email ?? '' }}">
                                                    <label for="floatingInputValue">Email</label>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if ($role === 'courier')
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control @error('license_plate') is-invalid @enderror"
                                                            id="floatingInputValue" placeholder="Plat Nomor Kendaraan"
                                                            name="license_plate" value="{{ $user->license_plate ?? '' }}">
                                                        <label for="floatingInputValue">Plat Nomor Kendaraan</label>
                                                        @error('license_plate')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                            <button type="submit" class="btn btn-success">Ubah Data</button>
                                        </div>
                                    </form>
                                    <form class="col-md-12"
                                        action="{{ route('admin.user.delete', ['user' => $id, 'role' => $role]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger w-100">Hapus User</button>
                                    </form>
                                </div>
                            @elseif($id==='')
                                <h5 class="p-3">Tidak ditemukan</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
