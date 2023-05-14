@extends('admin/includes/layout.app')
@section('title', 'notification')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Inbox</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">notifications</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Inbox</a></li>
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
                                <button type="button" class="btn btn-primary waves-light waves-effect">
                                    <i class="fa fa-inbox"></i>
                                </button>
                                <button type="button" class="btn btn-primary waves-light waves-effect">
                                    <i class="fa fa-exclamation-circle"></i>
                                </button>
                                <button type="button" id="delet_not" class="btn btn-primary waves-light waves-effect">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0"><button type="button"
                                    class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i>
                                    <i class="mdi mdi-chevron-down ms-1"></i></button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Updates</a>
                                    <a class="dropdown-item" href="#">Social</a>
                                    <a class="dropdown-item" href="#">Team Manage</a>
                                </div>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0"><button type="button"
                                    class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-tag"></i>
                                    <i class="mdi mdi-chevron-down ms-1"></i></button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Updates</a>
                                    <a class="dropdown-item" href="#">Social</a>
                                    <a class="dropdown-item" href="#">Team Manage</a>
                                </div>
                            </div>

                            <div class="btn-group me-2 mb-2 mb-sm-0"><button type="button"
                                    class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">More <i
                                        class="mdi mdi-dots-vertical ms-2"></i></button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Mark as Unread</a>
                                    <a class="dropdown-item" href="#">Mark as Important</a>
                                    <a class="dropdown-item" href="#">Add to Tasks</a>
                                    <a class="dropdown-item" href="#">Add Star</a>
                                    <a class="dropdown-item" href="#">Mute</a>
                                </div>
                            </div>
                        </div>
                        <ul class="message-list">
                            {{-- @foreach ($notifications as $not)
                                <li class="{{ $not->read_at == null ? 'unread' : '' }} ">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk19">
                                            <label for="chk19" class="toggle"></label>
                                        </div>
                                        <a href="{{ route('notification.show', [$not->id]) }} "
                                            class="title">{{ $not->data['user']['name'] }}
                                        </a>
                                        <span class="star-toggle text-warning bx bxs-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="{{ route('notification.show', [$not->id]) }}"
                                            class="subject">Hello – <span
                                                class="teaser">{{ $not->data['action'] }}
                                                {{ $not->data['product']['name'] }}</span></a>
                                        <div class="date">{{ $not->data['time'] }}</div>
                                    </div>
                                </li>
                            @endforeach --}}
                            {{-- <li>
                                <div class="col-mail col-mail-1">
                                    <div class="checkbox-wrapper-mail"><input type="checkbox" id="chk19">
                                        <label for="chk19" class="toggle"></label>
                                    </div> <a href="/#" class="title">Peter, me (3)</a><span
                                        class="star-toggle text-warning bx bxs-star"></span>
                                </div>
                                <div class="col-mail col-mail-2"><a href="/#" class="subject">Hello – <span
                                            class="teaser">Trip home from Colombo has been arranged, then Jenna
                                            will
                                            come get me from Stockholm. :</span></a>
                                    <div class="date">Mar 6</div>
                                </div>
                            </li> --}}
                        </ul>

                    </div>
                    <div class="row">
                        <div class="col-7"><span id="nbr_not">Showing 0 - 10 of ...</span> </div>
                        <div class="col-5">
                            <div class="btn-group float-end">
                                <button type="button" class="btn btn-sm btn-success waves-effect left">
                                    <i class="fa fa-chevron-left"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-success waves-effect right">
                                    <i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
