@extends('front.layouts.base')

@section('title', 'پروفایل')

@section('content')
    <main class="main-content">
        <div class="container">
            <section class="order-related">
                <section class="orders">
                    <h2>لیست سفارشات</h2>
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
                                <div class="status complete">
                                    <i class="fa fa-check-square"></i> تحویل داده شد
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
                                <div class="status processing">
                                    <i class="fa fa-clock"></i> درحال پردازش
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
                                <div class="status canceled">
                                    <i class="fa fa-close"></i> لغو شد
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
                                <div class="status returned">
                                    <i class="fa fa-arrow-left"></i> مرجوعی
                                </div>
                                <div class="more-info">
                                    شماره سفارش: <span>123456789</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>
                <section class="addresses">
                    <h2>آدرس ها</h2>
                    <table class="addresses-table">
                        <thead>
                            <tr>
                                <th>آدرس</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    میدان فردوسی خیابان ایرانشهر مجتمع تجاری میلاد طبقه 5 واحد 9
                                </td>
                                <td>
                                    <button type="button" class="btn delete-btn">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <button type="button" class="btn edit-btn">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    میدان فردوسی خیابان ایرانشهر مجتمع تجاری میلاد طبقه 5 واحد 9
                                </td>
                                <td>
                                    <button type="button" class="btn delete-btn">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <button type="button" class="btn edit-btn">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    میدان فردوسی خیابان ایرانشهر مجتمع تجاری میلاد طبقه 5 واحد 9
                                </td>
                                <td>
                                    <button type="button" class="btn delete-btn">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <button type="button" class="btn edit-btn">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    میدان فردوسی خیابان ایرانشهر مجتمع تجاری میلاد طبقه 5 واحد 9
                                </td>
                                <td>
                                    <button type="button" class="btn delete-btn">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <button type="button" class="btn edit-btn">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
