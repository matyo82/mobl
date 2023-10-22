@extends('front.layouts.base')

@section('title', 'جزئیات محصول')

@section('content')
    <main class="main-content">
        @if (session()->has('success'))
            <div class="alert alert-success col-10 mx-auto text-center" role="alert">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('failed'))
            <div class="alert alert-danger col-10 mx-auto text-center" role="alert">
                {{ session()->get('failed') }}
            </div>
        @endif
        <div class="container">
            <!-- Product card section -->
            <article class="product">
                <div class="product-gallery">
                    <div class="main-img img-container" style="margin-left: 10px">
                        <img class="border rounded shadow-sm" src="{{ asset($product->image) }}" alt="" data-aos="zoom-in" data-aos-duration="2000" />
                    </div>
                    <div class="other-img"></div>
                </div>
                <div class="product-text-content">
                    <div class="poduct-title">
                        <div class="product-header">
                            <div class="product-cat">
                                <a href="#">مبل</a> / <a href="#">{{ $product->productCategory->name }}</a>
                            </div>
                            <div class="access-btns">
                                <a href="{{ route('front.product.addToFavorite', $product) }}" title="افزودن به علاقه‌مندی‌ها">
                                    @if (in_array(
                                            $product->id,
                                            collect(auth()->user()->products()->pluck('id'))->toArray()))
                                        <i class="bi bi-heart-fill text-danger fs-5"></i>
                                    @else
                                        <i class="bi bi-heart text-danger fs-5"></i>
                                    @endif
                                </a>
                            </div>
                        </div>
                        <h2>{{ $product->name }}</h2>
                        <hr />
                        {{-- <div class="post-info">
                            <a href="#comments">15 نظر</a>
                        </div> --}}
                        <div class="properties" style="line-height: 1.2rem !important">
                            {{ $product->introduction }}
                        </div>
                    </div>
                </div>
            </article>

            <!-- Sidebar for more info and access -->
            <aside class="sidebar shadow-sm border" style="width: fit-content !important">
                <div class="store-info mb-2">موجودی انبار :{{ $product->marketable_number }}</div>
                <div class="price text badge bg-success py-2 mb-2"><span> {{ $product->price }} تومان </span></div>
                <form class="mb-2" action="{{ route('front.product.add-to-cart', $product) }}" method="POST" id="addToCart">
                    @csrf
                    <div class="add-to-cart-btn d-flex align-items-center">
                        <div class="store-info ms-auto">نوع پارچه :</div>
                        <select name="fabric_id" class="form-select form-select-sm text-center shadow" style="width: fit-content">
                            @foreach ($product->productFabrics()->get() as $fabric)
                                <option value="{{ $fabric->id }}">{{ $fabric->fabric_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="add-to-cart-btn">
                    <button type="submit" class="btn btn-accent text-white" onclick="document.getElementById('addToCart').submit();">
                        <i class="bi bi-cart-plus-fill ms-1 fs-5"></i>
                        افزودن به سبد خرید
                    </button>
                </div>
            </aside>
        </div>
    </main>

    <!-- Services Section -->
    <section class="services">
        <div class="container">
            <div class="card">
                <div><i class="fas fa-truck"></i></div>
                <h3>تحویل سریع و آسان</h3>
            </div>
            <div class="card">
                <div><i class="fa fa-shield"></i></div>
                <h3>ضمانت بازگشت</h3>
            </div>
            <div class="card">
                <div><i class="fa fa-life-ring"></i></div>
                <h3>پشتیبانی 24 ساعته</h3>
            </div>
        </div>
    </section>

    <section class="similar-products">
        <div class="container">
            <h3>محصولات مشابه</h3>
            <ul>
                @foreach ($products as $product)
                    <li data-aos="zoom-out">
                        <a href="{{ route('front.product', $product) }}">
                            <div class="img-container">
                                <img src="{{ asset($product->image) }}" alt="" />
                            </div>
                            <h4>{{ $product->name }}</h4>
                            <div class="price"><span>تومان</span> {{ $product->price }}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="container row gap-5 my-5">
        <table class="table table-striped table-hover border col shadow">
            <thead>
                <tr class="text-center table-dark">
                    <th scope="col">#</th>
                    <th scope="col">ویژگی ها</th>
                    <th scope="col">نوع</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $delay = 300;
                @endphp
                @foreach ($product->productMetas()->get() as $meta)
                    <tr data-aos="fade-left" data-aos-duration="1000" data-aos-delay="{{ $delay }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $meta->meta_key }}</td>
                        <td>{{ $meta->meta_value }}</td>
                    </tr>
                    @php
                        $delay += 300;
                    @endphp
                @endforeach
            </tbody>
        </table>

        <table class="table table-striped table-hover border col shadow">
            <thead>
                <tr class="text-center table-dark">
                    <th scope="col">#</th>
                    <th scope="col">انواع پارچه</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $delay = 300;
                @endphp
                @forelse ($product->productFabrics()->get() as $fabric)
                    <tr data-aos="fade-left" data-aos-duration="1000" data-aos-delay="{{ $delay }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $fabric->fabric_name }}</td>
                    </tr>
                    @php
                        $delay += 300;
                    @endphp
                @empty
                    <h2>پارچه ای برای این محصول یافت نشد</h2>
                @endforelse
            </tbody>
        </table>
    </section>

    <!-- Comments Section -->
    {{-- <section class="comments" id="comments">
    <div class="container">
        <h2>نظرات</h2>
        <form action="" class="comment">
            <textarea class="comment-input" rows="10" placeholder="نظر شما"></textarea>
            <button type="submit" class="btn btn-accent">ارسال</button>
        </form>
        <!-- Comments list -->
        <section class="comments-list">
            <div class="card">
                <div class="avatar img-container">
                    <img src="../assets/img/logo/logo-7.png" alt="">
                </div>
                <div class="comment-info">
                    <h4>نام نظردهنده</h4>
                    <small>2/10/1402</small>
                </div>
                <div class="text-content">
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                        استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                        ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                    </p>
                </div>
                <div class="comment-actions">
                    <!-- Like and Disklike Comment -->
                    <button type="button" class="btn"><i class="fa fa-thumbs-up"></i></button>
                    <button type="button" class="btn"><i class="fa fa-thumbs-down"></i></button>
                    <!-- Reply Comment -->
                    <button type="button" class="btn"><i class="fa fa-reply"></i></button>
                    <!-- Report Comment -->
                    <button type="button" class="btn"><i class="fa fa-bullhorn"></i></button>
                    <!-- Display Only on User's Own Comments. Edit Comment Button -->
                    <button type="button" class="btn"><i class="fa fa-pencil-square"></i></button>
                </div>
                <div class="card comment-reply">
                    <div class="avatar img-container">
                        <img src="../assets/img/logo/logo-7.png" alt="">
                    </div>
                    <div class="comment-info">
                        <h4>نام پاسخ‌دهنده</h4>
                        <small>3/10/1402</small>
                    </div>
                    <div class="text-content">
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                            ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                            کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        </p>
                    </div>
                    <div class="comment-actions">
                        <!-- Like and Disklike Comment -->
                        <button type="button" class="btn"><i class="fa fa-thumbs-up"></i></button>
                        <button type="button" class="btn"><i class="fa fa-thumbs-down"></i></button>
                        <!-- Reply Comment -->
                        <button type="button" class="btn"><i class="fa fa-reply"></i></button>
                        <!-- Report Comment -->
                        <button type="button" class="btn"><i class="fa fa-bullhorn"></i></button>
                        <!-- Display Only on User's Own Comments. Edit Comment Button -->
                        <button type="button" class="btn"><i class="fa fa-pencil-square"></i></button>
                    </div>
                    <div class="card comment-reply">
                        <div class="avatar img-container">
                            <img src="../assets/img/logo/logo-7.png" alt="">
                        </div>
                        <div class="comment-info">
                            <h4>نام پاسخ‌دهنده</h4>
                            <small>3/10/1402</small>
                        </div>
                        <div class="text-content">
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                                ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </p>
                        </div>
                        <div class="comment-actions">
                            <!-- Like and Disklike Comment -->
                            <button type="button" class="btn"><i class="fa fa-thumbs-up"></i></button>
                            <button type="button" class="btn"><i class="fa fa-thumbs-down"></i></button>
                            <!-- Reply Comment -->
                            <button type="button" class="btn"><i class="fa fa-reply"></i></button>
                            <!-- Report Comment -->
                            <button type="button" class="btn"><i class="fa fa-bullhorn"></i></button>
                            <!-- Display Only on User's Own Comments. Edit Comment Button -->
                            <button type="button" class="btn"><i class="fa fa-pencil-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="avatar img-container">
                    <img src="../assets/img/logo/logo-7.png" alt="">
                </div>
                <div class="comment-info">
                    <h4>نام نظردهنده</h4>
                    <small>2/10/1402</small>
                </div>
                <div class="text-content">
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                        استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                        ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                    </p>
                </div>
                <div class="comment-actions">
                    <!-- Like and Disklike Comment -->
                    <button type="button" class="btn"><i class="fa fa-thumbs-up"></i></button>
                    <button type="button" class="btn"><i class="fa fa-thumbs-down"></i></button>
                    <!-- Reply Comment -->
                    <button type="button" class="btn"><i class="fa fa-reply"></i></button>
                    <!-- Report Comment -->
                    <button type="button" class="btn"><i class="fa fa-bullhorn"></i></button>
                    <!-- Display Only on User's Own Comments. Edit Comment Button -->
                    <button type="button" class="btn"><i class="fa fa-pencil-square"></i></button>
                </div>
                <div class="card comment-reply">
                    <div class="avatar img-container">
                        <img src="../assets/img/logo/logo-7.png" alt="">
                    </div>
                    <div class="comment-info">
                        <h4>نام پاسخ‌دهنده</h4>
                        <small>3/10/1402</small>
                    </div>
                    <div class="text-content">
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                            ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                            کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        </p>
                    </div>
                    <div class="comment-actions">
                        <!-- Like and Disklike Comment -->
                        <button type="button" class="btn"><i class="fa fa-thumbs-up"></i></button>
                        <button type="button" class="btn"><i class="fa fa-thumbs-down"></i></button>
                        <!-- Reply Comment -->
                        <button type="button" class="btn"><i class="fa fa-reply"></i></button>
                        <!-- Report Comment -->
                        <button type="button" class="btn"><i class="fa fa-bullhorn"></i></button>
                        <!-- Display Only on User's Own Comments. Edit Comment Button -->
                        <button type="button" class="btn"><i class="fa fa-pencil-square"></i></button>
                    </div>
                    <div class="card comment-reply">
                        <div class="avatar img-container">
                            <img src="../assets/img/logo/logo-7.png" alt="">
                        </div>
                        <div class="comment-info">
                            <h4>نام پاسخ‌دهنده</h4>
                            <small>3/10/1402</small>
                        </div>
                        <div class="text-content">
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                                ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </p>
                        </div>
                        <div class="comment-actions">
                            <!-- Like and Disklike Comment -->
                            <button type="button" class="btn"><i class="fa fa-thumbs-up"></i></button>
                            <button type="button" class="btn"><i class="fa fa-thumbs-down"></i></button>
                            <!-- Reply Comment -->
                            <button type="button" class="btn"><i class="fa fa-reply"></i></button>
                            <!-- Report Comment -->
                            <button type="button" class="btn"><i class="fa fa-bullhorn"></i></button>
                            <!-- Display Only on User's Own Comments. Edit Comment Button -->
                            <button type="button" class="btn"><i class="fa fa-pencil-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="avatar img-container">
                    <img src="../assets/img/logo/logo-7.png" alt="">
                </div>
                <div class="comment-info">
                    <h4>نام نظردهنده</h4>
                    <small>2/10/1402</small>
                </div>
                <div class="text-content">
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                        استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در
                        ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                    </p>
                </div>
                <div class="comment-actions">
                    <!-- Like and Disklike Comment -->
                    <button type="button" class="btn"><i class="fa fa-thumbs-up"></i></button>
                    <button type="button" class="btn"><i class="fa fa-thumbs-down"></i></button>
                    <!-- Reply Comment -->
                    <button type="button" class="btn"><i class="fa fa-reply"></i></button>
                    <!-- Report Comment -->
                    <button type="button" class="btn"><i class="fa fa-bullhorn"></i></button>
                    <!-- Display Only on User's Own Comments. Edit Comment Button -->
                    <button type="button" class="btn"><i class="fa fa-pencil-square"></i></button>
                </div>
            </div>
    </div>
</section> --}}

@endsection
