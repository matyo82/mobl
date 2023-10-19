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
                                <h4>جزییات سفارش با کد {{$order->id}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                        @if (session()->has('product-generated'))
                            <div class="alert alert-success col-lg-6 col-12 mx-auto fs-5 text-center" role="alert">
                                {{ session()->get('product-generated') }}
                            </div>
                        @endif

                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-4">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>user</th>
                                        <th>category</th>
                                        <th>number</th>
                                        <th>price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->orderItems as $orderItem)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <p class="align-self-center mb-0">{{$orderItem->id}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <p class="align-self-center mb-0">{{json_decode($orderItem->product)->name}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">

                                          <p class="align-self-center mb-0">{{$orderItem->singleProduct->productCategory->name}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <p class="align-self-center mb-0">{{$orderItem->number}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <p class="align-self-center mb-0">{{json_decode($orderItem->product)->price}}
                                                        تومان
                                                    </p>
                                                </div>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-heart">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </p>
            </div>
        </div>
    </div>
@endsection
