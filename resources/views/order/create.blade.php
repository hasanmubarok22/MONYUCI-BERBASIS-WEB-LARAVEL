@extends('layout.customer.app')
@section('content')
    <div class="content">

        <div class="container-fluid mt-3">
            <form class="needs-validation" novalidate action="{{ route('order.store', ['cart' => $cart]) }}" method="post">
                @csrf
                @method('post')
                <div class="row mx-3 g-3">
                    <div class="col-md-12 card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Lokasi Penjemputan</h5>
                            <div class="row g-2">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control @error('province') is-invalid @enderror"
                                                        placeholder="Provinsi" name="province" required
                                                        value="{{ old('province') ?? $address->province }}">
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
                                                    <input type="text"
                                                        class="form-control @error('city') is-invalid @enderror"
                                                        placeholder="Kota" name="city" required
                                                        value="{{ old('city') ?? $address->city }}">
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
                                                    <input type="text"
                                                        class="form-control @error('district') is-invalid @enderror"
                                                        placeholder="Kecamatan" name="district" required
                                                        value="{{ old('district') ?? $address->district }}">
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
                                                    <input type="text"
                                                        class="form-control @error('zipcode') is-invalid @enderror"
                                                        placeholder="Kode Pos" name="zipcode" required
                                                        value="{{ old('zipcode') ?? $address->zipcode }}">
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
                                                        name="other">{{ old('other') ?? $address->other }}</textarea>
                                                    <label for="floatingInputGrid">Lainnya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control bg-transparent rounded-pill border-0"
                                        placeholder="Berikan Catatan..." name="notes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Rincian Pesan</h5>
                            <div class="row g-2">
                                <div class="col-md-12 card">
                                    @foreach ($cart->services as $service)
                                        <div class="card-body justify-content-between d-flex border-bottom">
                                            <p class="card-title">{{ $service->pivot->quantity }} &times;
                                                {{ $service->name }}</p>
                                            <p class="card-title mb">Rp{{ number_format($service->price) }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    <button onclick="window.history.back();"
                                        class="btn btn-outline-primary rounded-pill w-100"
                                        style="text-decoration: none;">Tambah Pesanan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Jadwal Penjemputan</h5>
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <input class="form-control rounded-pill" type="datetime-local" name="pickedup_at"
                                        id="pickedup" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card shadow-sm">
                        <div class="card-body text-end">
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-2">
                                    <h6 class="text-secondary">Subtotal</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6 class="">Rp{{ number_format($cart->total_cost) }}</h6>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-2">
                                    <h6 class="text-secondary">Biaya Pengiriman</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6 class="">Rp20,000</h6>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end text-primary">
                                <div class="col-md-2">
                                    <h4 class="text-secondary">Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="">Rp{{ number_format($cart->total_cost + 20000) }}</h4>
                                    <input type="number" name="total_cost" value="{{ $cart->total_cost + 20000 }}" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success rounded-pill shadow">
                        <h4 class="my-2">
                            Buat Pesanan
                        </h4>
                    </button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <br>
    </div>

@endsection
