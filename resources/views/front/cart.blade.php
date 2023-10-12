@extends('front.layouts.base')

@section('title', 'سبد خرید')

@section('content')
    <main class="main-content">
        <div class="container">
            <section class="order-related">
                <section class="orders">
                    <h2>سبد خرید</h2>
                    <ul>
                        <li class="card">
                            <div class="img-container">
                                <a href="#">
                                    <img src="../assets/img/products/Furniture-2.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text-content">
                                <h3>
                                    <a href="#">مبل راحتی</a>
                                </h3>
                                <div class="price">
                                    <span>7650000</span> <span>تومان</span>
                                </div>
                                <div class="more-info">
                                    شماره سفارش: <span>123456789</span>
                                </div>
                            </div>
                        </li>
                        <li class="card">
                            <div class="img-container">
                                <a href="#">
                                    <img src="../assets/img/products/Furniture-2.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text-content">
                                <h3>
                                    <a href="#">مبل راحتی</a>
                                </h3>
                                <div class="price">
                                    <span>11545000</span> <span>تومان</span>
                                </div>
                                <div class="more-info">
                                    شماره سفارش: <span>123456789</span>
                                </div>
                            </div>
                        </li>
                        <li class="card">
                            <div class="img-container">
                                <a href="#">
                                    <img src="../assets/img/products/Furniture-2.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text-content">
                                <h3>
                                    <a href="#">مبل راحتی</a>
                                </h3>
                                <div class="price">
                                    <span>12670000</span> <span>تومان</span>
                                </div>
                                <div class="more-info">
                                    شماره سفارش: <span>123456789</span>
                                </div>
                            </div>
                        </li>
                        <li class="card">
                            <div class="img-container">
                                <a href="#">
                                    <img src="../assets/img/products/Furniture-2.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text-content">
                                <h3>
                                    <a href="#">مبل راحتی</a>
                                </h3>
                                <div class="price">
                                    <span>26900000</span> <span>تومان</span>
                                </div>
                                <div class="more-info">
                                    شماره سفارش: <span>123456789</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>
            </section>
            <div class="profile-info">
                <h3>قیمت کالا ها</h3>
                <div><span class="total-price">0</span> تومان</div>
                <div class="links">
                    <button type="button" class="btn btn-accent" id="order-btn" style="display: flex; gap: 0.4em">
                        <i class="fa fa-shopping-cart"></i> <span>ثبت سفارش</span>
                    </button>
                </div>
            </div>
        </div>
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
