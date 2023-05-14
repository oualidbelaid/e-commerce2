<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/icon_web.webp') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'admin')</title>


    <!-- Fonts -->

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <!-- style  Bootstrap V-5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Styles local -->
    <link rel="stylesheet" href="{{ asset('css/bandel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- style generale --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css1/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css1/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css1/icons.min.css') }}"> --}}

</head>


<body data-sidebar="light" data-layout-size="fluid" data-sidebar="light" data-sidebar-size="icon" data-topbar="light"
    data-layout-scrollable="false" class="vertical-collpsed " style="">
    <div class="load">
        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('js/spinner.js') }}"></script>
    </div>

    <!-- As a link -->
    <header id="page-topbar" style="position: fixed">
        <nav class="navbar navbar-light navbar-header ">
            <div class="d-flex">
                <button class="btn btn-sm px-3 font-size-16 vertinav-toggle header-item waves-effect"
                    id="vertical-menu-btn">
                    <i class="fad fa-bars"></i>
                </button>
                <div class="d-flex ms-md-2">
                    <a href=" {{ route('admin') }} " class=" logo logo-light ">
                        <button type="button" aria-expanded="false"
                            class="btn header-item dropdown-toggle btn btn-white">
                            <div class="h4 ">
                                <i class="fad fa-fire text-danger" style="font-size: 23px;"></i> <span
                                    class="d-none d-md-inline text-white">F<span class="text-danger">
                                        <i class="fad fa-italic"></i>
                                    </span>RE</span>
                            </div>
                        </button>
                    </a>

                    <a href="{{ route('admin') }}" class="logo logo-dark">
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
                {{-- <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input class="form-control form-control" type="text" name="" placeholder="Search...">
                        <span class="bx bx-search-alt">
                            <i class="far fa-search font-size-15"></i>
                        </span>
                    </div>
                </form> --}}
            </div>
            <div class="d-flex">
                <div class="d-none d-sm-inline-block ms-1 dropdown">
                    <button type="button" id="dark-mode" class="btn header-item noti-icon headerbtn"
                        data-toggle="fullscreen">
                        <i class='fal fa-sun'></i>
                    </button>
                </div>
                <div class="dropdown d-inline-block dropdown">
                    <button id="page-header-notifications-dropdown"
                        class="nav-link dropdown-toggle btn header-item noti-icon right-bar-toggle waves-effect"
                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre="">
                        <i class="fal fa-bell "></i>
                        <span class="badge bg-danger rounded-pill">0
                        </span>
                    </button>
                    <div class="dropdown-menu-lg dropdown-menu-end p-0 dropdown-menu"
                        style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 72px, 0px);"
                        data-popper-placement="bottom-end">
                        <div class="p-3">
                            <div class="align-items-center row">
                                <div class="col">
                                    <h6 class="m-0">Notifications</h6>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('notification') }} " class="small" key="t-view-all">View
                                        All</a>
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
                                                {{-- @foreach (Auth::user()->notifications as not)
                                                    <a href="{{ route('notification.show', [not->id]) }}"
                                                        class="text-reset notification-item d-block {{ not->read_at == null ? 'active' : '' }}">
                                                        <div class="d-flex">
                                                            <img src="/assets/images/users/avatar-3.jpg"
                                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                            <div class="flex-1">
                                                                <h6 class="mt-0 mb-1">
                                                                    {{ not->data['user']['name'] }}</h6>
                                                                <div class="font-size-13 text-muted">
                                                                    <p class="mb-1">
                                                                        {{ not->data['action'] }} :
                                                                        {{ not->data['product']['name'] }}
                                                                    </p>
                                                                    <p class="mb-0 font-size-12">
                                                                        <i class="far fa-clock font-size-11"></i>
                                                                        <span
                                                                            key="t-hours-ago">{{ not->data['time'] }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 400px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical " style="visibility: visible;">
                                <div class="simplebar-scrollbar simplebar-visible"
                                    style="height: 132px; display: block; ">
                                </div>
                            </div>
                        </div>
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center"
                                href="{{ route('notification') }}">
                                <i class="fad fa-arrow-right font-size-12"></i>
                                <span>View More..</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-inline-block dropdown">
                    <button id="page-header-user-dropdown" type="button" aria-expanded="false"
                        class="btn header-item headerbtn btn btn-"
                        style="display: flex;align-items: center;justify-content: center;align-content: center;">
                        <a href="{{ route('profile', [Auth::user()->profile->id]) }} "
                            class="btn header-item headerbtn btn btn-" style="display: flex;align-items: center;">
                            <i class="fal fa-user mx-2"></i>
                            <span class="d-none d-sm-inline-block ms-1 font-size-12 "> my account</span>
                        </a>
                    </button>
                </div>
                <div class="dropdown d-inline-block nav_m">
                    <button id="navbarDropdown"
                        class="nav-link dropdown-toggle btn header-item noti-icon right-bar-toggle waves-effect"
                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre="">
                        <i class="fad fa-ellipsis-v-alt p-2 "></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">Welcome Peter!</h6>
                        <a tag="a" click=""
                            href="{{ route('profile', [Auth::user()->profile->id]) }}" class="dropdown-item">
                            <span class="align-middle" key="t-profile">Profile</span>
                        </a>
                        <a tag="a" click="" href="{{ route('notification') }}"
                            class="dropdown-item">
                            <span class="align-middle">Notification</span>
                        </a>
                        <a tag="a" click="" href="#" class="dropdown-item">
                            <span class="align-middle" key="t-taskboard">Settings</span>
                        </a>
                        <a tag="a" click="" href="{{ route('home') }} " class="dropdown-item"> view
                            site</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" type="button" tag="a" class="dropdown-item"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <span class="align-middle" key="t-logout">Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>

                    </div>
                </div>
            </div>

        </nav>
    </header>
    <!-- menu -->
    <!-- star menu -->
    <div class="vertical-menu">
        <div data-simplebar="init" class="h-100">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">
                                <div id="sidebar-menu">
                                    <ul class="metismenu list-unstyled" id="side-menu">
                                        <li class="menu-title" key="t-menu">Menu</li>
                                        <li>
                                            <a href="{{ route('admin') }}" class="waves-effect">
                                                <i class="fad fa-tachometer-alt-average"></i>
                                                <span key="t-chat">Dashbords</span>
                                            </a>
                                        </li>
                                        {{-- <li><a class="waves-effect"><i class="fad fa-store"></i><span
                                                    class="badge rounded-pill bg-info float-end">04</span> <span
                                                    key="t-dashboards">dashbords</span></a>
                                            <ul class="sub-menu mm-collapse " aria-expanded="false">
                                                <li>
                                                    <a href="/" key="t-default" class="side-nav-link-ref">Favorite</a>
                                                </li>
                                                <li>
                                                    <a href="/dashboard-saas" class="side-nav-link-ref"
                                                        key="t-saas">Cart</a>
                                                </li>
                                                <li>
                                                    <a href="/dashboard-crypto" class="side-nav-link-ref"
                                                        key="t-crypto">Factuer</a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                        <li class="menu-title" key="t-apps">Apps</li>
                                        <li class=" ">
                                            <a class="has-arrow waves-effect">
                                                <i class="fad fa-store"></i>
                                                <span key="t-ecommerce">Ecommerce</span>
                                            </a>
                                            <ul class="sub-menu mm-collapse {  " aria-expanded="false">
                                                <li class>
                                                    <a href="{{ route('product') }}" aria-current="page"
                                                        class="side-nav-link-ref   " key="t-products">List Product</a>
                                                </li>
                                                <li class>
                                                    <a href="{{ route('aorder') }}" aria-current="page"
                                                        class="side-nav-link-ref   " key="t-products">List Order</a>
                                                </li>
                                                <li class>
                                                    <a href="{{ route('customer') }}" aria-current="page"
                                                        class="side-nav-link-ref   " key="t-products">List
                                                        Customer</a>
                                                </li>
                                                <li class>
                                                    <a href="{{ route('product.create') }}" aria-current="page"
                                                        class="side-nav-link-ref  " key="t-products">Add Product</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class>
                                            <a class="has-arrow waves-effect">
                                                <i class="fad fa-tags"></i>
                                                <span key="t-ecommerce">Categories</span>
                                            </a>
                                            <ul class="sub-menu mm-collapse " aria-expanded="false">
                                                <li class=>
                                                    <a href="{{ route('category') }}" aria-current="page"
                                                        class="side-nav-link-ref    " key="t-products">
                                                        List Category
                                                    </a>
                                                </li>
                                                <li class=>
                                                    <a href="{{ route('attribut') }}" aria-current="page"
                                                        class="side-nav-link-ref    " key="t-products">List Attribut
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class>
                                            <a class="has-arrow waves-effect">
                                                <i class="fad fa-address-book"></i>
                                                <span key="t-ecommerce">Contacts</span>
                                            </a>
                                            <ul class="sub-menu mm-collapse " aria-expanded="false">
                                                <li class=>
                                                    <a href="{{ route('profile', [Auth::user()->profile->id]) }}"
                                                        aria-current="page" class="side-nav-link-ref    "
                                                        key="t-products">
                                                        Profile
                                                    </a>
                                                </li>
                                                <li class=>
                                                    <a href="{{ route('user') }}" aria-current="page"
                                                        class="side-nav-link-ref   " key="t-products">Users</a>
                                                </li>
                                                <li class=>
                                                    <a href="{{ route('admins') }}" aria-current="page"
                                                        class="side-nav-link-ref   " key="t-products">Admins</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-title" key="t-pages">Pages</li>
                                        {{-- <li class=""><a class="waves-effect"><span
                                                    class="badge rounded-pill bg-success float-end"
                                                    key="t-new">New</span> <i class="bx bx-user-circle"></i> <span
                                                    key="t-authentication">Authentication</span></a>
                                            <ul class="sub-menu mm-collapse " aria-expanded="false">
                                                <li><a href="/auth-login" class="side-nav-link-ref"
                                                        key="t-login">Login</a></li>
                                                <li><a href="/auth-login-2" class="side-nav-link-ref"
                                                        key="t-login-2">Login 2</a></li>
                                                <li><a href="/auth-register" class="side-nav-link-ref"
                                                        key="t-register">Register</a></li>
                                                <li><a href="/auth-register-2" class="side-nav-link-ref"
                                                        key="t-register-2">Register 2</a></li>
                                                <li><a href="/auth-recoverpw" class="side-nav-link-ref"
                                                        key="t-recover-password">Recover Password</a></li>
                                                <li><a href="/auth-recoverpw-2" class="side-nav-link-ref"
                                                        key="t-recover-password-2">Recover Password 2</a></li>
                                                <li><a href="/auth-lock-screen" class="side-nav-link-ref"
                                                        key="t-lock-screen">Lock screen</a></li>
                                                <li><a href="/auth-lock-screen-2" class="side-nav-link-ref"
                                                        key="t-lock-screen-2">Lock screen 2</a></li>
                                                <li><a href="/auth-confirm-mail" class="side-nav-link-ref"
                                                        key="t-confirm-mail">Confirm Mail</a></li>
                                                <li><a href="/auth-confirm-mail-2" class="side-nav-link-ref"
                                                        key="t-confirm-mail-2">Confirm Mail 2</a></li>
                                                <li><a href="/auth-email-verification" class="side-nav-link-ref"
                                                        key="t-email-verification">Email verification</a></li>
                                                <li><a href="/auth-email-verification-2" class="side-nav-link-ref"
                                                        key="t-email-verification-2">Email verification 2</a></li>
                                                <li><a href="/auth-two-step-verification"
                                                        key="t-two-step-verification">Two step verification</a></li>
                                                <li><a href="/auth-two-step-verification-2"
                                                        key="t-two-step-verification-2">Two step verification 2</a></li>
                                            </ul>
                                        </li> --}}
                                        <li class=""><a class="has-arrow waves-effect"><i
                                                    class="fad fa-info-circle"></i> <span
                                                    key="t-utility">Helpe</span></a>
                                            <ul class="sub-menu mm-collapse " aria-expanded="false">
                                                <li><a href="/pages-starter" class="side-nav-link-ref"
                                                        key="t-starter-page">About Page</a></li>
                                                <li><a href="/pages-maintenance" class="side-nav-link-ref"
                                                        key="t-maintenance">Compte</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 1360px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar simplebar-visible"
                    style="height: 85px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </div>
    </div>
    <!-- end menu -->
    <!-- start section info -->
    <div class="main-content info" id="maincontent">
        <div class="page-content ">
            @yield('content')
        </div>
    </div>

    <!-- end section info  -->

    <!-- start footer-->
    <footer class="footer">
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

    <!-- javaScript Bootstrap V-5 -->
    <!-- javaScript jQuery V-3 -->
    {{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
    <!-- javaScript index -->
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/js/index.js') }}"></script> --}}

    @yield('javaScript')
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/index.js') }}"></script>
    <script src="{{ asset('js/app1.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    <script src="{{ asset('assets/admin/js/notification.js') }}"></script>

    @if (Request::is('admin/ecommerce/products*'))
        <script src="{{ asset('assets/admin/js/product.js') }}"></script>
    @endif

    @if (Request::is('admin/category*'))
        <script src="{{ asset('assets/admin/js/category.js') }}"></script>
    @endif
</body>

</html>
