<header class="main-header">
    <div class="top-bar">
        <div class="container">
            <div class="tel">
                <i class="fa fa-phone"></i>
                <a href="tel:+9821888881">+98 21 88 88 88 88</a>
            </div>

            <!-- Top Menu -->
            <div class="top-menu">
                <ul>
                    @auth
                        <li class="ml-2"><a href="{{ route('front.profile') }}">حساب کاربری</a></li>
                        |
                        <li class="mx-2"><a href="#">علاقه مندی ها</a></li>
                        |
                        <li class="mx-2"><a href="{{route('front.cart')}}"> سبد خرید ({{$cartItems->count()}})</a></li>
                        |
                        <li class="mr-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm" style="margin-top:-5px">خروج</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="mr-2"><a href="{{ route('login') }}">ورود</a></li>
                        |
                        <li class="ml-2"><a href="{{ route('register') }}">ثبت نام</a></li>
                    @endguest

                </ul>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="mid-bar">
        <div class="container">
            <nav class="navbar" data-nav="nav">
                <button class="btn mobile-menu-btn menu-close-btn" type="button" id="close-btn"><i class="fa fa-times"></i></button>
                <ul>
                    <li>
                        <a href="{{ route('index') }}" @if(in_route('index')) style="pointer-events: none; text-decoration: none; color:blue" @endif><i class="fa fa-home"></i> صفحه اصلی</a>
                    </li>
                    <li>
                        <a href="{{ route('front.product-list') }}" @if(in_route('front.product-list')) style="pointer-events: none; text-decoration: none; color:blue" @endif><i class="fa fa-camera"></i> محصولات</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"  @if(in_route('about')) style="pointer-events: none; text-decoration: none; color:blue" @endif><i class="fa fa-pencil"></i>درباره ما</a>
                    </li>
                    <!-- Megamenu dropdown -->
                    @if (in_route('front.product-list'))
                        <div class="dropdown" data-dropdown>
                            <button type="button" class="btn" data-dropdown-btn>
                                <i class="fa fa-chevron-down"></i> دسته‌بندی
                            </button>

                            <div class="dropdown-content">
                                <div class="dropdown-grid">
                                    <div class="cell">
                                        <h4>مبل</h4>
                                        <ul>
                                            <li><a href="{{ route('front.product-list') }}">همه</a></li>

                                            @foreach ($categories as $category)
                                                <li><a href="{{ route('front.product-list' , ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </ul>
            </nav>
            <button type="button" class="btn mobile-menu-btn" id="open-btn">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Website Logo -->
            <div class="brand img-container">
                <a href="{{ route('index') }}"  @if(in_route('index')) style="pointer-events: none" @endif>
                    <img src="./assets/img/logo.png" alt="" />
                </a>
            </div>

            <!-- Social Icons on Hero Section -->
            <div class="social-icons">
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
