@extends('front.layouts.base')

@section('title', 'جزئیات محصول')

@section('content')
    <main class="main-content">
        <div class="container">
            <!-- Product card section -->
            <article class="product">
                <div class="product-gallery">
                    <div class="main-img img-container">
                        <img src="{{asset($product->image)}}" alt="" />
                    </div>
                    <div class="other-img"></div>
                </div>
                <div class="product-text-content">
                    <div class="poduct-title">
                        <div class="product-header">
                            <div class="product-cat">
                                <a href="#">مبل</a> / <a href="#">{{$product->category->name}}</a>
                            </div>
                            <div class="access-btns">
                                <button type="button" class="btn btn-dark" title="افزودن به علاقه‌مندی‌ها"><i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                        <h2>{{$product->name}}</h2>
                        <hr />
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
                <div class="add-to-cart-btn">
                    <button type="button" class="btn btn-accent">
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
                            <img src="../assets/img/products/Furniture-1.jpg" alt="" />
                        </div>
                        <h4>محصول مشابه شماره 1</h4>
                        <div class="price"><span>تومان</span> 15000000</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="img-container">
                            <img src="../assets/img/products/Furniture-1.jpg" alt="" />
                        </div>
                        <h4>محصول مشابه شماره 1</h4>
                        <div class="price"><span>تومان</span> 15000000</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="img-container">
                            <img src="../assets/img/products/Furniture-1.jpg" alt="" />
                        </div>
                        <h4>محصول مشابه شماره 1</h4>
                        <div class="price"><span>تومان</span> 15000000</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="img-container">
                            <img src="../assets/img/products/Furniture-1.jpg" alt="" />
                        </div>
                        <h4>محصول مشابه شماره 1</h4>
                        <div class="price"><span>تومان</span> 15000000</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="img-container">
                            <img src="../assets/img/products/Furniture-1.jpg" alt="" />
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
