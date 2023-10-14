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
                    <div class="card">
                        <div class="img-container">
                            <img src="{{ asset($product->image) }}" alt="" style="width: 115px;height: 110px;">
                        </div>
                        <h3><a href="{{ route('front.product' , ['product' => $product->id]) }}">{{ $product->name }}</a></h3>
                        <div class="card-footer">
                            <div class="price">
                                {{ $product->price }} تومان
                            </div>
                            <form action="{{route('front.product.add-to-cart',$product->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-accent">
                                    افزودن به سبد
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- pagination --}}
        <div class="d-flex justify-content-center my-5">
            {{ $products->links() }}
        </div>
    </main>
@endsection
