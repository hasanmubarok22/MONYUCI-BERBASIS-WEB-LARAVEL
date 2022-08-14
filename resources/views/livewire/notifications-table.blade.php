<div class="card card-body shadow border-0">
    <div>
        @if (!$user->unreadNotifications->count() <= 0)
            <small class="card-link float-end">
                <a href="#" wire:click="readAll()" class="float-end" style="text-decoration: none">Tandai
                    Telah Dibaca Semua</a>
            </small>
        @endif
        <h4 class="card-title">Notifikasi</h4>
    </div>
    <div class="row g-3">
        @forelse ($user->notifications as $notification)
            <livewire:notification-item :notification="$notification" key="{{ now() }}" />
        @empty
            <div class="card card-body shadow border-0">
                <h5><i class="fas fa-times"></i> Tidak ada Notifikasi</h5>
            </div>
        @endforelse
    </div>
</div>
