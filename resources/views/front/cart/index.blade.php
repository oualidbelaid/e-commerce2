@extends('front/includes/layout.app')
@section('title', 'cart')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Cart</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Ecommerce</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Cart</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div lx="8" class="col">
                <div class="card" style="">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-nowrap table cart">
                                <thead class="thead-light ">
                                    <tr>
                                        <th>Product</th>
                                        <th>Product Desc</th>
                                        <th>Price (DA)</th>
                                        <th>Quantity</th>
                                        <th colspan="2">Total (DA)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($cart != null && count($cart->cartlines) > 0)
                                        @foreach ($cart->cartlines as $item)
                                            @php
                                                $photos = explode('&&', $item->product->photo);
                                            @endphp
                                            <tr id="{{ $item->id }}">
                                                <td><img src="{{ URL::asset($photos[0]) }}" class="avatar-md"></td>
                                                <td>
                                                    <h5 class="font-size-14 text-truncate" style="max-width: 170px;">
                                                        <a class="text-dark">{{ $item->product->name }}</a>
                                                    </h5>
                                                    @if ($item->promotion_value > 0)
                                                        <p class="mb-0 text-danger">-{{ $item->promotion_value }} <i
                                                                class="fal fa-badge-percent font-size-14"></i></p>
                                                    @endif

                                                </td>
                                                <td class="product_price">
                                                    {{ $item->product->price - ($item->promotion_value * $item->product->price) / 100 }}
                                                </td>
                                                <td>
                                                    <div style="width: 100px;">
                                                        <div class="input-group">
                                                            <button class="btn btn-primary">+</button><input
                                                                class="form-control p-1" type="text"
                                                                value="{{ $item->quantity }}"><button
                                                                class="btn btn-primary">-</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="total" style="min-width: 68px;">
                                                    {{ ($item->product->price - ($item->promotion_value * $item->product->price) / 100) * $item->quantity }}
                                                </td>
                                                <td><button class="btn action-icon text-danger"><i
                                                            class="fad fa-trash-alt font-size-13"></i></button></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 row">
                            <div class="col-sm-6"><a href="{{ route('home') }} " class="btn btn-secondary"><i
                                        class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a></div>
                            <div class="col-sm-6">
                                <div class="text-sm-end mt-2 mt-sm-0"><a href="{{ route('order') }} "
                                        class="btn btn-success"><i class="mdi mdi-cart-arrow-right me-1"></i>
                                        Checkout </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                {{-- <div class="card" style="">
                    <div class="card-body">
                        <h5 class="mb-4 h5 card-title">Card Details</h5>
                        <div class="card bg-primary text-white visa-card mb-0">
                            <div class="card-body">
                                <div><i class="bx bxl-visa visa-pattern"></i>

                                    <div class="float-end"><i class="fab fa-cc-visa display-3"></i></div>

                                    <div><i class="bx bx-chip h1 text-warning"></i></div>
                                </div>
                                <div class="mt-5 row">
                                    <div class="col-4">
                                        <p><i class="fas fa-star-of-life m-1"></i>
                                            <i class="fas fa-star-of-life m-1"></i>
                                            <i class="fas fa-star-of-life m-1"></i>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p><i class="fas fa-star-of-life m-1"></i>
                                            <i class="fas fa-star-of-life m-1"></i>
                                            <i class="fas fa-star-of-life m-1"></i>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p><i class="fas fa-star-of-life m-1"></i>
                                            <i class="fas fa-star-of-life m-1"></i>
                                            <i class="fas fa-star-of-life m-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <h5 class="text-white float-end mb-0">12/22</h5>
                                    <h5 class="text-white mb-0">Fredrick Taylor</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="mb-3 h4 card-title">Order Summary</h5>
                        <div class="table-responsive">
                            <table class="table mb-0 table order">
                                <tbody>
                                    <tr>
                                        <td>Grand Total :</td>
                                        <td> {{ $cart->total }} DA</td>
                                    </tr>
                                    <tr>
                                        <td>Discount :</td>
                                        <td>0 DA</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge :</td>
                                        <td>0 DA</td>
                                    </tr>
                                    <tr>
                                        <td>Estimated Tax :</td>
                                        <td>0 DA</td>
                                    </tr>
                                    <tr>
                                        <th>Total :</th>
                                        <td>{{ $cart->total }} DA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
