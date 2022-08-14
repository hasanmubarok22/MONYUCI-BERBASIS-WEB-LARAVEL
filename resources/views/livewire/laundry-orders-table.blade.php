<div class="row g-3">
    <div class="card card-body shadow border-0 col-md-12 bg-success text-light">
        <div class="row h5">
            <div class="col-md-3 vl">
                Pemesan
            </div>
            <div class="col-md-2 vl">
                Produk
            </div>
            <div class="col-md-2 vl">
                Total Pembayaran
            </div>
            <div class="col-md-2 vl">
                Status
            </div>
            <div class="col-md-3">
                Rincian Pesanan
            </div>
        </div>
    </div>
    @forelse ($orders as $key => $order)
        <livewire:laundry-order-item :order="$order" :key="'order-'.$order->id" />
    @empty <div class="card h4 card-body shadow border-0 col-md-12 bg-light text-dark">
            <div class="text-center">
                <i class="fas fa-times"></i>
                <p class="mb-0">Tidak Ada Pesanan</p>
            </div>
        </div>
    @endforelse
</div>
