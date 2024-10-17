@extends('layouts.customer')

@section('content')
    <header class="bg-dark py-5 position-relative">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Catering App</h1>
            <p class="lead fw-normal text-white-50 mb-0">Pesan Sekarang Perutpun Kenyang</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($merchants as $merchant)
                    @foreach ($merchant->menus as $menu)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ asset('storage/' . $menu->foto) }}"
                                    alt="{{ $menu->nama_menu }}" />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">{{ $menu->nama_menu }}</h5>

                                        <p>Harga: Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#">View options</a>
                                        <form action="{{ route('cart.store', $menu->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success mt-2">Pesan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endsection
