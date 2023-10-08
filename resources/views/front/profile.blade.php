@extends('front.layouts.master-one-col')


@section('head-tag')
    <title></title>
@endsection

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">

                <article style="width:100%">

                    <header class="mb-4">
                        <!-- title-->
                        <h1 class="fw-bolder mb-1">اطلاعات حساب </h1>
                    </header>

                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <section class="d-flex justify-content-end my-4">
                            <a class="btn btn-link btn-sm text-info text-decoration-none mx-1" data-bs-toggle="modal" data-bs-target="#edit-profile"><i class="fa fa-edit px-1"></i>ویرایش حساب</a>

                            <a class="btn btn-link btn-sm text-info text-decoration-none mx-1" data-bs-toggle="modal" data-bs-target="#add-address"><i class="fa fa-edit px-1"></i>افزودن ادرس</a>
                        </section>


                        <section class="row">
                            <section class="col-6 border-bottom mb-2 py-2">
                                <section class="field-title">نام </section>
                                <section class="field-value overflow-auto">{{ auth()->user()->name ?? '-' }}</section>
                            </section>

                            <section class="col-6 border-bottom mb-2 py-2">
                                <section class="field-title">نام خانوادگی </section>
                                <section class="field-value overflow-auto">{{ auth()->user()->last_name ?? '-' }}</section>
                            </section>


                            <section class="col-6 border-bottom my-2 py-2">
                                <section class="field-title">ایمیل</section>
                                <section class="field-value overflow-auto">{{ auth()->user()->email ?? '-' }}</section>
                            </section>

                            <section class="col-6 border-bottom my-2 py-2">
                                <section class="field-title">وضعیت حساب</section>
                                <section class="field-value overflow-auto">{{ auth()->user()->email_verified_at ? 'فعال' : 'غیر فعال' }}</section>
                            </section>

                            <section class="col-6 border-bottom my-2 py-2">
                                <section class="field-title">نوع کاربر</section>
                                <section class="field-value overflow-auto">{{ auth()->user()->user_type == 0 ? 'کاربر سایت' : 'ادمین' }}</section>
                            </section>
                        </section>



                        <section class="col-12 border-bottom my-2 py-2">
                            <section class="modal fade" id="edit-profile" tabindex="-1" aria-labelledby="edit-profile-label" aria-hidden="true">
                                <section class="modal-dialog">
                                    <section class="modal-content">
                                        <section class="modal-header">
                                            <h5 class="modal-title" id="edit-profile-label"><i class="fa fa-plus"></i>
                                                ویرایش
                                                حساب </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </section>
                                        <section class="modal-body">
                                            <form class="row" method="post" action="{{ route('front.profile.update') }}">
                                                @csrf
                                                @method('PUT')

                                                <section class="col-6 mb-2">
                                                    <label for="name" class="form-label mb-1">نام
                                                    </label>
                                                    <input value="{{ auth()->user()->name ?? auth()->user()->name }}" type="text" name="name" class="form-control form-control-sm" id="name" placeholder="نام">
                                                </section>

                                                <section class="col-6 mb-2">
                                                    <label for="last_name" class="form-label mb-1">نام خانوادگی
                                                    </label>
                                                    <input value="{{ auth()->user()->last_name ?? auth()->user()->last_name }}" type="text" name="last_name" class="form-control form-control-sm" id="last_name" placeholder="نام">
                                                </section>

                                                <section class="col-6 mb-2">
                                                    <label for="email" class="form-label mb-1">ایمیل
                                                    </label>
                                                    <input value="{{ auth()->user()->email ?? auth()->user()->email }}" disabled type="text" name="email" class="form-control form-control-sm" id="email" placeholder="نام">
                                                </section>

                                        </section>

                                        <section class="modal-footer py-1">
                                            <button type="submit" class="btn btn-sm btn-primary">ویرایش
                                                حساب
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن
                                            </button>
                                        </section>
                                        </form>

                                    </section>
                                </section>
                            </section>





                            <section class="modal fade" id="add-address" tabindex="-1" aria-labelledby="add-address" aria-hidden="true">
                                <section class="modal-dialog">
                                    <section class="modal-content">
                                        <section class="modal-header">
                                            <h5 class="modal-title" id="add-address"><i class="fa fa-plus"></i>

                                                افزودن ادرس جدید </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </section>
                                        <section class="modal-body">
                                            <form class="row" method="post" action="{{ route('front.profile.add-address') }}">
                                                @csrf

                                                <section class="col-6 mb-2">
                                                    <label class="form-label mb-1">شهر
                                                    </label>
                                                    <input type="text" name="city" class="form-control form-control-sm">
                                                </section>
                                                <section class="col-6 mb-2">
                                                    <label class="form-label mb-1">استان
                                                    </label>
                                                    <input type="text" name="province" class="form-control form-control-sm">
                                                </section>

                                                <section class="col-6 mb-2">
                                                    <label class="form-label mb-1">کد پستی
                                                    </label>
                                                    <input type="text" name="postal_code" class="form-control form-control-sm">
                                                </section>
                                                <section class="col-6 mb-2">
                                                    <label class="form-label mb-1">ادرس
                                                        <textarea name="address" class="form-control"></textarea>
                                                </section>

                                                <section class="col-6 mb-2">
                                                    <label class="form-label mb-1">پلاک
                                                    </label>
                                                    <input type="text" name="no" class="form-control form-control-sm">
                                                </section>
                                                <section class="col-6 mb-2">
                                                    <label class="form-label mb-1">واحد
                                                    </label>
                                                    <input type="text" name="unit" class="form-control form-control-sm">
                                                </section>


                                                <section class="col-6 mb-2">
                                                    <label class="form-label mb-1">وضعیت
                                                    </label>
                                                    <select class="form-control form-control-sm" name="status">
                                                        <option value="1">فعال</option>
                                                        <option value="0">غیر فعال</option>
                                                    </select>
                                                </section>


                                        </section>

                                        <section class="modal-footer py-1">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                ثبت
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن
                                            </button>
                                        </section>
                                        </form>

                                    </section>
                                </section>
                            </section>



                        </section>
                </article>
            </div>
        </div>
    </div>
@endsection
