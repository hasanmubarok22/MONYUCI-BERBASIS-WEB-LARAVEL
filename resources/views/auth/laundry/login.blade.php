@extends('layout.app')

@section('content')
    <div class="center-screen h-100">
        <div class="container-fluid p-5 h-100 align-item-center">
            <div class="row h-100 align-items-center">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 25rem;">
                        <div class="card-body p-5 text-center">
                            <h5 class="card-title mb-3">LOGIN PENATU</h5>
                            <form action="{{ route('laundry.login') }}" class="needs-validation" novalidate method="post">
                                @csrf
                                @method('post')
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingUsername" placeholder="Username"
                                        name="username" required>
                                    <label for="floatingUsername">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                        name="password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                @if (session('status'))
                                    <div class="badge text-danger">{{ session('status') }}</div>
                                @endif
                                <button type="submit" class="btn btn-primary w-100">Log In</button>
                            </form>
                            <h6 class="mt-3">Belum punya akun? <a href="{{ route('register') }}"
                                    class="card-link">Daftar</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
