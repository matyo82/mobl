@extends('front.layouts.base')

@section('title', 'لیست محصولات')

@section('content')
    <main class="product-list">
        <div class="container">
            <div class="product-list-header">
                دسته‌بندی:
                <span>مبل</span> / <span>{{ $category->name ?? 'همه' }}</span>
            </div>
            <div class="product-grid">

                @foreach ($products as $product)
                    <div class="card" data-aos="fade-up" data-aos-duration="1000">
                        <div class="img-container">
                            <img src="{{ asset($product->image) }}" alt="" class="w-100">
                        </div>
                        <h3 class="pb-3"><a href="{{ route('front.product', ['product' => $product->id]) }}">{{ $product->name }}</a></h3>
                        <div class="card-footer">
                            <div class="price">
                                {{ $product->price }} تومان
                            </div>
                            <a type="button" href="{{ route('front.product', ['product' => $product->id]) }}" class="btn btn-accent">
                                افزودن به سبد
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- pagination --}}
        <div class="d-flex justify-content-center my-5" dir="ltr">
            {{ $products->links() }}
        </div>
    </main>
@endsection
