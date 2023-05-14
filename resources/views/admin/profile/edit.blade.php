@extends('admin/includes/layout.app')
@section('title', 'edit profile')
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
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                            width="150px" src="{{ asset('assets/images/user-profile.jpg') }}"><span
                            class="font-weight-bold">{{ $profile->user->name }}</span><span
                            class="text-black-50">{{ $profile->user->email }}</span><span>
                        </span></div>
                </div>

                <div class="col-md-5 border-right">
                    <form action="{{ route('profile.update', [$profile->id]) }} " method="POST">
                        @csrf
                        @method('post')
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="h_title m-0 p-0 text-right">Edit Profile</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Name</label><input type="text"
                                        class="form-control" name="name" placeholder="first name"
                                        value="{{ $profile->user->name }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Phone</label><input type="text"
                                        class="form-control" placeholder="enter phone number" name="phone"
                                        value="{{ $profile->phone == '' ? '' : $profile->phone }}"></div>
                                <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                        class="form-control" name="address" placeholder="address"
                                        value="{{ $profile->address == '' ? '' : $profile->address }}"></div>

                                <div class="col-md-12"><label class="labels">Email </label><input type="text"
                                        class="form-control" name="email" placeholder="email "
                                        value="{{ $profile->user->email }}"></div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                        class="form-control" name="country" placeholder="country"
                                        value="{{ $profile->country == '' ? '' : $profile->country }}"></div>
                                <div class="col-md-6"><label class="labels">State/Region</label><input
                                        type="text" class="form-control" name="state"
                                        value="{{ $profile->state == '' ? '' : $profile->state }}" placeholder="state">
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary " type="submit">
                                    Save Change
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    {{-- <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Experience</span><span class="border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input
                            type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                            class="form-control" placeholder="additional details" value=""></div>
                </div> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
