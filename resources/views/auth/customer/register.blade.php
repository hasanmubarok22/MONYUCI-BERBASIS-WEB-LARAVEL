@extends('layout.app')

@section('content')
    <div class="center-screen h-100 content">
        <div class="container-fluid p-3 h-100 align-item-center">
            <div class="row h-100 align-items-center">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 50rem;">
                        <div class="card-body p-3 text-center">
                            <h5 class="card-title mb-3">DAFTAR PELANGGAN</h5>
                            <form action="{{ route('register.customer') }}" class="needs-validation" novalidate
                                method="post">
                                @csrf
                                @method('post')
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nama Lengkap" name="name" required value="{{ old('name') }}">
                                            <label for="floatingInputGrid">Nama Lengkap</label>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Username" name="username" required
                                                value="{{ old('username') }}">
                                            <label for="floatingInputGrid">Username</label>
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="name@example.com" name="email" required
                                                value="{{ old('email') }}">
                                            <label for="floatingInputGrid">Email</label>
                                            @error('email')
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
                                                value="{{ old('phone_number') }}">
                                            <label for="floatingInputGrid">Nomor Telepon</label>
                                            @error('phone_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                                placeholder="Tanggal Lahir" name="birthday" required
                                                value="{{ old('birthday') }}">
                                            <label for="floatingInputGrid">Tanggal Lahir</label>
                                            @error('birthday')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password" required>
                                            <label for="floatingPassword">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="Konfirmasi" name="password_confirmation" required>
                                            <label for="floatingInputGrid">Konfirmasi Password</label>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                                </div>
                            </form>
                            <h6 class="mt-3">Sudah punya akun? <a href="{{ route('login') }}" class="card-link">Log In</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
