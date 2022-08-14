<div class="sidenav">
    <div class="text-center mt-3">
        <img class="card-img rounded-circle" src="@if (!auth()->user()->avatar) {{ asset('src/bg.png') }}@else{{ asset(auth()->user()->avatar) }} @endif"
        alt="laundry" style="height: 128px; width: 128px; object-fit: cover;">
        <h5 class="mt-3">{{ auth()->user()->name }}</h5>
    </div>
    <div class="border-bottom mb-3"></div>
    <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a href="#" class="nav-link @isset($pesan)active @endisset">
                <span class="row d-flex justify-content-start align-items-center">
                    <span class="col-md-1 fas fa-comment"></span>
                    <p class="col-md-1 mb-0">Pesan</p>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('account.favorite') }}" class="nav-link @isset($favorit)active @endisset">
                <span class="row d-flex justify-content-start align-items-center">
                    <span class="col-md-1 fas fa-heart"></span>
                    <p class="col-md-1 mb-0">Favorit</p>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('order') }}" class="nav-link @isset($pesanan)active @endisset">
                <span class="row d-flex justify-content-start align-items-center">
                    <span class="col-md-1 fas fa-box-open"></span>
                    <p class="col-md-1 mb-0">Pesanan</p>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('notifications') }}" class="nav-link @isset($notifikasi)active @endisset">
                <span class="row d-flex justify-content-start align-items-center">
                    <span class="col-md-1 fas fa-bell"></span>
                    <p class="col-md-1 mb-0">Notifikasi</p>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('account.setting') }}" class="nav-link @isset($setting)active @endisset">
                <span class="row d-flex justify-content-start align-items-center">
                    <span class="col-md-1 fas fa-cog"></span>
                    <p class="col-md-1 mb-0">Pengaturan</p>
                </span>
            </a>
        </li>
    </ul>
</div>
