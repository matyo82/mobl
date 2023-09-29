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
                                <h4>افزودن پارچه</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                        <div class="row">
                            <div class="col-lg-6 col-12 mx-auto">
                                <form method="post" action="{{ route('admin.product-fabric.store',$product->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <p>نام:</p>
                                        <label for="t-text1" class="sr-only">اسم</label>
                                        <input id="t-text1" type="text" name="fabric_name" placeholder="Some Text..." class="form-control" value="{{ old('fabric_name') }}" required>
												@error('fabric_name')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">افزایش قیمت</label>
                                            <input type="number" class="form-control" placeholder="" name="price_increase" value="{{ old('price_increase') }}">
												@error('price_increase')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                        </div>
                                    </div>    
               

									<div class="form-row mb-4">
									          <label for="select-55">وضعیت</label>

									        <select class="form-control" id="select-55" name="status" value="{{ old('status') }}">
                                                    <option value="0">غیرفعال</option>
                                                    <option value="1">فعال</option>
												@error('status')
                                                 <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                   <strong>
                                                    {{ $message }}
                                                   </strong>
                                                 </span>
                                                @enderror
                                            </select>	 
                                    </div>		
									
                                    <div class="form-group">
                                        <button type="submit" class="mt-4 btn btn-primary">افزودن </button>
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
   
   <script>
    var select_fabrics = $('#selected_fabrics');
    select_fabrics.select2({
        placeholder: 'لطفا انتخاب کنید',
        multiple: true,
        tags : true
    })
</script>


@endsection
