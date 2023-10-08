@extends('admin.layouts.base')

@section('content')
    <div id="content" class="main-content">

        <div class="row layout-top-spacing">

            <!--       start main             -->
            <div id="basic" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>ویرایش کاربر</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-6 col-12 mx-auto">
                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.user.update', $user) }}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="t-text1">نام:</label>
                                        <input id="t-text1" type="text" name="name" placeholder="نام را وارد کنید" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name }}">
                                        @error('name')
                                            <div class="alert alert-danger mt-2" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">نام خانوادگی:</label>
                                        <input class="form-control @error('last_name') is-invalid @enderror" placeholder="نام خانوادگی را وارد کنید" id="exampleFormControlTextarea1" name="last_name" value="{{ old('last_name') ?? $user->last_name }}">
                                        @error('last_name')
                                            <div class="alert alert-danger mt-2" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">ایمیل:</label>
                                            <input type="email" class="form-control" placeholder="ایمیل کاربر را وارد کنید" name="email" value="{{ old('email') ?? $user->email }}">
                                            @error('email')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">رمز عبور:</label>
                                            <input type="password" class="form-control" placeholder="رمز را وارد کنید" name="password">
                                            @error('password')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">تکرار رمز عبور:</label>
                                            <input type="password" class="form-control" placeholder="رمز را تکرار کنید" name="confirm_password">
                                            @error('confirm_password')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="select-55">نوع کاربر:</label>
                                            <select class="form-control" id="select-55" name="user_type">
                                                <option value="0" @if ($user->user_type == 0) selected @endif>کاربر عادی</option>
                                                <option value="1" @if ($user->user_type == 1) selected @endif>مدیر سایت</option>
                                            </select>
                                            @error('user_type')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group my-3">
                                        <div class="custom-file mb-4">
                                            <label class="custom-file-label" for="customFile">انتخاب تصویر:</label>
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            @error('image')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-center mt-4">
                                            <img src="{{ $user->image ? asset($user->image) : asset('images/users/default.jpg') }}" alt="" height="200">
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <button type="submit" class="mt-2 btn btn-primary">ویرایش کاربر</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!--       end main             -->
                </div>


            </div>
        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All
                    rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </p>
            </div>
        </div>
    </div>
@endsection
