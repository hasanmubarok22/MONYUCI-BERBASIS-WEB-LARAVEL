<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('icon.png') }}">
    <title>MO.NYUCI
        @isset($title)
            | {{ $title }}
        @endisset
    </title>
    @livewireStyles
</head>

<body>
    <nav class="navbar fixed-top navbar-dark main-gradient-color navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('laundry.index') }}">
                <img src="{{ asset('icon2.png') }}" alt="icon" width="24" height="24" class="d-inline-block align-top">

                MO.NYUCI | Laundry
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item my-auto me-2">
                        <a class="btn btn-light shadow-sm rounded-pill py-1"
                            href="{{ route('laundry.notifications') }}">
                            @if (auth('laundry')
        ->user()
        ->notifications->count() > 0)
                                <span
                                    class="badge bg-danger float-end rounded-pill position-absolute m-2">{{ auth('laundry')->user()->notifications->count() }}</span>
                            @endif
                            <i class="far fa-bell"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="btn btn-light shadow-sm rounded-pill py-1" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="rounded-circle card-img"
                                    src="{{ asset(auth('laundry')->user()->avatar ?? 'src/bg.png') }}  " alt=""
                                    style="height: 32px; width:32px; object-fit: cover;">
                                <h6 href="" class="mb-0 align-middle d-inline">{{ auth('laundry')->user()->name }}</h6>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a href="{{ route('laundry.account') }}" class="dropdown-item" type="button"><i
                                            class="fas fa-cog"></i> Setting</a>
                                </li>
                                <li>
                                    <a href="{{ route('laundry.order') }}" class="dropdown-item" type="button"><i
                                            class="fas fa-box"></i> Pesanan Saya</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" type="button" data-bs-toggle="modal"
                                        data-bs-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin Untuk Keluar?
                </div>
                <form action="{{ route('logout', ['laundry' => true]) }}" method="post">
                    @csrf
                    @method('post')
                    <div class="modal-footer d-flex justify-content-between">
                        <div class="row w-100">
                            <button type="button" class="btn btn-primary col-md-6"
                                data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger col-md-6">Ya</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script> --}}

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>


    <!-- Custom Script -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

    </script>
    @yield('script')
    @livewireScripts
</body>

</html>
