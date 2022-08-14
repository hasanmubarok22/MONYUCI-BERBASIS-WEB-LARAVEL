@extends('layout.customer.app')
@section('content')
    <div class="content">

        <div id="carouselIndicator" class="carousel carousel-dark slide bg-light" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselIndicator" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselIndicator" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselIndicator" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('src/carousel1.jpg') }}" class="d-block w-100" alt="..." style="">
                    <div class="carousel-caption">
                        <h1>Siap Online</h1>
                        <p>Dengan bekerja online, memudahkan pelanggan dan laundry untuk bekerja</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('src/carousel2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h1>Manage Cucian Laundry Mu Di Sini</h1>
                        <p>Memudahkan para pelanggan untuk me-manage cuciannya secara online</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('src/bg2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h1>Menghimpun pekerja Laundry di seluruh Dunia</h1>
                        <p>Memudahkan para pekerja Laundry untuk mengiklankan dirinya pada web ini.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselIndicator" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicator" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
        <div class="container-fluid" id="Layanan">
            <div class="row g-3 p-3 text-center">
                <div class="col-md-12 mt-5">
                    <h3 class="text-center" style="text-decoration: underline;">
                        Layanan Laundry
                    </h3>
                </div>
                <div class="col-md-6 p-4">
                    <div class="card w-50 mx-auto">
                        <div class="card-body">
                            <img src="{{ asset('src/service1.png') }}" alt="service1" class="card-img-top">
                            <p class="card-text">Menyediakan opsi laundry dengan layanan cuci sepatu
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-4">
                    <div class="card w-50 mx-auto">
                        <div class="card-body">
                            <img src="{{ asset('src/service2.png') }}" alt="service1" class="card-img-top">
                            <p class="card-text">Menyediakan opsi laundry dengan layanan cuci pakaian.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid g-3 text-center p-5" id="TentangKami"
            style="background-image: url({{ asset('src/bg2.jpg') }}); max-height: 1080px;">
            <div class="card card-body border-0 shadow col-md-12 p-5">
                <h3 class="text-center card-title mb-4" style="text-decoration: underline;">
                    Tentang Kami
                </h3>
                <p class="px-5 card-text">MO.NYUCI adalah sebuah platform penghimpun laundry yang ada di seluruh dunia.
                    MO.NYUCI
                    berawal dari keinginan kami untuk membantu para pekerja laundry serta pelanggannya untuk dapat me-manage
                    kegiatan mereka secara online dan mudah. <br><br>
                    MO.NYUCI bekerja secara online. Dimulai dari kurir pengantar barang, laundry, serta pelanggan, semuanya
                    akan di-manage secara online pada situs MO.NYUCI ini. Dengan adanya MO.NYUCI ini diharapkan pelanggan
                    dan laundry dimudahkan dalam melakukan pencucian.</p>
            </div>
        </div>
        <div class="container-fluid g-3 text-center p-5" id="FAQ">
            <div class="card card-body border-0 shadow col-md-12 p-5">
                <h3 class="text-center card-title mb-4" style="text-decoration: underline;">
                    Frequently Asked Questions
                </h3>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Bagaimana Cara Order?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body text-start">
                                <p class="mb-0">Order dapat dilakukan dengan 3 Tahap</p>
                                <ol>
                                    <li>Pergi ke halaman Laundry yang ingin Anda Order</li>
                                    <li>Pilih banyaknya layanan dan jumlah pesanan yang Anda inginkan</li>
                                    <li>Tekan Tombol Total Harga</li>
                                    <li>Atur Alamat, Waktu Penjemputan, catatan, dan pastikan layanan yang Anda inginkan
                                        sudah tepat</li>
                                    <li>Setelah yakin dengan masukkan Anda, lanjutkan dengan menekan tombol Buat Pesanan
                                    </li>
                                    <li>Pesanan dapat di cek pada menu setting bagian Pesanan</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bagaimana Proses Pembayaran
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body text-start">
                                <p class="mb-0">Saat ini proses pembayaran dapat dilakukan ketika kurir kami datang ke rumah
                                    Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid p-5 main-gradient-color">
        <div class="row g-3 p-3">
            <div class="col-md-4 p-3 text-light">
                <h5>Contact Us</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent"><i class="fas fa-phone"></i> 081317722368</li>
                    <li class="list-group-item bg-transparent"><i class="fab fa-whatsapp"></i> 081319629068</li>
                    <li class="list-group-item bg-transparent"><i class="fas fa-at"></i> monyuci@monyuci.com</li>
                </ul>
            </div>
            <div class="col-md-4 p-3 text-light">
                <h5>Social Media</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent">
                        <a href="#" class="text-light" style="text-decoration: none;">
                            <i class="fab fa-twitter"></i> @Mo.nyuci
                        </a>
                    </li>
                    <li class="list-group-item bg-transparent">
                        <a href="#" class="text-light" style="text-decoration: none;">
                            <i class="fab fa-instagram"></i> @Mo.nyuci
                        </a>
                    </li>
                    <li class="list-group-item bg-transparent">
                        <a href="#" class="text-light" style="text-decoration: none;">
                            <i class="fab fa-facebook"></i> Mo.nyuci_official
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 p-3 text-light">
                <h5>Daftar</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent">
                        <a href="{{ route('register.laundry') }}" class="text-light" style="text-decoration: none;">
                            <i class="fas fa-tshirt"></i> Daftar Penatu
                        </a>
                    </li>
                    <li class="list-group-item bg-transparent">
                        <a href="{{ route('register.customer') }}" class="text-light" style="text-decoration: none;">
                            <i class="fas fa-user"></i> Daftar Pelanggan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
@endsection
