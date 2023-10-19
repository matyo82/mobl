@extends('front.layouts.base')

@section('title', 'سبد خرید')

@section('content')
    <main class="main-content">
	<form method="POST" action="{{route('front.product.submit-order')}}">
	@csrf
        <div class="container">
            <section class="order-related">
                <section class="orders">
                    <h2>سبد خرید</h2>
                    <ul>
					 <input type="text" name="prices" value="{{$allPrices*1000}}" hidden  />
					@foreach($cartItems as $cartItem)
                        <li class="card">
                            <div class="img-container">
                                <a href="#">
                                    <img src="{{asset($cartItem->product->image)}}" alt="" />
                                </a>
                            </div>
                            <div class="text-content">
                                <h3>
                                    <a href="#">{{$cartItem->product->name}}</a>
                                </h3>
                                <div class="price">
                                    <span>{{$cartItem->product->price}}</span> <span>تومان</span>
                                </div>
								
							    <a href="{{route('front.product.remove-from-cart',$cartItem)}}" class="btn delete-btn">
                                   حذف
                                </a>
                            </div>
                        </li>
					@endforeach
                    </ul>
                </section>
				
				
				
                <section class="orders">
                    <h2>ادرس ها</h2>
                    <ul>
					@foreach($addresses as $address)
					   <li class="card">
                            <input type="radio" name="address_id" value="{{ $address->id }}" id="a-{{ $address->id }}"  />
                            <div class="text-content">
                                <h3>
                                    <a href="#">{{$address->city}}</a>
                                </h3>
                                <div class="price">
                                    <span>{{$address->province}}-پلاک{{$address->no}}-واحد{{$address->unit}}</span>
                                </div>
                            </div>
                        </li>
						@endforeach
														@error('address_id')
                                       <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                             <strong>
                                               {{ $message }}
                                             </strong>
                                       </span>
                                @enderror
                    </ul>
                </section>
            </section>
			
		  <div class="profile-info">
                <h3>قیمت کالا ها</h3>
                <div><span class="total-price">{{$allPrices*1000}}</span> تومان</div>
                <div class="links">
                    <button type="submit" class="btn btn-accent" id="order-btn" style="display: flex; gap: 0.4em">
                        <i class="fa fa-shopping-cart"></i> <span>ثبت سفارش</span>
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
