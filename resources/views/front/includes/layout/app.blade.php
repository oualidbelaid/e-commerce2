@php
use App\Object\Cartcookie;
@endphp
{{-- @if (Auth::user() == null) --}}
@php
$cart = new Cartcookie(Cookie::get('cartlines'));
@endphp
{{-- @else --}}
{{-- @php --}}
{{-- $cart = Auth::user()->cart; --}}
{{-- @endphp --}}
{{-- @endif --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/icon_web.webp') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ecommerce')</title>


    <!-- Fonts -->

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <!-- style  Bootstrap V-5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Styles local -->
    <link rel="stylesheet" href="{{ asset('css/irs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bandel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
</head>

<body data-layout-size="fluid" data-sidebar="dark" data-sidebar-size="icon" data-topbar="dark"
    data-layout-scrollable="true" class="vertical-collpsed" data-layout="horizontal">
    <div class="load">
        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('js/spinner.js') }}"></script>
    </div>
    <!-- start header-->
    <header id="page-topbar" style="    background-color: #0B2B40;">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="d-flex">
                    <a href="{{ route('home') }} " class=" logo logo-light ">
                        <button type="button" aria-expanded="false"
                            class="btn header-item dropdown-toggle btn btn-white">

                            <div class="h4 ">
                                <i class="fad fa-fire text-danger" style="font-size: 23px;"></i> <span
                                    class="d-none d-lg-inline text-white">F<span class="text-danger">
                                        <i class="fad fa-italic"></i>
                                    </span>RE</span>
                            </div>
                        </button>
                    </a>

                    <a href="index" class="logo logo-dark">
                        <button type="button" aria-expanded="false"
                            class="btn header-item dropdown-toggle btn btn-white">

                            <div class="h4 ">
                                <i class="fad fa-fire text-danger " style="font-size: 23px;"></i> <span
                                    class="d-none d-lg-inline ">F<span class="text-danger">
                                        <i class="fad fa-italic"></i>
                                    </span>RE</span>
                            </div>
                        </button>
                    </a>
                </div>

                <button type="button"
                    class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                    data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="far fa-bars"></i>
                </button>

                <!-- App Search-->
                {{-- <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input class="form-control form-control" type="text" name="" placeholder="Search...">
                        <span class="bx bx-search-alt">
                            <i class="far fa-search font-size-15"></i>
                        </span>
                    </div>
                </form>

                <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="false" aria-expanded="false">
                        <span key="t-megamenu">Mega Menu</span>
                        <i class="mdi mdi-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-megamenu" style="">
                        <div class="row">
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="font-size-14 mt-0" key="t-ui-components">UI Components</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);" key="t-lightbox">Lightbox</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-range-slider">Range Slider</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-sweet-alert">Sweet Alert</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-rating">Rating</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-forms">Forms</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-tables">Tables</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-charts">Charts</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="font-size-14 mt-0" key="t-applications">Applications</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);" key="t-ecommerce">Ecommerce</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-calendar">Calendar</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-email">Email</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-projects">Projects</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-tasks">Tasks</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-contacts">Contacts</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="font-size-14 mt-0" key="t-extra-pages">Extra Pages</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);" key="t-light-sidebar">Light Sidebar</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-compact-sidebar">Compact
                                                    Sidebar</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-horizontal">Horizontal layout</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-maintenance">Maintenance</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-coming-soon">Coming Soon</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-timeline">Timeline</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-faqs">FAQs</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="font-size-14 mt-0" key="t-ui-components">UI Components</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);" key="t-lightbox">Lightbox</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-range-slider">Range Slider</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-sweet-alert">Sweet Alert</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-rating">Rating</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-forms">Forms</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-tables">Tables</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" key="t-charts">Charts</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-5">
                                        <div>
                                            <img src="assets/images/megamenu-img.png" alt=""
                                                class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
            </div>

            <div class="d-flex">
                {{-- <div class="d-none d-lg-inline-block ms-1 dropdown">
                    <button type="button" id="dark-mode" class="btn header-item noti-icon headerbtn"
                        data-toggle="fullscreen">
                        <i class='fad fa-sun'></i>
                    </button>
                </div> --}}
                <div class="d-none d-lg-inline-block ms-1 dropdown">
                    <a href="{{ route('help') }} " style="display: flex;align-items: center;"
                        class="btn header-item noti-icon headerbtn" data-toggle="fullscreen">
                        <i class="fal fa-info-circle"></i>
                    </a>
                </div>
                <div class="d-none d-lg-inline-block ms-1 dropdown">
                    <a href="{{ route('favorite') }} " style="display: flex;align-items: center;"
                        class="btn header-item noti-icon headerbtn" data-toggle="fullscreen">
                        <i class="fal fa-heart  "></i>
                    </a>
                </div>
                <div class="dropdown d-inline-block dropdown">
                    <button id="page-header-notifications-dropdown"
                        class="nav-link dropdown-toggle btn header-item noti-icon right-bar-toggle waves-effect"
                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre="">
                        <i
                            class="fal fa-shopping-cart {{ $cart != null && count($cart->cartlines) > 0 ? 'bx-tada' : '' }} "></i>
                        <span class="badge bg-danger rounded-pill">{{ $cart != null ? count($cart->cartlines) : '0' }}
                        </span>
                    </button>
                    <div class="dropdown-menu-lg dropdown-menu-end p-0 dropdown-menu"
                        style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 72px, 0px);"
                        data-popper-placement="bottom-end">
                        <div class="p-3">
                            <div class="align-items-center row">
                                <div class="col">
                                    <h6 class="m-0">CART</h6>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('cart') }} " class="small" key="t-view-all">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar="init" style="max-height: 230px;">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper"
                                            style="height: auto; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <div lx="8" class="col">
                                                    <div class="card" style="">
                                                        <div class="p-2">
                                                            <div class="table-responsive" style="overflow: hidden;">
                                                                <table
                                                                    class="table align-middle mb-0 table-nowrap table cartNotification">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th>Product</th>
                                                                            <th>Name</th>
                                                                            <th colspan="1">Price (DA)</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>


                                                                        @if ($cart != null && count($cart->cartlines) > 0)
                                                                            @foreach ($cart->cartlines as $key => $item)
                                                                                @php
                                                                                    $photos = explode('&&', $item->product->photo);
                                                                                @endphp
                                                                                <tr id="{{ $item->id }} ">
                                                                                    <td><img src="{{ URL::asset($photos[0]) }}"
                                                                                            class="avatar-md"></td>
                                                                                    <td>
                                                                                        <h6 class='font-size-12 text-truncate'
                                                                                            style='max-width: 68px;'>
                                                                                            {{ $item->product->name }}
                                                                                        </h6>
                                                                                    </td>
                                                                                    <td>{{ $item->product->price }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 400px;"></div>
                            </div>
                        </div>
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route('cart') }} ">
                                <i class="fal fa-arrow-right font-size-15"></i>
                                <span>Checkout..</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-inline-block ms-1 dropdown">
                    <a href="{{ Auth::user() ? route('fprofile', [Auth::user()->profile->id]) : route('login') }} "
                        style="display: flex;align-items: center;" class="btn header-item noti-icon headerbtn"
                        data-toggle="fullscreen">
                        <i class="fal fa-user-alt  "></i>
                    </a>
                </div>
                <div class="dropdown d-inline-block nav_m">
                    <button id="navbarDropdown"
                        class="nav-link dropdown-toggle btn header-item noti-icon right-bar-toggle waves-effect"
                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre="">
                        <i class="far fa-ellipsis-v p-2"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">Welcome Peter!</h6>
                        <a href="@if (Auth::user() == null) {{ route('login') }}
                        @else
                            {{ route('fprofile', [Auth::user()->profile->id]) }} @endif "
                            class="dropdown-item">
                            <span class="align-middle" key="t-profile">Profile</span>
                        </a>
                        <a href="{{ route('cart') }} " class="dropdown-item">
                            <span class="align-middle" key="t-messages">Cart</span>
                        </a>
                        <a href="{{ route('favorite') }} " class="dropdown-item">
                            <span class="align-middle" key="t-messages">Favorite</span>
                        </a>
                        <a href="{{ route('order_list') }} " class="dropdown-item">
                            <span class="align-middle" key="t-messages">Order List</span>
                        </a>
                        @if (Auth::user() != null && Auth::user()->is_admin == 1)
                            <a href="{{ route('admin') }} " class=" dropdown-item">
                                <span class="align-middle" key="t-profile">Admin</span>
                            </a>
                        @endif
                        <div class="dropdown-divider"></div>
                        @if (Auth::user() == null)
                            <a href="{{ route('login') }}" type="button" tag="a"
                                class="dropdown-item">login</a>
                        @else
                            <a href="{{ route('logout') }}" type="button" tag="a" class="dropdown-item"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <span class="align-middle" key="t-logout">Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </a>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header-->

    <!-- star menu -->
    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse active" id="topnav-menu-content">
                    <ul class="navbar-nav active">

                        @php
                            use App\Models\Category;
                            $i = 0;
                        @endphp
                        @foreach (Category::all() as $key => $item)
                            @if (count($item->products) > 0 && $i <= 6)
                                @php
                                    $i = $i + 1;
                                @endphp
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none"
                                        href=" {{ route('fcategory', [$item->name]) }} "
                                        id="topnav-{{ $item->id }}" role="button">
                                        <i class="bx bx-home-circle me-2"></i>
                                        <span key="t-dashboards">{{ $item->name }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li class="nav-item dropdown" style="position: initial;">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement"
                                role="button">
                                <i class="bx bx-tone me-2"></i>
                                <span key="t-ui-elements"> More Categories</span>
                                <div class="arrow-down"></div>
                            </a>

                            <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                                aria-labelledby="topnav-uielement"
                                style="
                                right: 0px;left:auto;">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach (Category::all() as $key => $item)
                                                @if (count($item->products) > 0 && $i > 6)
                                                    @php
                                                        $i = $i + 1;
                                                    @endphp
                                                    @if ($i % 2 == 0 && $i % 3 != 0)
                                                        <a href="{{ route('fcategory', [$item->name]) }} "
                                                            class="dropdown-item"
                                                            key="t-alerts">{{ "$item->name" }}</a>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach (Category::all() as $key => $item)
                                                @if (count($item->products) > 0 && $i > 6)
                                                    @php
                                                        $i = $i + 1;
                                                    @endphp
                                                    @if ($i % 2 != 0 && $i % 3 != 0)
                                                        <a href="{{ route('fcategory', [$item->name]) }} "
                                                            class="dropdown-item"
                                                            key="t-alerts">{{ "$item->name" }}</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach (Category::all() as $key => $item)
                                                @if (count($item->products) > 0 && $i > 6)
                                                    @php
                                                        $i = $i + 1;
                                                    @endphp
                                                    @if ($i % 2 != 0 && $i % 3 == 0)
                                                        <a href="{{ route('fcategory', [$item->name]) }}"
                                                            class="dropdown-item"
                                                            key="t-alerts">{{ "$item->name" }}</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- end menu -->
    {{-- section silde header --}}
    <div class="main-content info p-0 m-0" id="slider">
        <div class="page-content " style=" padding-left: 0;padding-right: 0;padding-bottom: 0;">
            @yield('slide')
        </div>
    </div>
    <!-- start section info -->
    <div class="main-content info" id="maincontent">
        <div class="page-content " style="padding-top: 0">
            @yield('content')
        </div>
    </div>
    <!-- end section info  -->
    <!-- start footer-->
    <footer class="    footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">2022 © Skote.</div>
                <div class="col-md-6">
                    <div class="text-sm-end d-none d-sm-block">Design &amp; Develop by Oualid_Belaid</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer-->



    <script src="{{ asset('libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    {{-- <script src="{{ asset('js/pages/product-filter-range.init.js') }}"></script> --}}
    <script src="{{ asset('js/app1.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/prf.js') }}"></script>
    {{-- product --}}

    <script src="{{ asset('assets/admin/js/product.js') }}"></script>
    <script src="{{ asset('assets/front/js/ajaxCart.js') }}"></script>
    <script src="{{ asset('assets/front/js/ajaxFavorite.js') }}"></script>


</body>

</html>
