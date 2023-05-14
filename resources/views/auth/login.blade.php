@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="h4 mb-4 card-title">{{ __('Login') }}</h5>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-4 mb-3">
                                    <label class="col-sm-3 col-form-label form-label"
                                        for="email">{{ __('Email Address') }}</label>
                                    <div class="col-sm-9">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class=" row mb-4 mb-3"><label class="col-sm-3 col-form-label form-label"
                                        for="horizontal-password-Input">{{ __('Password') }}</label>
                                    <div class="col-sm-9"><input type="password" id="horizontal-password-Input"
                                            class="form-control form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="justify-content-end row">
                                    <div class="col-sm-9">
                                        <div class="form-check mb-4"><input type="checkbox" class="form-check-input"
                                                id="horizontal-customCheck" name="remember"
                                                {{ old('remember') ? 'checked' : '' }}> <label
                                                class="form-check-label form-label"
                                                for="horizontal-customCheck">{{ __('Remember Me') }}</label></div>
                                        <div><button type="submit" class="w-md btn btn-primary" value="" style="">
                                                {{ __('Login') }}</button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="account-pages ">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="overflow-hidden card" style="">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to Skote.</p>
                                        </div>
                                    </div>
                                    <div class="col col-5 align-self-end">
                                        <img src=" {{ asset('assets/images/profile-img.png') }} " alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="pt-0 card-body">
                                <div class="auth-logo">
                                    <a href="/" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo-light.svg" alt="" class="rounded-circle"
                                                    height="34">
                                            </span>
                                        </div>
                                    </a>
                                    <a href="/" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ asset('assets/images/icon_web.webp') }} " alt=""
                                                    class="rounded-circle" height="90%">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div class="form-horizontal">

                                        <div class="mb-3"><label class="form-label form-label"
                                                for="email">Email</label> <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Enter password" aria-label="Password"
                                                    aria-describedby="password-addon" value="">
                                                <button class="btn btn-light " type="button" id="password-addon">
                                                    <i class="fas fa-eye mdi mdi-eye-outline font-size-11"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                id="horizontal-customCheck" name="remember"
                                                {{ old('remember') ? 'checked' : '' }}> <label
                                                class="form-check-label form-label" for="horizontal-customCheck">Remember
                                                me</label>
                                        </div>
                                        <div class="mt-3 d-grid"><button
                                                class="btn btn-primary w-md waves-effect waves-light">Log In</button></div>
                                        <div class="mt-4 text-center">
                                            <h5 class="font-size-14 mb-3">Sign in with</h5>

                                            <ul class="list-inline">
                                                <li class="list-inline-item"><a href="#"
                                                        class="social-list-item bg-primary text-white border-primary">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a></li>
                                                <li class="list-inline-item"><a href="#"
                                                        class="social-list-item bg-info text-white border-info">
                                                        <i class="fab fa-twitter"></i>
                                                    </a></li>
                                                <li class="list-inline-item"><a href="#"
                                                        class="social-list-item bg-danger text-white border-danger">
                                                        <i class="fab fa-google"></i>
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="mt-4 text-center">
                                            @if (Route::has('password.request'))
                                                <a class="text-muted" href="{{ route('password.request') }}">
                                                    <i class="fad fa-lock-alt"></i>
                                                    {{ __('Forgot Your Password?') }}

                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Don't have an account ? <a href="{{ route('register') }} " class="fw-medium text-primary">
                                    Signup now </a> </p>
                            <p>© 2022 Skote. by Oualid_Belaid</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
