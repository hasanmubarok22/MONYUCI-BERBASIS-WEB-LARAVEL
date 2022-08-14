<div class="card card-body shadow border-0">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-start align-items-center">
            <img class="rounded-circle card-img mx-2" src="{{ asset($order->user->avatar ?? 'src/bg.png') }}" alt=""
                style="height: 32px; width:32px; object-fit: cover;">
            <h6 class="mb-0">{{ $order->user->name }}</h6>
            @if ($order->status === 'Diterima Penatu' || $order->status === 'Proses Pencucian' || $order->status === 'Selesai Dicuci')
                <a href="" class="btn badge bg-primary rounded-pill dropdown-toggle ms-auto" data-bs-toggle="dropdown"
                    aria-expanded="false" style="text-decoration: none;">Edit</a>
                <ul class="dropdown-menu">
                    @if ($order->status === 'Diterima Penatu')
                        <li><a class="dropdown-item" href="#"
                                wire:click.prevent="updateStatus('Proses Pencucian', {{ $order }})">Diproses</a>
                        </li>
                    @elseif ($order->status === 'Proses Pencucian')
                        <li><a class="dropdown-item" href="#"
                                wire:click.prevent="updateStatus('Selesai Dicuci', {{ $order }})">Selesai</a>
                        </li>
                    @elseif ($order->status === 'Selesai Dicuci')
                        <li><a class="dropdown-item" href="#"
                                wire:click.prevent="updateStatus('Proses Pengembalian', {{ $order }})">Diambil Kurir</a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
    <div class="border-bottom my-3"></div>
    <div class="row">
        <div class="col-md-3 vl">
            {{ $order->address->compact() }}
        </div>
        <div class="col-md-2 vl">
            @foreach ($order->services as $service)
                <small class="badge bg-dark rounded-pill">{{ $service->name }}
                    &times; {{ $service->pivot->quantity }}</small>
            @endforeach
        </div>
        <div class="col-md-2 vl text-end">
            Rp{{ number_format($order->total_cost) }}
        </div>
        <div class="col-md-2 vl">
            {{ $order->status }}
        </div>
        <div class="col-md-3  text-center">
            <p class="mb-0">No Pesanan</p>
            <p>{{ $order->id }}</p>
        </div>
    </div>
</div>
