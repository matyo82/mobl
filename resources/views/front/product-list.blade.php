@extends('front.layouts.base')

@section('title', 'لیست محصولات')

@section('content')
    <main class="product-list">
        <div class="container">
            <div class="product-list-header">
                دسته‌بندی:
                <a href="#">مبل</a> / <a href="#">اقتصادی</a>
            </div>
            <div class="product-grid">

                @foreach ($products as $product)
                    <div class="card">
                        <div class="img-container">
                            <img src="{{ asset($product->image) }}" alt="" style="width: 115px;height: 110px;">
                        </div>
                        <h3><a href="{{ route('front.product' , ['product' => $product->id]) }}">{{ $product->name }}</a></h3>
                        <div class="card-footer">
                            <div class="price">
                                {{ $product->price }} تومان
                            </div>
                            <button type="button" class="btn btn-accent">
                                افزودن به سبد
                            </button>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </main>
@endsection
