<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Styles local -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bandel.css') }}">
</head>

<body data-layout-size="fluid" data-sidebar="dark" data-sidebar-size="large" data-topbar="light"
    data-layout-scrollable="false" class="" style="">
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 fw-medium">
                            5
                            <i class="far fa-cog bx-spin text-primary display-3"></i>
                            0
                        </h1>
                        <h4 class="text-uppercase">
                            INTERNAL SERVER ERROR
                        </h4>
                        <div class="mt-5 text-center">
                            <a href="  {{ Request::is('admin*') ? route('admin') : route('home') }} "
                                class="btn btn-primary">Back to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="justify-content-center row">
                <div class="col-md-8 col-xl-6">
                    <div>
                        <img src="{{ asset('assets/images/error-img.png') }}" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg id="SvgjsSvg1169" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" style="
                overflow: hidden;
                top: -100%;
                left: -100%;
                position: absolute;
                opacity: 0;
            ">
        <defs id="SvgjsDefs1170"></defs>
        <polyline id="SvgjsPolyline1171" points="0,0"></polyline>
        <path id="SvgjsPath1172" d="M0 0 "></path>
    </svg>
</body>

</html>
