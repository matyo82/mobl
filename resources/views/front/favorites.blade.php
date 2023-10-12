@extends('front.layouts.base')

@section('title', 'علاقه مندی ها')

@section('content')
    <main class="main-content">
        <div class="container">
            <section class="order-related">
                <section class="orders">
                    <h2>علاقه‌مندی‌ها</h2>
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
                                    <span>12670000</span> <span>تومان</span>
                                </div>
                                <div></div>
                                <button type="button" class="btn delete-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
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
                                <div></div>
                                <button type="button" class="btn delete-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
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
                                <div></div>
                                <button type="button" class="btn delete-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                </section>
            </section>
            <div class="profile-info">
                <div class="img-container avatar">
                    <img src="../assets/img/logo/logo-2.png" alt="" />
                </div>
                <h3>نام کاربر</h3>
                <div><i class="fa fa-at"></i>user.mail@mail.com</div>
                <div><i class="fa fa-user"></i>نوع کاربر: <span> مشتری </span></div>
                <div class="links">
                    <a href="#"> <i class="fa fa-heart"></i> علاقه‌مندی‌ها </a>
                    <a href="#"> </a>
                    <button type="button" class="btn btn-accent" id="change-pwd">
                        ویرایش پروفایل
                    </button>
                </div>
            </div>
        </div>
    </main>

    <div class="delete-confirm-modal">
        <div class="overlay"></div>
        <div class="modal-container">
            <div class="modal-card">
                <h4>آیا از حذف این <span>آدرس</span> اطمینان دارید</h4>
                <div class="delete-confirm-modal-btns">
                    <button type="button" class="btn btn-green" id="confirm-delete">
                        <i class="fa fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-red" id="cancel-delete">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
                <div class="close-btn">&times;</div>
            </div>
        </div>
    </div>

@endsection
