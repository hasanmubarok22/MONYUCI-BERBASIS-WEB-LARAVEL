<tr>
    <td>{{ $order->id }}</td>
    <td>{{ $order->user->name }}</td>
    <td>{{ $order->laundry->name }}</td>
    <td>{{ $order->courier->name ?? '' }}</td>
    <td>
        @foreach ($order->services as $service)
            <div class="badge bg-dark text-light">
                {{ $service->name }} &times; {{ $service->pivot->quantity }}
            </div>
        @endforeach
    </td>
    <td>{{ number_format($order->total_cost) }}</td>
    <td>
        <span class="badge bg-success">{{ $order->status }}</span>
    </td>
    <td>
        @if ($order->status === 'Proses Pengiriman' || $order->status === 'Proses Pengembalian')

            <a href="" class="btn badge bg-primary rounded-pill dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false" style="text-decoration: none;">Edit</a>
            <ul class="dropdown-menu">
                @if ($order->status === 'Proses Pengiriman')
                    <li>
                        <a class="dropdown-item" href="#"
                            wire:click.prevent="updateStatus('Diterima Penatu', {{ $order }})">
                            Diterima Penatu
                        </a>
                    </li>
                @elseif ($order->status==='Proses Pengembalian')
                    <li><a class="dropdown-item" href="#"
                            wire:click.prevent="updateStatus('Diterima Pelanggan', {{ $order }})">Diterima
                            Pelanggan</a></li>
                @endif
            </ul>
        @else
            --
        @endif
    </td>
</tr>
