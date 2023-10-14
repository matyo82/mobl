@extends('front.layouts.base')

@section('title', 'پروفایل')

@section('content')
    <main class="main-content">
        <div class="container">
            <section class="order-related">
                <section class="orders">
                    <h2>لیست سفارشات</h2>
                    @foreach ($user->orders()->get() as $order)
                        <div class="card d-flex mt-4 shadow-sm">
                            <h3>سفارش {{ $order->created_at }}</h3>
                            <div>وضعیت :
                                <hr>
                                @switch($order->order_status)
                                    @case(0)
                                        <div class="status processing text-primary">
                                            <i class="fa fa-clock"></i> درحال پردازش
                                        </div>
                                    @break

                                    @case(1)
                                        <div class="status complete">
                                            <i class="fa fa-check-square"></i> ارسال شده
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="status canceled">
                                            <i class="fa fa-close"></i> لغو شده
                                        </div>
                                    @break

                                    @case(3)
                                        <div class="status returned">
                                            <i class="fa fa-arrow-left"></i> مرجوعی
                                        </div>
                                    @break

                                    @default
                                @endswitch
                                <hr>
                            </div>
                            <ul class="pt-0">
                                @foreach ($order->items()->get() as $item)
                                    @php
                                        $product = $item->product()->first();
                                    @endphp
                                    <li class="card">
                                        <div class="img-container">
                                            <a href="{{ route('front.product', ['product' => $product->id]) }}">
                                                <img src="{{ asset($product->image) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="text-content">
                                            <h3>
                                                <a href="{{ route('front.product', ['product' => $product->id]) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="price">
                                                <span>مبلغ کل : </span>
                                                <span>{{ $item->final_total_price }}</span> <span>تومان</span>
                                            </div>
                                            <div class="text-success" style="text-decoration: underline">
                                                تعداد سفارش : {{ $item->number }}
                                            </div>
                                            <div class="more-info">
                                                شماره سفارش: <span>{{ rand(10000000, 99999999) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </section>
                <section class="addresses mb-5">
                    <h2>آدرس ها</h2>
                    <table class="addresses-table">
                        <thead>
                            <tr>
                                <th class="text-center">آدرس</th>
                                <th class="text-center">کد پستی</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->addresses()->get() as $address)
                                <tr>
                                    <td class="text-center">
                                        {{ $address->city . ' , ' . $address->province . ' , ' . $address->address . ' , ' . $address->no . ' , واحد ' . $address->unit }}
                                    </td>
                                    <td class="text-center">
                                        {{ $address->postal_code }}
                                    </td>
                                    <td class="text-center">
                                        <form class="d-inline" action="{{ route('front.profile.delete-address', $address->id) }}" method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn delete-btn">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn edit-btn">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
            <div class="profile-info">
                <div class="img-container avatar">
                    <img src="{{ asset($user->image) }}" alt="" />
                </div>
                <h3>{{ $user->name . ' ' . $user->last_name }}</h3>
                <div><i class="fa fa-at"></i>{{ $user->email }}</div>
                <div><i class="fa fa-user"></i>نوع کاربر:
                    <span>
                        @if ($user->type = 0)
                            مشتری
                        @else
                            مدیر
                        @endif
                    </span>
                </div>
                <div class="links">
                    {{-- <a href="#"> <i class="fa fa-heart"></i> علاقه‌مندی‌ها </a>
                    <a href="#"> </a> --}}
                    <button type="button" class="btn btn-accent" id="change-pwd">
                        ویرایش پروفایل
                    </button>
                </div>
            </div>
        </div>
    </main>

@endsection
