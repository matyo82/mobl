<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{route('admin.admin.user.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>داشبورد</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                        </svg>
                    </div>
                </a>     



            <li class="menu">
                <a href="#users" data-toggle="collapse" data-active="true" aria-expanded="true" class="dropdown-toggle">
                    <div>
                        
                        <span>کاربران</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled @if(in_route(['admin.user.index' , 'admin.user.create'])) show @endif" id="users" data-parent="#accordionExample">
                    <li class="@if(in_route('admin.user.index')) active @endif">
                        <a href="{{ route('admin.user.index') }}"> لیست کاربران </a>
                    </li>

                    <li class="@if(in_route('admin.user.create')) active @endif">
                        <a href="{{ route('admin.user.create') }}"> افزودن کاربر </a>
                    </li>

                </ul>
				
				
				   <a href="{{route('admin.orders.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div>
                        
                        <span>سفارشات</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                        </svg>
                    </div>
                </a>






                <a href="#products" data-toggle="collapse" data-active="true" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <span>محصولات</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled @if(in_route(['admin.product.index' , 'admin.product.create'])) show @endif" id="products" data-parent="#accordionExample">
                    <li class="@if(in_route('admin.product.index')) active @endif">
                        <a href="{{ route('admin.product.index') }}"> لیست محصولات </a>
                    </li>

                    <li class="@if(in_route('admin.product.create')) active @endif">
                        <a href="{{ route('admin.product.create') }}"> افزودن محصول </a>
                    </li>

                </ul>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!--  END SIDEBAR  -->
