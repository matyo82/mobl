@extends('front.layouts.base')

@section('content')
    <!-- Offers section -->
    <section class="offers">
        <div class="offer-img">
            <img src="{{ asset('assets/img/products/special-offer.jpg') }}" alt="" />
        </div>
        <div class="overlay"></div>
        <div class="text-content">
            <h2>فروش ویژه آخر فصل</h2>
            <p>تا 50% تخفیف!</p>
            <a href="#" class="btn btn-accent">همین الان خرید کنید</a>
        </div>
    </section>

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
                <div class="handpicked-item img-container">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="#" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="{{ asset('assets/img/products/Furniture-1.jpg') }}" alt="" loading="lazy" />
                </div>
                <div class="handpicked-item img-container">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="#" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Furniture-2.jpg" alt="" loading="lazy" />
                </div>
                <div class="handpicked-item img-container">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="#" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Curved-Furniture.jpg" alt="" loading="lazy" />
                </div>
                <div class="handpicked-item img-container">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="#" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Furniture-2.jpg" alt="" loading="lazy" />
                </div>
                <div class="handpicked-item img-container">
                    <div class="handpicked-overlay"></div>
                    <div class="text-content">
                        <h3>مبل راحتی</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله
                            در ستون و سطرآنچنان .
                        </p>
                        <a href="#" class="btn btn-accent">مشاهده</a>
                    </div>
                    <img src="./assets/img/products/Furniture-1.jpg" alt="" loading="lazy" />
                </div>
            </div>
        </div>
    </section>

    <!-- Our Brands Section -->
    <section class="our-brands">
        <h2>برند های ما</h2>
        <div class="container">
            <div class="scroller">
                <ul class="scroller-inner">
                    <li class="img-container">
                        <img src="{{ asset('assets/img/logo/logo-1.png') }}" alt="" />
                    </li>
                    <li class="img-container">
                        <img src="{{ asset('assets/img/logo/logo-2.png') }}" alt="" />
                    </li>
                    <li class="img-container">
                        <img src="{{ asset('assets/img/logo/logo-3.png') }}" alt="" />
                    </li>
                    <li class="img-container">
                        <img src="{{ asset('assets/img/logo/logo-4.png') }}" alt="" />
                    </li>
                    <li class="img-container">
                        <img src="{{ asset('assets/img/logo/logo-5.png') }}" alt="" />
                    </li>
                    <li class="img-container">
                        <img src="{{ asset('assets/img/logo/logo-6.png') }}" alt="" />
                    </li>
                    <li class="img-container">
                        <img src="{{ asset('assets/img/logo/logo-7.png') }}" alt="" />
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
