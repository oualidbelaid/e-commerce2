@extends('front/includes/layout.app')
@section('title', 'profile')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Profile</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Contacts</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Profile</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container rounded bg-white mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div class="prfl">
                            <img class="rounded-circle mt-5" width="150px"
                                src="{{ asset('assets/images/user-profile.jpg') }}">

                            @if ($profile->user->is_admin)
                                <span class="admin">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </span>
                            @endif
                        </div>
                        <span class="font-weight-bold">{{ $profile->user->name . '.' . $profile->surname }}</span>
                        <span class="text-black-50">{{ $profile->user->email }}
                            {{-- verify email --}}
                            {{-- @if (Auth::id() == $profile->user_id)
                                @if ($profile->user->email_verified_at != null)
                                    <i class="fa-solid fa-circle-check text-success font-size-15"></i>
                                @else
                                    <a href="{{ route('verification.notice') }}">
                                        <i class="fa-solid fa-circle-exclamation text-danger font-size-15"></i>
                                    </a>
                                @endif
                            @endif --}}
                        </span>
                    </div>
                </div>
                <div class="col-md-7 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="h_title m-0 p-0 text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label>
                                <span class="form-control">{{ $profile->user->name }}</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Phone</label>
                                <span class="form-control">+213
                                    {{ $profile->phone == '' ? 'phone' : $profile->phone }}</span>
                            </div>
                            <div class="col-md-12"><label class="labels">Address</label>
                                <span
                                    class="form-control">{{ $profile->address == '' ? 'Address' : $profile->address }}</span>
                            </div>
                            <div class="col-md-12"><label class="labels">Country</label>
                                <span
                                    class="form-control">{{ $profile->country == '' ? 'country' : $profile->country }}</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">State/Region</label>
                                <span
                                    class="form-control">{{ $profile->state == '' ? 'State/Region' : $profile->state }}</span>
                            </div>
                        </div>
                        @if (Auth::id() == $profile->user_id)
                            <div class="mt-5 text-center">
                                <a href="{{ route('fprofile.edit', [$profile->user->id]) }}">
                                    <button class="btn btn-primary  " type="button">
                                        Edite Profile
                                    </button>
                                </a>

                            </div>
                        @endif

                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                                Experience</span><span class="border px-3 p-1 add-experience"><i
                                    class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                        <div class="col-md-12"><label class="labels">Experience in Designing</label>
                            <input type="text" class="form-control" placeholder="experience" value="">
                        </div> <br>
                        <div class="col-md-12"><label class="labels">Additional Details</label>
                            <input type="text" class="form-control" placeholder="additional details" value="">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
