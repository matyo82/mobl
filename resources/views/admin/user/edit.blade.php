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
                                <h4>ویرایش محصول</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                              @if (session()->has('product-generated'))
                                  <div class="alert alert-success col-lg-6 col-12 mx-auto fs-5 text-center" role="alert">
                                      {{ session()->get('product-generated') }}
                                  </div>
                              @endif

                        <div class="row">
                            <div class="col-lg-6 col-12 mx-auto">
                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.user.update',$product) }}">
                                    @csrf
									@method('put')
                                    <div class="form-group">
                                        <p>نام:</p>
                                        <label for="t-text1" class="sr-only">اسم</label>
                                        <input id="t-text1" type="text" name="name" placeholder="Some Text..." class="form-control" value="{{ old('name',$product->name) }}" required>
												@error('name')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">معرفی:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="introduction">{{ old('introduction',$product->introduction) }}</textarea>
												@error('introduction')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">قیمت</label>
                                            <input type="number" class="form-control" placeholder="" name="price" value="{{ old('price',$product->price) }}">
												@error('price',$product->price)
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                        </div>
                                    </div>         

									<div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">موجودی</label>
                                            <input type="number" class="form-control" placeholder="" name="marketable_number" value="{{ old('marketable_number',$product->marketable_number) }}">
												@error('marketable_number')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
									          <label for="select-55">دسته بندی</label>

									        <select class="form-control" id="select-55" name="category_id" value="{{ old('category_id') }}">
											
											@foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if(old('category_id', $product->category_id) == $category->id) selected @endif>
														{{$category->name}}
													</option>
                                            @endforeach
												@error('category_id')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                            </select>	 
                                    </div>	

                                    <div class="form-row mb-4">
									          <label for="select-55">گارانتی</label>

									        <select class="form-control" id="select-55" name="guarantee" value="{{ old('guarantee') }}">
                                                    <option value="0" @if(old('guarantee', $product->guarantee) == 0) selected @endif>ندارد</option>
                                                    <option value="1" @if(old('guarantee', $product->guarantee) == 1) selected @endif>دارد</option>
												@error('guarantee')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                            </select>	 
                                    </div>	               

									<div class="form-row mb-4">
									          <label for="select-55">وضعیت</label>

									        <select class="form-control" id="select-55" name="status" value="{{ old('status') }}">
                                                    <option value="0" @if(old('status', $product->status) == 0) selected @endif>غیرفعال</option>
                                                    <option value="1" @if(old('status', $product->status) == 1) selected @endif>فعال</option>
												@error('status')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                            </select>	 
                                    </div>		
									
									
									<div class="form-row mb-4">
									          <label for="select-55">قابل فروش</label>

									        <select class="form-control" id="select-55" name="marketable" value="{{ old('marketable') }}">
                                                    <option value="0" @if(old('marketable', $product->marketable) == 0) selected @endif>خیر</option>
                                                    <option value="1" @if(old('marketable', $product->marketable) == 1) selected @endif>بله</option>
												@error('marketable')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                            </select>	 
                                    </div>		

									
                                    <div class="form-group mb-4 mt-3">
                                        <div class="custom-file mb-4">
                                            <label class="custom-file-label" for="customFile">انتخاب تصویر</label>
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
											<section class="row mt-5 d-flex justify-content-center">
                                              <img src="{{asset($product->image) }}" alt="" width="300" height="300">
                                            </section>
                                        </div>
												@error('image')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                    </div>
									
									
									

                        <section class="col-12 border-top border-bottom py-3 mb-3">
						
					
						@foreach($product->metas as $meta)
                            <section class="row">

                                <section class="col-6 col-md-3 mb-3">
                                    <div class="form-group">
                                        <input type="text" name="meta_key[]" class="form-control form-control-sm" placeholder="ویژگی ..." value="{{$meta->meta_key}}">
                                    </div>
									@error('meta_key.*')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror	
                                </section>

                                <section class="col-6 col-md-3 mb-3">
                                    <div class="form-group">
                                        <input type="text" name="meta_value[]" class="form-control form-control-sm" placeholder="مقدار ..." value="{{$meta->meta_value}}">
                                    </div>
									@error('meta_value.*')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror	
                                </section>
							
							
						<span class="btn btn-danger btn-sm deleteMetaField" style="height:35px"><i class="fa fa-trash-alt"></i> حذف ویژگی</span>						
						    
                            </section>
							@endforeach
							

                            <section>
                                <button id="meta_copy" type="button" class="btn btn-success btn-sm">افزودن</button>
                            </section>


                        </section>

                                    <div class="form-group">
                                        <button type="submit" class="mt-4 btn btn-primary">افزودن محصول</button>
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

@section('script')
	<script>

     $('#meta_copy').on('click',function(){
		 console.log('ss');
		 var ele=$(this).parent().prev().clone(true);
		 $(this).before(ele);
	 })

	 $('.deleteMetaField').on('click',function(){
		 
		 var ele=$(this).parent().remove();
	 })

   </script>
@endsection
