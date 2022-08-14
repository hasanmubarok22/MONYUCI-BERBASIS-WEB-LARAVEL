<div class="sidenav">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapsePesanan" role="button" aria-expanded="false" aria-controls="collapsePesanan">
          <small class="fas fa-box"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">Pesanan</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapsePesanan">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('laundry.order')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Pesanan Saya
            </a>
            <a href="{{route('laundry.order', ['type'=>'Batal'])}}" class="small list-group-item list-group-item-action">
              Pembatalan
            </a>
            <a href="{{route('laundry.order', ['type'=>'Proses Pengembalian'])}}" class="small list-group-item list-group-item-action">
              Pengembalian
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapsePengiriman" role="button" aria-expanded="false" aria-controls="collapsePengiriman">
          <small class="fas fa-tshirt" style="max-width: 16px;"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">Pencucian</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapsePengiriman">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('laundry.order', ['type'=>'Diterima Penatu'])}}" class="small list-group-item list-group-item-action" aria-current="true">
              Cucian Saya
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseProduk" role="button" aria-expanded="false" aria-controls="collapseProduk">
          <small class="fas fa-shopping-bag"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">Produk</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapseProduk">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('laundry.services')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Produk Jasa Saya
            </a>
            <a href="{{route('laundry.services.create')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Tambah Produk Baru
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseKeuangan" role="button" aria-expanded="false" aria-controls="collapseProduk">
          <small class="fas fa-wallet"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">Keuangan</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapseKeuangan">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('laundry.finance')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Penghasilan Saya
            </a>
            <a href="{{route('laundry.bank')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Rekening Bank
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapsePengaturan" role="button" aria-expanded="false" aria-controls="collapsePengaturan">
          <small class="fas fa-cog" style="max-width: 16px;"></small>
          <div class="ps-3 d-flex justify-content-between align-items-center w-100">
            <h6 class="m-0">Pengaturan</h6>
            <i class="fas float-end fa-chevron-down"></i>
          </div>
        </a>
        <div class="collapse show" id="collapsePengaturan">
          <div class="list-group ps-4 ms-2 list-group-flush">
            <a href="{{route('laundry.account')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Akun Saya
            </a>
            <a href="{{route('laundry.address')}}" class="small list-group-item list-group-item-action" aria-current="true">
              Alamat Saya
            </a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>