@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5 text-muted">
                        <a href="/dashboard" class="d-block auth-logo">
                            {{-- <img src="{{ asset('images/logo.svg') }}" alt="" height="20" class="auth-logo-dark mx-auto"> --}}
                            <img src="{{ asset('images/logo.svg') }}" alt="" height="20" class="auth-logo-light mx-auto">
                        </a>
                    </div>
                </div>
            </div>
            <div class="justify-content-center row">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="">
                        <div class="card-body">
                            <div class="p-2">
                                <div class="text-center">
                                    <div class="avatar-md mx-auto">
                                        <div class="avatar-title rounded-circle bg-light">
                                            <i class="fa-solid fa-envelope h1 mb-0 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <h4>Verify your email</h4>
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif
                                        <p>We have sent you verification email <span
                                                class="fw-semibold">{{ Auth::user()->email }}</span>
                                            , Please check it</p>
                                        <div class="mt-4">
                                            <form class="d-inline" method="POST"
                                                action="{{ route('verification.resend') }}">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-success w-md">{{ __('Verify email') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© 2022 Skote. by Oualid_belaid </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
