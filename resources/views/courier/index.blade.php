@extends('layout.courier.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                {{-- <li class="nav-item w-25 text-center"
                                    role="presentation">
                                    <a class="nav-link @if ($type==='available' ) active @endif" id="available-tab"
                                        href="{{ route('courier.index', ['type' => 'available']) }}">Pesanan Tersedia</a>
                                </li> --}}
                                <li class="nav-item w-25 text-center" role="presentation">
                                    <a class="nav-link @if ($type==='confirm' || $type==='' ) active @endif" id="confirm-tab"
                                        href="{{ route('courier.index', ['type' => 'confirm']) }}">Konfirmasi Pesanan</a>
                                </li>
                                <li class="nav-item w-25 text-center" role="presentation">
                                    <a class="nav-link @if ($type==='input' ) active @endif" id="input-tab"
                                        href="{{ route('courier.index', ['type' => 'input']) }}">Input Data</a>
                                </li>
                                <li class="nav-item w-25 text-center" role="presentation">
                                    <a class="nav-link @if ($type==='notification' ) active @endif" id="notification-tab"
                                        href="{{ route('courier.index', ['type' => 'notification']) }}">Notifikasi</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                {{--
                                <!-- available -->
                                <div class="tab-pane fade @if ($type==='available' ) show active @endif" id="available" role="tabpanel"
                                    aria-labelledby="available-tab">
                                    <div class="p-3">
                                        <table class="table table-bordered align-middle">
                                            <thead class="thead-dark text-center">
                                                <tr>
                                                    <th class="align-middle" style="width: 15%">ID</th>
                                                    <th class="align-middle" style="width: 15%">Pemesan | Laundry</th>
                                                    <th class="align-middle" style="width: 15%">Alamat Penjemputan</th>
                                                    <th class="align-middle" style="width: 15%">Waktu Penjemputan</th>
                                                    <th class="align-middle" style="width: 15%">Produk</th>
                                                    <th class="align-middle" style="width: 10%">Total(Rp)</th>
                                                    <th class="align-middle" style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ordersAvailable as $orderAvailable)
                                                    <tr>
                                                        <td>
                                                            <small>
                                                                {{ $orderAvailable->id }}
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <h6 class="badge bg-dark text-light rounded-pill">
                                                                {{ $orderAvailable->user->name }}
                                                            </h6>
                                                            <h6 class="badge bg-info text-dark rounded-pill">
                                                                {{ $orderAvailable->Laundry->name }}
                                                            </h6>
                                                        </td>
                                                        <td data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="{{ $orderAvailable->address->compact() }}">
                                                            {{ Str::limit($orderAvailable->address->compact(), 30) }}
                                                        </td>
                                                        <td>{{ $orderAvailable->pickedup_at->format('d/m/Y H:i:s') }}</td>
                                                        <td>
                                                            @foreach ($orderAvailable->services as $service)
                                                                <small
                                                                    class="badge bg-light text-dark rounded-pill">{{ $service->pivot->quantity }}
                                                                    &times; {{ $service->name }}</small>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <h6>{{ number_format($orderAvailable->total_cost) }}</h6>
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($orderAvailable->status !== 'Menunggu Kurir' && $orderAvailable->status !== 'Proses Pengembalian' && $orderAvailable->status !== 'Diterima Pelanggan')
                                                                --
                                                                @else
                                                                <a href="" class="btn badge bg-success rounded-pill"
                                                                    style="text-decoration: none;">Ambil Pesanan</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}
                                <!-- confirm -->
                                <div class="tab-pane fade @if ($type==='confirm' || $type==='' ) show active @endif" id="confirm" role="tabpanel"
                                    aria-labelledby="review-tab">
                                    <div class="p-3">
                                        <table class="table table-bordered align-middle">
                                            <thead class="thead-dark text-center">
                                                <tr>
                                                    <th class="align-middle" style="width: 15%">ID</th>
                                                    <th class="align-middle" style="width: 15%">Pemesan | Laundry</th>
                                                    <th class="align-middle" style="width: 15%">No Telepon</th>
                                                    <th class="align-middle" style="width: 15%">Alamat Penjemputan</th>
                                                    <th class="align-middle" style="width: 15%">Waktu Penjemputan</th>
                                                    <th class="align-middle" style="width: 15%">Produk</th>
                                                    <th class="align-middle" style="width: 10%">Total(Rp)</th>
                                                    <th class="align-middle" style="width: 10%">Status</th>
                                                    <th class="align-middle" style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <livewire:courier-orders-table :ordersConfirm="$ordersConfirm" />
                                        </table>
                                    </div>
                                </div>
                                <!-- input -->
                                <div class="tab-pane fade @if ($type==='input' ) show active @endif" id="input" role="tabpanel"
                                    aria-labelledby="input-tab">
                                    <div class="p-3">
                                        <div class="row g-2">
                                            <div class="col-md-12">
                                                <form action="{{ route('courier.index') }}" method="get">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingId"
                                                            placeholder="ID Pesanan" name="order"
                                                            value="@isset($order) {{ $order }} @endisset">
                                                        <label for="floatingId">ID Pesanan</label>
                                                    </div>
                                                </form>
                                            </div>
                                            @if ($orderEdit !== [] && $orderEdit !== null)
                                                <form
                                                    action="{{ route('order.confirmation.update', ['order' => $orderEdit->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    @foreach ($orderEdit->services as $service)
                                                        <div class="row g-2 mt-3">
                                                            <div class="col-md-4">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control disabled"
                                                                        id="floatingService" placeholder="Paket"
                                                                        name="service" value="{{ $service->name }}"
                                                                        disabled>
                                                                    <label for="floatingService">Paket</label>
                                                                </div>
                                                            </div>
                                                            <h5 class="col-md-1 align-self-center text-center">&times;</h5>
                                                            <div class="col-md-4">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="floatingId"
                                                                        placeholder="floatingQty" data-name="quantity"
                                                                        name="quantity[{{ $service->id }}][quantity]"
                                                                        data-price={{ $service->price }}
                                                                        value="{{ $service->pivot->quantity }}">
                                                                    <label for="floatingQty">Kuantitas</label>
                                                                </div>
                                                            </div>
                                                            <h5 class="col-md-1 align-self-center text-center"> &#61;</h5>
                                                            <div class="col-md-2">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control disabled text-end subtotal"
                                                                        id="floatingService" placeholder="Subtotal"
                                                                        name="cost"
                                                                        value="{{ number_format($service->price * $service->pivot->quantity) }}"
                                                                        disabled>
                                                                    <label for="floatingCost">Subtotal</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="row px-0 mx-0 mt-3 g-3">
                                                        <div class="col-md-2 offset-10">
                                                            <div class="form-floating">
                                                                <input type="text"
                                                                    class="form-control disabled text-end total"
                                                                    id="floatingService" placeholder="Total"
                                                                    name="total_cost"
                                                                    value="{{ number_format($service->price * $service->pivot->quantity) }}"
                                                                    disabled>
                                                                <label for="floatingTotalCost">Total</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 offset-10">
                                                            <input type="submit" value="Konfirmasi"
                                                                class="btn btn-primary mb-3">
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                            @if ($orderEdit === null)
                                                <div class="col-md-12">
                                                    <div class="card border-0 shadow">
                                                        <div class="card-body">
                                                            <h5>Data tidak ditemukan</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- notification -->
                                <div class="tab-pane fade @if ($type==='notification' ) show active @endif" id="notification" role="tabpanel"
                                    aria-labelledby="notification-tab">
                                    <livewire:notifications-table :user="auth('courier')->user()" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
