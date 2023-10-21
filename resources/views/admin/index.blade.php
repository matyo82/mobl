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
                                <h4>داشبورد</h4>
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
     
        <!-- // باکس ها -->
        <section class="row">
            <!--// هر باکس-->

            <section class="col-lg-3 col-md-6 col-sm-12">
                <a href="" class="text-decoration-none d-block mb-4">
                    <section class="card bg-primary text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>تعداد تمام اعضای سایت</h5>
                                    <p>{{$allUsers}}</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>

                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i>
                            بروزرسانی شده در تاریخ ...
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-sm-12">
                <a href="" class="text-decoration-none d-block mb-4">
                    <section class="card bg-success text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>تعداد ادمین های سایت</h5>
                                    <p>{{$admins}}</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>

                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i>
                            بروزرسانی شده در تاریخ ...
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-sm-12">
                <a href="" class="text-decoration-none d-block mb-4">
                    <section class="card bg-secondary text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>تعداد کاربران عادی</h5>
                                    <p>{{$users}}</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>

                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i>
                            بروزرسانی شده در تاریخ ...
                        </section>
                    </section>
                </a>
            </section>


            <section class="col-lg-3 col-md-6 col-sm-12">
                <a href="" class="text-decoration-none d-block mb-4">
                    <section class="card bg-danger text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>تعداد تمام سفارشات</h5>
                                    <p>{{$ordersCount}}</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>

                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i>
                            بروزرسانی شده در تاریخ ...
                        </section>
                    </section>
                </a>
            </section>
			
			<section class="col-lg-3 col-md-6 col-sm-12">
                <a href="" class="text-decoration-none d-block mb-4">
                    <section class="card bg-info text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>سفارشات در انتظار پرداخت</h5>
                                    <p>{{$ordersWaitForPay}}</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>

                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i>
                            بروزرسانی شده در تاریخ ...
                        </section>
                    </section>
                </a>
            </section>
			
			   <section class="col-lg-3 col-md-6 col-sm-12">
                <a href="" class="text-decoration-none d-block mb-4">
                    <section class="card bg-dark text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>سفارشات ارسال شده</h5>
                                    <p>{{$ordersThatSends}}</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>

                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i>
                            بروزرسانی شده در تاریخ ...
                        </section>
                    </section>
                </a>
            </section>
			

			<section class="col-lg-3 col-md-6 col-sm-12">
                <a href="" class="text-decoration-none d-block mb-4">
                    <section class="card bg-success text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>سفارشات کنسل شده</h5>
                                    <p>{{$ordersThatCanceled}}</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>

                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i>
                            بروزرسانی شده در تاریخ ...
                        </section>
                    </section>
                </a>
            </section>
			
			
			<section class="col-lg-3 col-md-6 col-sm-12">
                <a href="" class="text-decoration-none d-block mb-4">
                    <section class="card bg-warning text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>سفارشات ثبت شده</h5>
                                    <p>{{$ordersThatSubmit}}</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>

                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i>
                            بروزرسانی شده در تاریخ ...
                        </section>
                    </section>
                </a>
            </section>
			
			
        </section>
           
		   
              <!-- /last orders -->
			  
		   <h3 class="card-title">آخرین سفارشات</h3>

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ثبت کننده سفارش</th>
                      <th>ای دی سفارش</th>
                      <th>هزینه سفارش</th>
                      <th>وضعیت</th>
                      <th>مشاهده فاکتور</th>
                    </tr>
                    </thead>
                    <tbody>
					@foreach($orders as $order)
                    <tr>
                      <td>{{$order->user->name}}</td>
                      <td>{{$order->id}}</td>
                      <td>{{$order->order_final_amount}} تومان</td>
                      <td>
					  @if($order->order_status==0)
					  <span class="badge badge-success">در انتظار پرداخت</span>
				      @elseif($order->order_status==1)
					  <span class="badge badge-success">ارسال شده</span>
				      @elseif($order->order_status==2)
					  <span class="badge badge-danger">لغو شده</span>
				      @elseif($order->order_status==3)
					  <span class="badge badge-warning">ثبت شده</span>
				      @elseif($order->order_status==4)
					  <span class="badge badge-warning">مرجوعی</span>
					  @endif
					  </td>
                      <td>
                             <div class="form-group">
                                <a href="{{route('admin.orders.show-factor',$order)}}" class="mt-4 btn btn-success">مشاهده فاکتور
								</a> 
                                                       
                            </div>
                      </td>
                    </tr>
					@endforeach
                    </tbody>
                  </table>
                </div>
				</div>
                <!-- /.table-responsive -->






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
