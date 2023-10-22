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
                                <h4>لیست کاربران</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                        @if (session()->has('success'))
                            <div class="alert alert-success col-11 mx-auto text-center" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @elseif(session()->has('failed'))
                            <div class="alert alert-danger col-11 mx-auto text-center" role="alert">
                                {{ session()->get('failed') }}
                            </div>
                        @endif

                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center">تصویر</th>
                                            <th class="text-center">نام</th>
                                            <th class="text-center">نام خانوادگی</th>
                                            <th class="text-center">وضعیت حساب</th>
                                            <th class="text-center">ایمیل</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="d-flex justify-content-center">
                                                    <img width="150" height="90" src="{{ $user->image ? asset($user->image) : asset('images/users/default.jpg') }}">
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <p class="align-self-center mb-0">{{ $user->name }}</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <p class="align-self-center mb-0">{{ $user->last_name }}</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        @if ($user->email_verified_at)
                                                            <span class="rounded px-2 py-1" style="background-color: darkgreen ; font-size: 0.6rem; box-shadow: 0 0 35px 0.4px green;">فعال</span>
                                                        @else
                                                            <span class="rounded px-2 py-1" style="background-color: firebrick ; font-size: 0.6rem; box-shadow: 0 0 35px 0.4px red;">غیرفعال</span>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <p class="align-self-center mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group d-flex justify-content-center">
                                                        @if ($user->isAdmin())
                                                            <a href="{{ route('admin.unset-admin', $user) }}" class="mt-4 btn bg-warning p-2">
                                                                <i class="bi bi-arrow-down"></i>
                                                                عزل
                                                            </a>
                                                        @else
                                                            <a href="{{ route('admin.set-admin', $user) }}" class="mt-4 btn bg-success p-2">
                                                                <i class="bi bi-arrow-up"></i>
                                                                ترفیع
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('admin.user.edit', $user) }}" class="mt-4 ml-2 btn bg-primary p-2">ویرایش</a>
                                                        <form class="d-inline" action="{{ route('admin.user.destroy', $user) }}" method="post">
                                                            @csrf
                                                            {{ method_field('delete') }}
                                                            <button class="mt-4 ml-2 btn bg-danger p-2"type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="mx-5">
                            {{ $users->links() }}
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
                <p class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                    Coded with
                </p>
            </div>
        </div>
    </div>
@endsection
