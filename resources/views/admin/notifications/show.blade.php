@extends('admin/includes/layout.app')
@section('title', 'notification')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Read Notification</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('notification') }} ">Notifications</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="">Read Notification</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="email-rightbar mb-3">
                    <div class="card" style="">
                        <div class="btn-toolbar p-3" role="toolbar">
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button class="waves-light waves-effect btn btn-primary" value="" style="">
                                    <i class="fa fa-inbox"> </i>
                                </button>
                                <button class="waves-light waves-effect btn btn-primary" value="" style="">
                                    <i class="fa fa-exclamation-circle"></i>
                                </button>
                                <a href="{{ route('notification.destroy', [$notification->id]) }} "
                                    class="waves-light waves-effect btn btn-primary" value="" style=""><i
                                        class="far fa-trash-alt"></i>
                                </a>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <div class="dropdown"><button type="button" aria-expanded="false"
                                        class="btn btn-primary"><i class="fa fa-folder"></i> <i
                                            class="mdi mdi-chevron-down ms-1"></i></button>
                                    <div class="dropdown-menu"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(673px, 192px, 0px);"
                                        data-popper-placement="bottom-start"><button type="button"
                                            class="dropdown-item">Updates</button> <button type="button"
                                            class="dropdown-item">Social</button> <button type="button"
                                            class="dropdown-item">Team Manage</button></div>
                                </div>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <div class="dropdown"><button type="button" aria-expanded="false"
                                        class="btn btn-primary"><i class="fa fa-tag"></i> <i
                                            class="mdi mdi-chevron-down ms-1"></i></button>
                                    <div class="dropdown-menu"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(740px, 192px, 0px);"
                                        data-popper-placement="bottom-start"><button type="button"
                                            class="dropdown-item">Updates</button> <button type="button"
                                            class="dropdown-item">Social</button> <button type="button"
                                            class="dropdown-item">Team Manage</button></div>
                                </div>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <div class="dropdown"><button type="button" aria-expanded="false"
                                        class="btn btn-primary">More <i class="mdi mdi-dots-vertical ms-2"></i></button>
                                    <div class="dropdown-menu"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(808px, 192px, 0px);"
                                        data-popper-placement="bottom-start"><button type="button"
                                            class="dropdown-item">Mark as Unread</button> <button type="button"
                                            class="dropdown-item">Mark as Important</button> <button type="button"
                                            class="dropdown-item">Add to Tasks</button> <button type="button"
                                            class="dropdown-item">Add Star</button> <button type="button"
                                            class="dropdown-item">Mute</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex mb-4">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs"><span
                                            class="avatar-title rounded-circle ">{{ $notification->data['user']['name'][0] }}</span>
                                    </div>
                                    {{-- <img class="rounded-circle avatar-sm" src="/assets/images/users/avatar-2.jpg" alt="Card 1"> --}}
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-14 mt-1">{{ $notification->data['user']['name'] }}</h5>
                                    <small class="text-muted">{{ $notification->data['user']['email'] }}</small>
                                </div>
                            </div>
                            <h4 class="font-size-16">{{ $notification->data['action'] }}</h4>
                            @php
                                echo $notification->data['message'];
                            @endphp
                            <p>Sincerly,</p>
                            <hr>
                            <div class="row">
                                @php
                                    if (isset($notification->data['message2'])) {
                                        echo $notification->data['message2'];
                                    }
                                @endphp
                            </div>
                            <a href="/#" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i>
                                Reply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
