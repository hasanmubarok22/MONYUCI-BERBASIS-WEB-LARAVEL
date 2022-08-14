@extends('layout.admin.app')
@section('content')
<div class="content-sidebar">

  <div class="d-flex justify-content-between h-100">
    @include('include.admin.sidebar')
    <div class="container-fluid p-4">
      <div class="row">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Pengaturan</h5>
            <div class="border-bottom my-2"></div>
            <div class="row g-3">
              <a href="{{route('admin.profile')}}" class="card border-0 shadow col-md-12" style="text-decoration: none;">
                <div class="card-body d-flex justify-content-between">
                  <h6 class="card-text mb-0">Profil Saya</h6>
                  <i class="fas fa-chevron-right"></i>
                </div>
              </a>
            </div>
            <div class="border-bottom my-4"></div>
            <div class="row g-3">
              <a href="#" class="p-3 shadow btn-danger btn col-md-12 d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <h6 class="mb-0">Keluar</h6>
                <i class="fas fa-sign-out-alt"></i>
              </a>
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
                    <form action="{{route('logout', ['admin'=>true])}}" method="post">
                    @csrf
                    @method('post')
                    <div class="modal-footer d-flex justify-content-between">
                      <div class="row w-100">
                        <button type="button" class="btn btn-primary col-md-6" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger col-md-6">Ya</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection