<tbody>
    @foreach ($orders as $order)
        <!-- Modal -->
        <div class="modal fade" id="commentModal{{ $order->id }}" tabindex="-2" aria-labelledby="commentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('laundry.comment.update', $order->laundry) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <h5 class="modal-title" id="commentModalLabels">
                                    Komentarmu</h5>
                                <h6><small class="text-secondary" id="commentModalLabels">untuk
                                        {{ $order->laundry->name }}</small></h6>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating">
                                <textarea name="comment" id="comment" class="form-control"
                                    placeholder="Komentarmu"></textarea>
                                <label for="floatingComment">Komentarmu</label>
                            </div>
                            <div>
                                <div id="rating_bar">
                                    <a href="#" style="text-decoration: none; color: #FFC107;"
                                        class="fas fa-star star rate_1"></a>
                                    <a href="#" style="text-decoration: none; color: #212529;"
                                        class="fas fa-star star rate_2"></a>
                                    <a href="#" style="text-decoration: none; color: #212529;"
                                        class="fas fa-star star rate_3"></a>
                                    <a href="#" style="text-decoration: none; color: #212529;"
                                        class="fas fa-star star rate_4"></a>
                                    <a href="#" style="text-decoration: none; color: #212529;"
                                        class="fas fa-star star rate_5"></a>
                                    <input value="1" type="number" name="rating" class="rating-input" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Berikan
                                Komentar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <tr>
            <td>
                <small>
                    {{ $order->id }}
                </small>
            </td>
            <td class="text-center">
                <h6 class="badge bg-dark text-light rounded-pill">
                    {{ $order->laundry->name }}
                </h6>
                @foreach ($order->services as $service)
                    <small class="badge bg-light text-dark rounded-pill">{{ $service->pivot->quantity }}
                        &times; {{ $service->name }}</small>
                @endforeach
            </td>
            <td data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $order->address->compact() }}">
                {{ Str::limit($order->address->compact(), 30) }}
            </td>
            <td class="text-end">{{ number_format($order->total_cost) }}</td>
            <td>{{ $order->pickedup_at->format('d/m/Y H:i:s') }}</td>
            <td class="text-center">{{ $order->notes ?? '--' }}</td>
            <td>
                @if ($order->status === 'Menunggu Kurir')
                    <div class="badge bg-info text-dark rounded-pill status">Menunggu
                        Kurir</div>
                @elseif ($order->status==='Proses Pengiriman')
                    <div class="badge bg-warning text-dark rounded-pill status">Proses
                        Pengiriman</div>
                @elseif ($order->status==='Diterima Penatu')
                    <div class="badge bg-success rounded-pill status">Diterima Penatu
                    </div>
                @elseif ($order->status==='Proses Pencucian')
                    <div class="badge bg-warning text-dark rounded-pill status">Proses
                        Pencucian</div>
                @elseif ($order->status==='Selesai Dicuci')
                    <div class="badge bg-info text-dark rounded-pill status">Selesai
                        Dicuci</div>
                @elseif ($order->status==='Proses Pengembalian')
                    <div class="badge bg-primary rounded-pill status">Proses
                        Pengembalian</div>
                @elseif ($order->status==='Diterima Pelanggan')
                    <div class="badge bg-success rounded-pill status">Diterima Pelanggan
                    </div>
                @elseif ($order->status==='Batal')
                    <div class="badge bg-danger rounded-pill status">Pesanan Dibatalkan
                    </div>
                @endif
            </td>
            <td class="text-center">
                @if ($order->status !== 'Menunggu Kurir' && $order->status !== 'Proses Pengembalian' && $order->status !== 'Diterima Pelanggan')
                    --
                @else
                    <a href="" class="btn badge bg-primary rounded-pill dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false" style="text-decoration: none;">Edit</a>
                    <ul class="dropdown-menu">
                        @if ($order->status === 'Menunggu Kurir')
                            <li><a class="dropdown-item" href="#"
                                    wire:click.prevent="updateStatus('Batal', {{ $order }})">Batalkan</a></li>
                        @elseif ($order->status==='Proses Pengembalian')
                            <li><a class=" dropdown-item" href="#"
                                    wire:click.prevent="updateStatus('Diterima Pelanggan', {{ $order }})">Terima
                                    Pesanan</a>
                            </li>
                        @elseif ($order->status==='Diterima Pelanggan')
                            <li><a class=" dropdown-item" href="{{ route('laundry.show', $order->laundry) }}">Pesan
                                    lagi</a></li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#commentModal{{ $order->id }}">Berikan
                                    Komentar</a>
                            </li>
                        @endif
                    </ul>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>
