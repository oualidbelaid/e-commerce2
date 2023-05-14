@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="overflow-hidden card" style="">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Reset Password</h5>
                                        <p>Re-Password with Skote.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end"><img src=" {{ asset('images/profile-img.png') }} "
                                        alt="" class="img-fluid"></div>
                            </div>
                        </div>
                        <div class="pt-0 card-body">
                            <div><a href="/dashboard">
                                    <div class="avatar-md profile-user-wid mb-4"><span
                                            class="avatar-title rounded-circle bg-light"><img
                                                src="{{ asset('images/logo.svg') }} " alt="" class="rounded-circle"
                                                height="34"></span></div>
                                </a></div>
                            <div class="p-2">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}" class="form-horizontal">
                                    @csrf
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
                                    <div class="text-end"><button type="submit"
                                            class="w-md waves-effect waves-light btn btn-primary" value=""
                                            style="">{{ __('Send Password Reset Link') }}</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="{{ route('login') }} " class="fw-medium text-primary">
                                Sign In here
                            </a> </p>
                        <p>© 2022 Skote. by Oualid_belaid</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
