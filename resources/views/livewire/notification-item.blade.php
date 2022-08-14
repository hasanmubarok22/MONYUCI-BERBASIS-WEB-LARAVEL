<div class="col-md-12">
    <div class="card card-body shadow border-0">
        <div>
            @if (!$notification->read_at)
                <small>
                    <a href="#" wire:click="read()" class="card-link float-end" style="text-decoration: none">Tandai
                        Telah Dibaca</a>
                </small>
            @else
                <small>
                    <a href="#" wire:click="delete()" class="card-link float-end"
                        style="text-decoration: none">Hapus</a>
                </small>
            @endif
            <small class="card-subtitle text-secondary">
                @if ($notification->type === 'App\Notifications\OrderNotification')
                    Notifikasi Pesanan
                @else
                    Notifikasi
                @endif
            </small>
            <h5 class="card-title">{{ $notification->data['header'] }}</h5>
            <div class="border-bottom"></div>
            <p class="card-text">{{ $notification->data['message'] }} <a href="{{ $notification->data['link'] }}"
                    class="card-link" style="text-decoration: none">Menuju Link</a></p>
            <div class="border-bottom"></div>
            <small class="card-text text-secondary">
                <i class="fas fa-clock"></i>
                {{ $notification->created_at->diffForHumans() }}
            </small>
            <small>

            </small>
        </div>
    </div>
</div>
