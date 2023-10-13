@extends('front.layouts.base')

@section('content')
@section('title', 'جزئیات محصول')
@if (session()->has('success'))
    <div class="alert alert-success col-lg-6 col-12 mx-auto fs-5 text-center" role="alert">
        {{ session()->get('success') }}
    </div>
@elseif(session()->has('failed'))
    <div class="alert alert-danger col-lg-6 col-12 mx-auto fs-5 text-center" role="alert">
        {{ session()->get('failed') }}
    </div>
@endif
<main class="main-content">
    <div class="container">
        <!-- Product card section -->
        <article class="product">
            <div class="product-gallery">
                <div class="main-img img-container">
                    <img src="{{asset($product->image)}}" alt=""/>
                </div>
                <div class="other-img"></div>
            </div>
            <div class="product-text-content">
                <div class="poduct-title">
                    <div class="product-header">
                        <div class="product-cat">
                            <a href="#">مبل</a> / <a href="#">{{$product->productCategory->name}}</a>
                        </div>
                        <div class="access-btns">
                            <a href="{{route('front.product.addToFavorite',$product)}}" title="افزودن به علاقه‌مندی‌ها"><i
                                        class="fa fa-heart"></i></a>
                        </div>
                    </div>
                    <h2>{{$product->name}}</h2>
                    <hr/>
                    <div class="post-info">
                        <a href="#comments">15 نظر</a>
                    </div>
                    <div class="properties">
                        {{$product->introduction}}

                    </div>
                </div>
            </div>
        </article>

        <!-- Sidebar for more info and access -->
        <aside class="sidebar">
                <div class="store-info">موجودی انبار :{{$product->marketable_number}}</div>
                <div class="price"><span> {{$product->price}} تومان </span></div>
            <form action="{{route('front.product.add-to-cart',$product)}}" method="POST" id="addToCart">
                @csrf
                <div class="add-to-cart-btn">
                    <div class="store-info">نوع پارچه :</div>
                    <select name="fabric_id" class="form-control-sm" style="float: left;margin: -22px 39px;">
                        @foreach($product->fabrics as $fabric)
                            <option value="{{$fabric->id}}">{{$fabric->fabric_name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            <div class="add-to-cart-btn">
                    <button type="submit" class="btn btn-accent" onclick="document.getElementById('addToCart').submit();">
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
            <li>
                <a href="#">
                    <div class="img-container">
                        <img src="../assets/img/products/Furniture-1.jpg" alt=""/>
                    </div>
                    <h4>محصول مشابه شماره 1</h4>
                    <div class="price"><span>تومان</span> 15000000</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img-container">
                        <img src="../assets/img/products/Furniture-1.jpg" alt=""/>
                    </div>
                    <h4>محصول مشابه شماره 1</h4>
                    <div class="price"><span>تومان</span> 15000000</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img-container">
                        <img src="../assets/img/products/Furniture-1.jpg" alt=""/>
                    </div>
                    <h4>محصول مشابه شماره 1</h4>
                    <div class="price"><span>تومان</span> 15000000</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img-container">
                        <img src="../assets/img/products/Furniture-1.jpg" alt=""/>
                    </div>
                    <h4>محصول مشابه شماره 1</h4>
                    <div class="price"><span>تومان</span> 15000000</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img-container">
                        <img src="../assets/img/products/Furniture-1.jpg" alt=""/>
                    </div>
                    <h4>محصول مشابه شماره 1</h4>
                    <div class="price"><span>تومان</span> 15000000</div>
                </a>
            </li>
        </ul>
    </div>
</section>

<section class="specifications">
    <div class="container">
        <h2>مشخصات</h2>
        <table class="spec-table">

            @foreach ($product->metas()->get() as $meta)
                <tr>
                    <td>{{ $meta->meta_key }}</td>
                    <td>{{ $meta->meta_value }}</td>
                </tr>
            @endforeach

        </table>
    </div>
</section>

<section class="specifications">
    <div class="container">
        <h2>نوع پارچه</h2>
        <table class="spec-table">
            @foreach ($product->fabrics as $fabric)
                <tr>
                    <td>نام</td>
                    <td>{{ $fabric->fabric_name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</section>

<!-- Comments Section -->
<section class="comments" id="comments">
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
</section>

@endsection
