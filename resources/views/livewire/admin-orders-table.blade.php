<tbody>
    @forelse ($latest as $order)
        <livewire:admin-order-item :order="$order" :key="$order->id" />
    @empty
        <tr>
            <td colspan="6" class="text-center">
                <h5>&times; Tidak Ada Pesanan</h5>
            </td>
        </tr>
    @endforelse
</tbody>
