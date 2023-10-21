@extends('front.layouts.base')

@section('title', 'لیست مورد علاقه ها')

@section('content')
    <main class="product-list">
        <div class="container">
            <div class="product-list-header">
                <span>علاقه مندی ها</span>
            </div>
            <div class="product-grid">
                @if (auth()->user()->products->count())
                    @foreach (auth()->user()->products as $product)
                        <div class="card" data-aos-duration="1000">
                            <div class="img-container">
                                <img src="{{ asset($product->image) }}" alt="" class="w-100">
                            </div>
                            <h3><a href="{{ route('front.product', ['product' => $product->id]) }}">{{ $product->name }}</a></h3>
                            <div class="card-footer">
                                <div class="price">
                                    {{ $product->price }} تومان
                                </div>
                                <a href="{{ route('front.favorite.remove-from-favorite', $product) }}">
                                    <i class="bi bi-heartbreak-fill text-danger fs-4"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="card shadow-none border-0 bg-white"></div>
                    <div class="card shadow-none border-0 bg-white"></div>
                @else
                    <div class="fs-2 text-secondary d-flex justify-content-center align-items-center border border-end-0 border-start-0" style="height: 20rem !important">
                        در حال حاضر آیتمی برای نمایش وجود ندارد!
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
