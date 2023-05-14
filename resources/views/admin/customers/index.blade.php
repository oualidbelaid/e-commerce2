@extends('admin/includes/layout.app')
@section('title', 'Customers')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Customers</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Ecommerce</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Customers</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card" style="">
                    <div class="card-body">
                        <div class="mb-2 row">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative"><input type="text" class="form-control"
                                            placeholder="Search...">
                                        <i class="fad fa-search  bx bx-search-alt search-icon font-size-15"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-8">
                                <div class="text-sm-end"><button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-plus me-1"></i> New Customers</button></div>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle table-nowrap table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Phone / Email</th>
                                        <th>Address</th>
                                        <th>Total Purchases </th>
                                        <th>Joining Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key => $item)
                                        @if (count($item->orders) > 0)
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <p class="mb-1">325-250-1106</p>
                                                    <p class="mb-0">{{ $item->email }}</p>
                                                </td>
                                                <td>2470 Grove Street Bethpage</td>

                                                <td>
                                                    @php
                                                        $sommetotal = 0;
                                                    @endphp
                                                    @foreach ($item->orders as $or)
                                                        @php
                                                            $sommetotal += $or->total;
                                                        @endphp
                                                    @endforeach
                                                    {{ $sommetotal . ' DA' }}
                                                </td>
                                                <td> {{ $item->created_at->format(' d  M , Y ') }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('user.show', [$item->name]) }} " type="button"
                                                        class="btn  btn-sm btn-rounded waves-effect waves-light">
                                                        <i class="fad fa-edit text-primary font-size-15"></i>
                                                    </a>
                                                    <button type="button"
                                                        class="btn btn-sm btn-rounded waves-effect waves-light">
                                                        <i class="fad fa-trash-alt text-danger font-size-15"></i>
                                                    </button> --}}
                                                    <button type="button"
                                                        class="btn btn-sm btn-rounded waves-effect waves-light">
                                                        <i class="fad fa-file-chart-line text-primary font-20"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <ul id="more_product" class="pagination pagination-rounded justify-content-end mb-2">
                            <li
                                class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ url()->current() . '?page=' . request()->get('page') - 1 }}"
                                    aria-label="Previous">
                                    <i class="fal fa-chevron-left"></i>
                                </a>
                            </li>
                            {{-- <li
                            class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'active' : '' }}">
                            <a class="page-link" href="{{  }}">1</a>
                        </li> --}}

                            <li
                                class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'active' : '' }}">
                                <a class="page-link" href="?page=1">1</a>
                            </li>
                            @for ($i = 2; $i <= $nbr_c + 1; $i++)
                                <li
                                    class="page-item  {{ request()->get('page') == $i ? 'active' : '' }} {{ $i == 1 ? 'active' : '' }}">
                                    <a class="page-link" href="?page={{ $i }}">{{ $i }}
                                    </a>
                                </li>
                            @endfor
                            <li class="page-item {{ $nbr_c < 1 || request()->get('page') >= $nbr_c ? 'disabled' : '' }}">
                                <a class="page-link"
                                    href="{{ request()->get('page') != 0 ? url()->current() . '?page=' . request()->get('page') + 1 : url()->current() . '?page=' . request()->get('page') + 2 }}"
                                    aria-label="Next">
                                    <i class="fal fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
