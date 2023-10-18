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
                                <h4>پارچه کالا</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                                <div class="widget-content widget-content-area">
																						                                                                                                                                                                          <div class="form-group mb-4">
                                                  <a href="{{ route('admin.product-fabric.create',$product)}}" class="mt-4 btn btn-primary">ایجاد</a>
												<div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped mb-4">
                                            <thead>
                                                <tr>
                                                    <th>name</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											@foreach($product->productFabrics()->get() as $fabric)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            <p class="align-self-center mb-0">{{$fabric->fabric_name}}</p>
                                                        </div>
                                                    </td>
                                              		
														<td>
														                                                                                                                       <div class="form-group">
                                                                <form class="d-inline" action="{{ route('admin.product-fabric.destroy', $fabric->id) }}" method="post">
                                                                    @csrf
                                                                    {{ method_field('delete') }}
                                                                    <button class="mt-4 btn btn-danger"type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                                                </form>
                                                            </div>
															</td>
													
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </p>
            </div>
        </div>
    </div>
@endsection
