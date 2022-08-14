<div class="row g-3 mt-2">
    @foreach ($laundry->comments as $comment)
        <div class="card border-0 shadow col-md-12">
            <div class="card-body w-100">
                <div class="row g-0 align-items-center">
                    <div class="col-md-1 p-3">
                        <img class="card-img" src="{{ asset($laundry->avatar ?? 'src/bg.png') }}" alt="laundry"
                            style="height: 64px; object-fit: cover;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->name }}</h5>
                            <p class="card-text text-secondary">
                                {{ $comment->pivot->comment ?? 'No Comment' }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 px-3">
                        <h4 id="">
                            @if ($comment->pivot->rating === 1)
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            @elseif ($comment->pivot->rating===2)
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            @elseif ($comment->pivot->rating===3)
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            @elseif ($comment->pivot->rating===4)
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                            @elseif ($comment->pivot->rating===5)
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @auth('web')
        <div class="col-md-12">
            <div class="card card-body shadow border-0">
                <form wire:submit.prevent="postComment()">
                    <div class="form-floating">
                        <textarea class="form-control" wire:model="body" style="height: 128px;"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>
                    <div class="">
                        <a href="" wire:click.prevent="rating(1)" class="fas fa-star"
                            style="text-decoration: none; color:  @if ($star>= 1) #FFC107;
                        @else
                            #212529; @endif"></a>
                        <a href="" wire:click.prevent="rating(2)" class="fas fa-star"
                            style="text-decoration: none; color:  @if ($star>= 2) #FFC107;
                        @else
                            #212529; @endif"></a>
                        <a href="" wire:click.prevent="rating(3)" class="fas fa-star"
                            style="text-decoration: none; color:  @if ($star>= 3) #FFC107;
                        @else
                            #212529; @endif"></a>
                        <a href="" wire:click.prevent="rating(4)" class="fas fa-star"
                            style="text-decoration: none; color:  @if ($star>= 4) #FFC107;
                        @else
                            #212529; @endif"></a>
                        <a href="" wire:click.prevent="rating(5)" class="fas fa-star"
                            style="text-decoration: none; color:  @if ($star>= 5) #FFC107;
                        @else
                            #212529; @endif"></a>
                        <input hidden type="number" wire:model="star">
                    </div>
                    <button class="btn btn-primary" type="submit">Kirim Komentar</button>
                </form>
            </div>
        </div>
    @endauth
</div>
