@extends('layout.customer.app')
@section('content')
    <div class="content">

        <div class="container-fluid mt-3">
            <div class="row mx-3 g-3">
                <div class="col-md-12 card">
                    <div class="row g-0">
                        <div class="col-md-2 p-3">
                            <img class="card-img" src="{{ asset($laundry->avatar ?? 'src/bg.png') }}" alt="laundry"
                                style="height: 128px; object-fit: cover;">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <livewire:favorite-button :laundry="$laundry" />
                                <h5 class="card-title">{{ $laundry->name }}</h5>
                                <h6 class="card-subtitle text-secondary">{{ $address->first()->compact() }}</h6>
                                <h6 class="card-text text-secondary">Jam Operasional:
                                    @if ($laundry->operational_start)
                                        {{ $laundry->operational_start->format('H:i') }} -
                                        {{ $laundry->operational_end->format('H:i') }}
                                    @else
                                        Belum ditentukan
                                    @endif
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item w-50 text-center" role="presentation">
                                {{-- {{ dd($type) }} --}}
                                <a class="nav-link @if ($type==='review' || ($type !==null && $type
                                    !=='service' )) show active @endif" id="review-tab"
                                    data-bs-toggle="tab" href="#review" role="tab" aria-controls="review"
                                    aria-selected="true">Review</a>
                            </li>
                            <li class="nav-item w-50 text-center" role="presentation">
                                <a class="nav-link @if ($type !=='review' || $type==='service' ) active @endif" id="service-tab" data-bs-toggle="tab"
                                    href="#service" role="tab" aria-controls="service" aria-selected="false">Pelayanan
                                    Jasa</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Review -->
                            <div class="tab-pane fade @if ($type==='review' || ($type !==null && $type
                                !=='service' )) show active @endif" id="review" role="tabpanel"
                                aria-labelledby="review-tab">
                                <livewire:commenter :laundry="$laundry" />
                            </div>
                            <!-- Pelayanan Jasa -->
                            <div class="tab-pane fade @if ($type !=='review' || $type==='service' ) show active @endif" id="service" role="tabpanel"
                                aria-labelledby="service-tab">
                                <form class="needs-validation" novalidate
                                    action="{{ route('cart.update', ['status' => 'onCart']) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="row g-3 mt-2">
                                        @foreach ($services as $key => $type)
                                            <div class="card border-0 shadow col-md-12">
                                                <div class="card-body w-100">
                                                    <div class="mb-0 d-flex justify-content-between w-100"
                                                        data-bs-toggle="collapse"
                                                        href="#collapseType{{ Str::slug($key, '') }}" role="button"
                                                        aria-expanded="false" aria-controls="collapseType">
                                                        <h6 class="card-text">{{ $key }}</h6>
                                                        <i class="fas fa-chevron-down my-auto"></i>
                                                    </div>
                                                    <div class="collapse mt-3 show"
                                                        id="collapseType{{ Str::slug($key, '') }}">
                                                        @foreach ($type as $service)
                                                            <div class="card rounded-0 card-service">
                                                                <div class="row g-0 align-items-center">
                                                                    <div class="col-sm-1 d-inline-flex">
                                                                        <img class="w-100"
                                                                            src="{{ asset($service->picture ?? 'src/bg.png') }}"
                                                                            alt="service"
                                                                            style="height: 64px; object-fit: cover;">
                                                                    </div>
                                                                    <div class="col-sm-2 h-100 border-end">
                                                                        <h6 class="mx-3 my-auto">{{ $service->name }}</h6>
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        <p class="mx-3 card-text">Rp<span
                                                                                class="price">{{ number_format($service->price) }}</span>/{{ $service->unit }}
                                                                        </p>
                                                                    </div>
                                                                    @auth
                                                                        <div class="col-lg-2 p-3">
                                                                            <div class="input-group border border-dark rounded-pill no-arrow"
                                                                                id={{ $service->id }}>
                                                                                <button
                                                                                    class="btn btn-outline-primary border-0 rounded-pill fas fa-minus count"
                                                                                    type="button" id="button-addon1"></button>
                                                                                <input value="0" min="0" type="number"
                                                                                    class="text-center form-control rounded-pill border-0 quantity"
                                                                                    name="service[{{ $service->id }}]">
                                                                                <button
                                                                                    class="btn btn-outline-primary border-0 rounded-pill fas fa-plus count"
                                                                                    type="button" id="button-addon1"></button>
                                                                            </div>
                                                                        </div>
                                                                    @endauth
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @guest
                                            <a href="{{ route('login') }}" class="btn btn-primary"
                                                style="text-decoration: none;">
                                                <h5 class="card-text">
                                                    Order Now
                                                </h5>
                                            </a>
                                        @else
                                            <button type="submit"
                                                class="btn btn-outline-primary d-flex justify-content-between w-100 d-inline-flex"
                                                style="text-align: left !important;">
                                                <h6 class="mb-0">Total Harga</h6>
                                                <h6 class="mb-0">Rp<span class="total-cost">0</span> <i
                                                        class="fas fa-chevron-right my-auto ml-3"></i></h6>
                                            </button>
                                            <input class="total-input" type="number" name="total_cost" hidden required>
                                            <div class="invalid-feedback align-self-end">
                                                Pilih minimal satu layanan
                                            </div>
                                        @endguest
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
@endsection

@section('script')
    <script>
        $(".count").on("click", function() {
            var button = $(this);
            var oldValue = button.parent().find("input").val();
            if (button.hasClass('fa-plus')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            button.parent().find("input").val(newVal);
            var total = 0;
            $('.card-service').each(function() {
                var count = $(this);
                var price = removeCommas(count.find('.price').text());
                var qty = count.find('.quantity').val();
                total += parseFloat(price) * parseFloat(qty);
            });
            $('.total-cost').text(addCommas(total));
            $('.total-input').val(total ? total : '');
        })

    </script>
@endsection
