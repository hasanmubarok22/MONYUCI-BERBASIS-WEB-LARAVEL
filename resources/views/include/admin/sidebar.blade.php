<div class="sidenav">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseDashboard" role="button" aria-expanded="false" aria-controls="collapseDashboard">
          <small class="fas fa-box"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">Dashboard</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapseDashboard">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('admin.index')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Overview
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseUser" role="button" aria-expanded="false" aria-controls="collapseUser">
          <small class="fas fa-tshirt" style="max-width: 16px;"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">User</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapseUser">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('admin.user', ['type'=>'customer'])}}" class="small list-group-item list-group-item-action" aria-current="true">
              Pelanggan
            </a>
            <a href="{{route('admin.user', ['type'=>'laundry'])}}" class="small list-group-item list-group-item-action" aria-current="true">
              Penatu
            </a>
            <a href="{{route('admin.user', ['type'=>'courier'])}}" class="small list-group-item list-group-item-action" aria-current="true">
              Kurir
            </a>
            <a href="{{route('admin.user.edit')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Ubah Data User
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseOrder" role="button" aria-expanded="false" aria-controls="collapseOrder">
          <small class="fas fa-shopping-bag"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">Pesanan</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapseOrder">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('admin.orders')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Kontrol Pesanan
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseSetting" role="button" aria-expanded="false" aria-controls="collapseSetting">
          <small class="fas fa-cog"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">Pengaturan</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapseSetting">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('admin.setting')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Pengaturan Akun Saya
            </a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>