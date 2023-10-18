@extends('front.layouts.base')

@section('title', 'پروفایل')

@section('script')
    <script>
        const addressModal = document.getElementById('addressModal')
        if (addressModal) {
            addressModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget

                // Extract info from data-bs-* attributes
                const province = button.getAttribute('data-bs-whatever1')
                const city = button.getAttribute('data-bs-whatever2')
                const address = button.getAttribute('data-bs-whatever3')
                const no = button.getAttribute('data-bs-whatever4')
                const unit = button.getAttribute('data-bs-whatever5')
                const postalCode = button.getAttribute('data-bs-whatever6')
                const status = button.getAttribute('data-bs-whatever7')
                const addressID = button.getAttribute('data-bs-whatever8')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const provinceCodeInput = addressModal.querySelector('.modal-body #province')
                const cityCodeInput = addressModal.querySelector('.modal-body #city')
                const addressCodeInput = addressModal.querySelector('.modal-body #address')
                const noCodeInput = addressModal.querySelector('.modal-body #no')
                const unitCodeInput = addressModal.querySelector('.modal-body #unit')
                const postalCodeInput = addressModal.querySelector('.modal-body #postal_code')
                const statusInput = addressModal.querySelector('.modal-body #status')
                const addressForm = addressModal.querySelector('.modal-body form')

                if (button.classList.contains('edit-btn')) {
                    provinceCodeInput.value = province
                    cityCodeInput.value = city
                    addressCodeInput.textContent = address
                    noCodeInput.value = no
                    unitCodeInput.value = unit
                    postalCodeInput.value = postalCode
                    status == 1 ? statusInput.checked = true : statusInput.checked = false
                    addressForm.setAttribute('action', `/profile/update-address/${addressID}`)
                } else {
                    provinceCodeInput.value = null
                    cityCodeInput.value = null
                    addressCodeInput.textContent = null
                    noCodeInput.value = null
                    unitCodeInput.value = null
                    postalCodeInput.value = null
                    statusInput.checked = false
                    addressForm.setAttribute('action', '/profile/add-address')
                }
            })
        }
    </script>
@endsection

@section('content')
    <main class="main-content">
        @if (session()->has('success'))
            <div class="alert alert-success col-10 mx-auto text-center fs-6" role="alert">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('failed'))
            <div class="alert alert-success col-10 mx-auto text-center fs-6 mt-1" role="alert">
                {{ session()->get('failed') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger col-10 mx-auto mt-1">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="@if (!$loop->first) mt-1 @endif">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <section class="order-related">
                <section class="orders">
                    <h2>لیست سفارشات</h2>
                    @foreach ($user->orders()->get() as $order)
                        <div class="card d-flex mt-4 shadow-sm">
                            <h3>سفارش {{ $order->created_at }}</h3>
                            <div>وضعیت :
                                <hr>
                                @switch($order->order_status)
                                    @case(0)
                                        <div class="status processing text-primary">
                                            <i class="fa fa-clock"></i> درحال پردازش
                                        </div>
                                    @break

                                    @case(1)
                                        <div class="status complete">
                                            <i class="fa fa-check-square"></i> ارسال شده
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="status canceled">
                                            <i class="fa fa-close"></i> لغو شده
                                        </div>
                                    @break

                                    @case(3)
                                        <div class="status returned">
                                            <i class="fa fa-arrow-left"></i> مرجوعی
                                        </div>
                                    @break

                                    @default
                                @endswitch
                                <hr>
                            </div>
                            <ul class="pt-0">
                                @foreach ($order->items()->get() as $item)
                                    @php
                                        $product = $item->product()->first();
                                    @endphp
                                    <li class="card">
                                        <div class="img-container">
                                            <a href="{{ route('front.product', ['product' => $product->id]) }}">
                                                <img src="{{ asset($product->image) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="text-content">
                                            <h3>
                                                <a href="{{ route('front.product', ['product' => $product->id]) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="price">
                                                <span>مبلغ کل : </span>
                                                <span>{{ $item->final_total_price }}</span> <span>تومان</span>
                                            </div>
                                            <div class="text-success" style="text-decoration: underline">
                                                تعداد سفارش : {{ $item->number }}
                                            </div>
                                            <div class="more-info">
                                                شماره سفارش: <span>{{ rand(10000000, 99999999) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </section>

                <section class="addresses mb-5">
                    <h2>آدرس ها</h2>
                    <button class="bg-success text-white rounded py-1 px-2 border-1" data-bs-toggle="modal" data-bs-target="#addressModal">
                        <i class="bi bi-plus-lg fs-5"></i>
                    </button>
                    <table class="addresses-table">
                        <thead>
                            <tr>
                                <th class="text-center">آدرس</th>
                                <th class="text-center">کد پستی</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->addresses()->get() as $address)
                                <tr>
                                    <td class="text-center">
                                        {{ 'استان ' . $address->province . ' , شهرستان ' . $address->city . ' , ' . $address->address . ' , پلاک ' . $address->no . ' , واحد ' . $address->unit }}
                                    </td>
                                    <td class="text-center">
                                        {{ $address->postal_code }}
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn edit-btn" data-bs-toggle="modal" data-bs-target="#addressModal" 
                                        data-bs-whatever1="{{ old('province') ?? $address->province }}" 
                                        data-bs-whatever2="{{ old('city') ?? $address->city }}" 
                                        data-bs-whatever3="{{ old('address') ?? $address->address }}" 
                                        data-bs-whatever4="{{ old('no') ?? $address->no }}" 
                                        data-bs-whatever5="{{ old('unit') ?? $address->unit }}" 
                                        data-bs-whatever6="{{ old('postal_code') ?? $address->postal_code }}" 
                                        data-bs-whatever7="{{ old('status') ?? $address->status }}" 
                                        data-bs-whatever8="{{ $address->id }}">
                                        
                                            <i class="fa fa-pencil text-info"></i>
                                        </button>
                                        <form class="d-inline" action="{{ route('front.profile.delete-address', $address->id) }}" method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn delete-btn">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
            <div class="profile-info mb-5">
                <div class="img-container avatar">
                    <img src="{{ asset($user->image) }}" alt="" />
                </div>
                <h3>{{ $user->name . ' ' . $user->last_name }}</h3>
                <div><i class="fa fa-at"></i>{{ $user->email }}</div>
                <div><i class="fa fa-user"></i>نوع کاربر:
                    <span>
                        @if ($user->type = 0)
                            مشتری
                        @else
                            مدیر
                        @endif
                    </span>
                </div>
                <div class="links">
                    <button type="button" class="btn btn-accent" id="change-pwd" data-bs-toggle="modal" data-bs-target="#profileModal">
                        ویرایش پروفایل
                    </button>

                </div>
            </div>

        </div>
    </main>


    {{-- profileModal --}}
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title fs-5" id="profileModalLabel">ویرایش پروفایل</h1>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('front.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="name" class="col-form-label">نام :</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="col-form-label">نام خانوادگی :</label>
                            <textarea class="form-control  @error('last_name') is-invalid @enderror" name="last_name" id="last_name">{{ old('last_name') ?? $user->last_name }}</textarea>
                        </div>
                        <div class="custom-file mb-3">
                            <label class="col-form-label" for="customFile">انتخاب تصویر:</label>
                            <input type="file" class="form-control  @error('image') is-invalid @enderror" id="customFile" name="image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="text-white p-1 btn bg-secondary" data-bs-dismiss="modal">بستن</button>
                            <button type="submit" class="text-white p-1 btn bg-primary me-2">اعمال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- addressModal --}}
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title fs-5" id="addressModalLabel">ویرایش آدرس</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="province" class="col-form-label">استان :</label>
                            <input type="text" name="province" class="form-control @error('province') is-invalid @enderror" id="province">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="col-form-label">شهر :</label>
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="col-form-label">آدرس دقیق :</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no" class="col-form-label">پلاک :</label>
                            <input type="text" name="no" class="form-control @error('no') is-invalid @enderror" id="no">
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="col-form-label">واحد:</label>
                            <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" id="unit">
                        </div>
                        <div class="mb-3">
                            <label for="postal_code" class="col-form-label">کد پستی :</label>
                            <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code">
                        </div>
                        <div class="form-check form-switch my-4">
                            <label class="form-check-label" for="status">آدرس فعال باشد :</label>
                            <input class="form-check-input @error('status') is-invalid @enderror" name="status" type="checkbox" role="switch" id="status" value="1">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="text-white p-1 btn bg-secondary" data-bs-dismiss="modal">بستن</button>
                            <button type="submit" class="text-white p-1 btn bg-primary me-2">اعمال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
