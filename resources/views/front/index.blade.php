@extends('front.layouts.base')

@section('title', 'صفحه اصلی')

@section('content')
    <!-- Offers section -->
    <section class="offers">
        <div class="offer-img">
            <img src="assets/img/products/special-offer.jpg" alt="" />
        </div>
        <div class="overlay"></div>
        <div class="text-content" data-aos="zoom-in">
            <h2>فروش ویژه آخر فصل</h2>
            <p>تا 50% تخفیف!</p>
            <a href="{{ route('front.product-list') }}" class="btn btn-accent">همین الان خرید کنید</a>
        </div>
    </section>

    <!-- Services section -->
    <section class="services">
        <div class="container">
            <div class="card">
                <div><i class="fas fa-truck"></i></div>
                <h3>تحویل سریع و آسان</h3>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                    استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                </p>
            </div>
            <div class="card">
                <div><i class="fa fa-shield"></i></div>
                <h3>ضمانت بازگشت</h3>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                    استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                </p>
            </div>
            <div class="card">
                <div><i class="fa fa-life-ring"></i></div>
                <h3>پشتیبانی 24 ساعته</h3>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                    استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                </p>
            </div>
        </div>
    </section>

    <!-- Handpicked items section -->
    <section class="handpicked">
        <h2>دست‌چین شده</h2>
        <div class="container">
            <div class="handpicked-grid">
                <div class="handpicked-item img-container" data-aos="fade-left" data-aos-duration="1000">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="{{route('front.product-list')}}" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Furniture-1.jpg" alt="" loading="lazy" />
                </div>
                <div class="handpicked-item img-container" data-aos="fade-up" data-aos-duration="1000">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="{{route('front.product-list')}}" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Furniture-2.jpg" alt="" loading="lazy" />
                </div>
                <div class="handpicked-item img-container" data-aos="fade-right" data-aos-duration="1000">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="{{route('front.product-list')}}" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Curved-Furniture.jpg" alt="" loading="lazy" />
                </div>
                <div class="handpicked-item img-container" data-aos="fade-left" data-aos-duration="1000">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="{{route('front.product-list')}}" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Furniture-2.jpg" alt="" loading="lazy" />
                </div>
                <div class="handpicked-item img-container" data-aos="fade-right" data-aos-duration="1000">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="{{route('front.product-list')}}" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Furniture-1.jpg" alt="" loading="lazy" />
                </div>
            </div>
        </div>
    </section>

    <section class="scroller">
        <div class="container">
            <h2>جدیدترین ها</h2>
            <ul>
			@foreach(App\Models\Product::latest()->limit(6)->get() as $product)
                <li data-aos="zoom-out">
                    <a href="{{ route('front.product' , ['product' => $product->id]) }}">
                        <div class="img-container">
                            <img src="{{asset($product->image)}}" alt=""  style="width: 150px;height: 180;">
                        </div>
                        <h3>{{$product->name}}</h3>
                <div class="price"><span> {{$product->price}} تومان </span></div>
                    </a>
                </li>
			@endforeach
            </ul>
        </div>
    </section>

    <section class="scroller">
        <div class="container">
            <h2>پرفروش ترین ها</h2>
            <ul>
			@foreach(App\Models\Product::limit(6)->get() as $product)
                <li data-aos="zoom-out">
                    <a href="{{ route('front.product' , ['product' => $product->id]) }}">
                        <div class="img-container">
                            <img src="{{asset($product->image)}}" alt=""  style="width: 150px;height: 180;">
                        </div>
                        <h3>{{$product->name}}</h3>
                <div class="price"><span> {{$product->price}} تومان </span></div>
                    </a>
                </li>
			@endforeach
            </ul>
        </div>
    </section>
@endsection
