@extends('front.layouts.base')

@section('title', 'لیست مورد علاقه ها')

@section('content')
    <main class="product-list">
        <div class="container">
            <div class="product-list-header">
                <span>علاقه مندی ها</span>
            </div>
            <div class="product-grid">

                @forelse (auth()->user()->products as $product)
                    <div class="card">
                        <div class="img-container">
                            <img src="{{ asset($product->image) }}" alt="" style="width: 115px;height: 110px;">
                        </div>
                        <h3><a href="{{ route('front.product', ['product' => $product->id]) }}">{{ $product->name }}</a></h3>
                        <div class="card-footer">
                            <div class="price">
                                {{ $product->price }} تومان
                            </div>
                        </div>
			               <div class="d-flex justify-content-end">
                                <a href="{{route('front.favorite.remove-from-favorite',$product)}}" class="btn delete-btn ms-4 shadow">
                                                حذف
                                </a>
                           </div>
                    </div>
                @endforeach

            </div>
        </div>
    </main>
@endsection
