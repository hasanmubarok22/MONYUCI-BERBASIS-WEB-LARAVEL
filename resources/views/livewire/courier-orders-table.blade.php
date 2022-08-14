<tbody>
    @foreach ($ordersConfirm as $orderConfirm)
        <tr>
            <td>
                <small>
                    {{ $orderConfirm->id }}
                </small>
            </td>
            <td>
                <h6 class="badge bg-dark text-light rounded-pill">
                    {{ $orderConfirm->user->name }}
                </h6>
                <h6 class="badge bg-info text-dark rounded-pill">
                    {{ $orderConfirm->Laundry->name }}
                </h6>
            </td>
            <td>
                <h6 class="badge bg-dark text-light rounded-pill">
                    {{ $orderConfirm->user->phone_number }}
                </h6>
            </td>
            <td data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $orderConfirm->address->compact() }}">
                {{ Str::limit($orderConfirm->address->compact(), 30) }}
            </td>
            <td>{{ $orderConfirm->pickedup_at->format('d/m/Y H:i:s') }}</td>
            <td>
                @foreach ($orderConfirm->services as $service)
                    <small class="badge bg-light text-dark rounded-pill">{{ $service->pivot->quantity }}
                        &times; {{ $service->name }}</small>
                @endforeach
            </td>
            <td>
                <h6>{{ number_format($orderConfirm->total_cost) }}</h6>
            </td>
            <td><span class="badge bg-info">{{ $orderConfirm->status }}</span>
            </td>
            <td class="text-center">
                @if ($orderConfirm->status !== 'Menunggu Kurir' && $orderConfirm->status !== 'Proses Pengembalian' && $orderConfirm->status !== 'Proses Pengiriman' && $orderConfirm->status !== 'Selesai Dicuci')
                    --
                @else
                    <a href="" class="btn badge bg-primary rounded-pill dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false" style="text-decoration: none;">Edit</a>
                    <ul class="dropdown-menu">
                        @if ($orderConfirm->status === 'Proses Pengiriman')
                            <li>
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="updateStatus('Diterima Penatu', {{ $orderConfirm }})">
                                    Diterima Penatu
                                </a>
                            </li>
                        @elseif ($orderConfirm->status==='Menunggu Kurir')
                            <li>
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="updateStatus('Proses Pengiriman', {{ $orderConfirm }})">
                                    Diterima Kurir
                                </a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('courier.index', ['order' => $orderConfirm->id, 'type' => 'input']) }}">Konfirmasi
                                    Pesanan</a></li>
                        @elseif ($orderConfirm->status==='Proses Pengembalian')
                            <li><a class="dropdown-item" href="#"
                                    wire:click.prevent="updateStatus('Diterima Pelanggan', {{ $orderConfirm }})">Diterima
                                    Pelanggan</a></li>
                        @elseif ($orderConfirm->status==='Selesai Dicuci')
                            <li><a class="dropdown-item" href="#"
                                    wire:click.prevent="updateStatus('Proses Pengembalian', {{ $orderConfirm }})">Diterima
                                    Kurir</a>
                            </li>
                        @endif
                    </ul>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>
