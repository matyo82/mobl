@extends('front.layouts.base')

@section('title', 'سبد خرید')

@section('content')
    <main class="main-content">
        @if (session()->has('payment-failed'))
            <div class="alert alert-danger col-10 mx-auto text-center fs-6 mt-1" role="alert">
                {{ session()->get('payment-failed')['title'] }}
                <br>
                <br>
                {{ session()->get('payment-failed')['message'] }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger col-10 mx-auto mt-1">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="@if (!$loop->first) mt-1 @endif">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('front.cart.payment') }}">
            @csrf
            <div class="container">
                <section class="order-related">
                    <section class="orders">
                        <h2>سبد خرید</h2>
                        <ul>
                            <input type="text" name="prices" value="{{ $allPrices }}" hidden />
                            @foreach ($cartItems as $cartItem)
                                <li class="card">
                                    <div class="img-container">
                                        <a href="#">
                                            <img src="{{ asset($cartItem->product->image) }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="text-content">
                                        <h3>
                                            <a href="#">{{ $cartItem->product->name }}</a>
                                        </h3>
                                        <div class="price">
                                            <span>{{ $cartItem->product->price }}</span> <span>تومان</span>
                                        </div>
                                        
                                        <div class="more-info">
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('front.product.remove-from-cart', $cartItem) }}" class="btn delete-btn ms-4 shadow">
                                                حذف
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </section>



                    <section class="orders">
                        <h2>ادرس ها</h2>
                        <ul>
                            @foreach ($addresses as $address)
                                <li class="card">
                                    <input type="radio" name="address_id" value="{{ $address->id }}" id="a-{{ $address->id }}" />
                                    <div class="text-content">
                                        <h3>
                                            <a href="#">{{ $address->city }}</a>
                                        </h3>
                                        <div class="price">
                                            <span>{{ $address->province }}-پلاک{{ $address->no }}-واحد{{ $address->unit }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                </section>

                <div class="profile-info text-center">
                    <h3>قیمت کالا ها</h3>
                    <div class="d-flex justify-content-center"><span class="total-price">{{ $allPrices }}</span> تومان</div>
                    <div class="links">
                        <button type="submit" class="btn btn-accent text-white" id="order-btn" style="display: flex; gap: 0.4em; background-color: limegreen !important">
                            <i class="bi bi-currency-exchange fs-5"></i> <span>پرداخت سفارش</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </main>









    <div class="select-address-modal">
        <div class="overlay"></div>
        <div class="modal-container">
            <div class="modal-card">
                <form action="" class="finalize-order-form">
                    <fieldset class="select-address">
                        <legend>انتخاب آدرس</legend>
                        <div>
                            <input type="radio" name="address" id="address-1" value="1" checked />
                            <label for="address-1">
                                میدان فردوسی خیابان ایرانشهر مجتمع تجاری میلاد طبقه 5 واحد 9
                            </label>
                        </div>
                        <div>
                            <input type="radio" name="address" id="address-2" value="1" />
                            <label for="address-2">
                                میدان فردوسی خیابان ایرانشهر مجتمع تجاری میلاد طبقه 5 واحد 9
                            </label>
                        </div>
                    </fieldset>
                    <fieldset class="select-address">
                        <legend>نحوه ارسال</legend>
                        <div>
                            <input type="radio" name="post" id="post-1" value="1" checked />
                            <label for="post-1"> پست سفارشی </label>
                        </div>
                        <div>
                            <input type="radio" name="post" id="post-2" value="1" />
                            <label for="post-2"> پست پیشتاز </label>
                        </div>
                    </fieldset>
                    <div class="delete-confirm-modal-btns">
                        <button type="submit" class="btn btn-green" id="confirm-order">
                            نهایی کردن سفارش
                        </button>
                    </div>
                </form>
                <div class="close-btn">&times;</div>
            </div>
        </div>
    </div>
@endsection
