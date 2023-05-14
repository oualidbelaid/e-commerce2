@extends('admin/includes/layout.app')
@section('title', 'orders')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Orders</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2 row">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative"><input type="text" class="form-control"
                                            placeholder="Search...">
                                        <i class="fal fa-search search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end"><button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"> <i
                                            class="fal fa-plus  me-1"></i>Add New Order</button></div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">Order ID</th>
                                        <th class="align-middle">Billing Name</th>
                                        <th class="align-middle">Date</th>
                                        <th class="align-middle">Total</th>
                                        <th class="align-middle">Order Status</th>
                                        <th class="align-middle">Payment Method</th>
                                        <th class="align-middle">View Details</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $key=> $item)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="orderidcheck{{ $key }}">
                                                    <label class="form-check-label"
                                                        for="orderidcheck{{ $key }}"></label>
                                                </div>
                                            </td>
                                            <td><a href="javascript: void(0);"
                                                    class="text-body fw-bold">#SK{{ $item->id }}</a> </td>
                                            <td>{{ ucfirst($item->name) }}</td>
                                            <td>
                                                {{ $item->created_at->format(' d M ,Y ') }}
                                            </td>
                                            <td>
                                                {{ $item->total }} DA
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-pill badge-soft-success font-size-12
                                                    {{ $item->order_status == 'order reviews' ? 'badge-soft-warning' : '' }}
                                                    {{ $item->order_status == 'shipped' ? 'badge-soft-info' : '' }}
                                                    ">{{ ucfirst($item->order_status) }}</span>
                                            </td>
                                            <td>
                                                @if ($item->payment_option == 'credit')
                                                    <i class="fab fa-cc-mastercard me-1 text-info"></i> Mastercard
                                                @endif
                                                @if ($item->payment_option == 'baridimob')
                                                    <img class="far fa-money-bill-alt me-1 font-size-20 align-top"
                                                        src="{{ asset('assets/images/Logo_mob.png') }} " alt=""
                                                        style="width: 25px;height: 25px;">BaridiMob
                                                @endif
                                                @if ($item->payment_option == 'cash')
                                                    <i class="fas fa-money-bill-alt me-1 text-success"></i> COD
                                                @endif
                                            </td>
                                            <td><button type="button"
                                                    class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".transaction-detailModal{{ $key }}">
                                                    View Details
                                                </button></td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="javascript:void(0);" class="text-success">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop text-success"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fad fa-edit font-size-15"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                                                <li><a href="{{ route('aorder.update', [$item->id, 'order_status=order reviews']) }} "
                                                                        class="dropdown-item text-warning">
                                                                        <i class="fad fa-shipping-timed "></i>
                                                                        Order Reviews
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('aorder.update', [$item->id, 'order_status=shipped']) }}"
                                                                        class="dropdown-item text-info hover-overlay hover-zoom hover-shadow ripple">
                                                                        <i class="fad fa-shipping-fast  "></i>
                                                                        Shipped
                                                                    </a>
                                                                </li>
                                                                <li><a href="{{ route('aorder.update', [$item->id, 'order_status=delivered']) }}"
                                                                        class="dropdown-item text-success">
                                                                        <i class="fad fa-hand-holding-box "></i>
                                                                        Delivered
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('aorder.destroy', [$item->id]) }} "
                                                        class="text-danger">
                                                        <i class="fad fa-trash-alt font-size-15"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <ul id="more_product" class="pagination pagination-rounded justify-content-end mb-2">
                            <li
                                class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'disabled' : '' }}">
                                <a class="page-link"
                                    href="{{ url()->current() . '?page=' . request()->get('page') - 1 }}"
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
                            @for ($i = 2; $i <= $nbr_or + 1; $i++)
                                <li
                                    class="page-item  {{ request()->get('page') == $i ? 'active' : '' }} {{ $i == 1 ? 'active' : '' }}">
                                    <a class="page-link" href="?page={{ $i }}">{{ $i }}
                                    </a>
                                </li>
                            @endfor
                            <li
                                class="page-item {{ $nbr_or < 1 || request()->get('page') >= $nbr_or ? 'disabled' : '' }}">
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
        <!-- end row -->
        {{-- model --}}
        @forelse ($orders as $key=> $or)
            <div class="modal fade transaction-detailModal{{ $key }}" tabindex="-1"
                aria-labelledby="transaction-detailModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-2">Product id: <span
                                            class="text-primary">#SK{{ $or->id }}</span></p>
                                    <p class="mb-2">Billing Name: <span class="text-primary">{{ $or->name }}</span>
                                    </p>
                                    <p class="mb-2">Phone: <span class="text-primary">{{ $or->phone }}</span>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="mb-2">Adress: <span class="text-primary">{{ $or->address }}</span>
                                    </p>
                                    {{-- <p class="mb-2">Country: <span
                                            class="text-primary">{{ $or->country }}</span>
                                    </p>
                                    <p class="mb-2">State: <span
                                            class="text-primary">{{ $or->state }}</span>
                                    </p> --}}
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($or->orderlines as $item)
                                            @php
                                                $photos = explode('&&', $item->product->photo);
                                            @endphp

                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="{{ URL::asset($photos[0]) }}" alt=""
                                                            class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14" style="width: 100px;">
                                                            {{ $item->product->name }}</h5>
                                                        <p class="text-muted mb-0">
                                                            {{ $item->product->price . 'x' . $item->quantity }}
                                                            @if ($item->promotion_value > 0)
                                                                <span class="text-danger">-{{ $item->promotion_value }}
                                                                    <i
                                                                        class="fal fa-badge-percent font-size-14 "></i></span>
                                                            @endif


                                                        </p>
                                                    </div>
                                                </td>
                                                <td> {{ $item->product->price - ($item->promotion_value * $item->product->price) / 100 }}
                                                    DA</td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                            </td>
                                            <td>
                                                {{ $or->total }} DA
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Shipping:</h6>
                                            </td>
                                            <td>
                                                Free
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Total:</h6>
                                            </td>
                                            <td>
                                                {{ $or->total }} DA
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        @empty
        @endforelse
    </div>
@endsection
