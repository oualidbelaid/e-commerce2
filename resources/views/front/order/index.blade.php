@extends('front/includes/layout.app')
@section('title', 'commande')
@section('content')

    <div class="container-fluid" data-select2-id="12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Checkout</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="checkout-tabs" data-select2-id="11">
            <div class="row">
                <div class="col-xl-2 col-sm-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping"
                            role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                            <i class="far fa-truck d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Shipping Info</p>
                        </a>
                        <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment"
                            role="tab" aria-controls="v-pills-payment" aria-selected="false">
                            <i class="far fa-money-bill d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Payment Info</p>
                        </a>
                        <a class="nav-link" id="v-pills-confir-tab" data-bs-toggle="pill" href="#v-pills-confir"
                            role="tab" aria-controls="v-pills-confir" aria-selected="false">
                            <i class="far fa-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Confirmation</p>
                        </a>
                    </div>
                </div>
                <div class="col-xl-10 col-sm-9">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <form action="{{ route('order_store') }} " method="GET">
                        <div class="card">
                            <div class="card-body">

                                <div class="tab-content" id="v-pills-tabContent" data-select2-id="v-pills-tabContent">
                                    <div class="tab-pane fade active show" id="v-pills-shipping" role="tabpanel"
                                        aria-labelledby="v-pills-shipping-tab" data-select2-id="v-pills-shipping">
                                        <div data-select2-id="10">
                                            <h4 class="card-title">Shipping information</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                            <div data-select2-id="9">
                                                <div class="form-group row mb-4">
                                                    <label for="billing-name" class="col-md-2 col-form-label">Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control"
                                                            value="{{ Auth::user() != null ? Auth::user()->name : '' }}"
                                                            name="name" id="billing-name" placeholder="Enter your name">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label for="billing-phone" class="col-md-2 col-form-label">Phone</label>
                                                    <div class="col-md-10">
                                                        <input type="number" class="form-control"
                                                            value="{{ Auth::user() != null ? Auth::user()->profile->phone : '' }}"
                                                            name="phone" id="billing-phone"
                                                            placeholder="Enter your Phone no.">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label for="billing-address"
                                                        class="col-md-2 col-form-label">Address</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="address" id="billing-address" rows="3" placeholder="Enter full address">{{ Auth::user() != null ? Auth::user()->profile->address : '' }}</textarea>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group row mb-4">
                                                    <label for="billing-phone"
                                                        class="col-md-2 col-form-label">Country</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control"
                                                            value="{{ Auth::user() != null ? Auth::user()->profile->country : '' }}"
                                                            name="country" id="billing-country"
                                                            placeholder="Enter your Country no.">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label for="billing-phone"
                                                        class="col-md-2 col-form-label">States</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control"
                                                            value="{{ Auth::user() != null ? Auth::user()->profile->state : '' }}"
                                                            name="state" id="billing-states"
                                                            placeholder="Enter your States no.">
                                                    </div>
                                                </div> --}}
                                                <div class="form-group row mb-0">
                                                    <label for="example-textarea" class="col-md-2 col-form-label">Order
                                                        Notes:</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="order_notes" id="example-textarea" rows="3"
                                                            placeholder="Write some note.."></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-check p-2" style="float: right">
                                                    <input class="form-check-input" type="checkbox" name="register"
                                                        value="true" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Register The Info
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                                        aria-labelledby="v-pills-payment-tab">
                                        <div>
                                            <h4 class="card-title">Payment information</h4>
                                            <p class="card-title-desc">Fill all information below</p>

                                            <div>
                                                <div class="form-check form-check-inline font-size-16">
                                                    <input class="form-check-input" type="radio" name="payment_option"
                                                        id="paymentoptionsRadio1" checked="" value="credit">
                                                    <label class="form-check-label font-size-13"
                                                        for="paymentoptionsRadio1"><i
                                                            class="fab fa-cc-mastercard me-1 font-size-20 align-top text-info"></i>
                                                        Credit / Debit Card</label>
                                                </div>
                                                {{-- <div class="form-check form-check-inline font-size-16">
                                                    <input class="form-check-input" type="radio" name="payment_option"
                                                        id="paymentoptionsRadio2" value="paypal">
                                                    <label class="form-check-label font-size-13"
                                                        for="paymentoptionsRadio2"><i
                                                            class="fab fa-cc-paypal me-1 font-size-20 align-top"></i>
                                                        Paypal</label>
                                                </div> --}}
                                                <div class="form-check form-check-inline font-size-16">
                                                    <input class="form-check-input" type="radio" name="payment_option"
                                                        id="paymentoptionsRadio2" value="baridimob">
                                                    <label class="form-check-label font-size-13"
                                                        for="paymentoptionsRadio2">
                                                        <img class="far fa-money-bill-alt me-1 font-size-20 align-top"
                                                            src="{{ asset('assets/images/Logo_mob.png') }} "
                                                            alt="" style="width: 30px;">
                                                        BaridiMob</label>
                                                </div>
                                                <div class="form-check form-check-inline font-size-16">
                                                    <input class="form-check-input" type="radio" name="payment_option"
                                                        id="paymentoptionsRadio3" value="cash">
                                                    <label class="form-check-label font-size-13"
                                                        for="paymentoptionsRadio3"><i
                                                            class="far fa-money-bill-alt me-1 font-size-20 align-top text-success"></i>
                                                        Cash on Delivery</label>
                                                </div>

                                            </div>

                                            <h5 class="mt-5 mb-3 font-size-15">For card Payment</h5>
                                            <div class="p-4 border">
                                                <div class="form-group mb-0">
                                                    <label for="cardnumberInput">Card Number</label>
                                                    <input type="text" class="form-control" id="cardnumberInput"
                                                        placeholder="0000 0000 0000 0000">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group mt-4 mb-0">
                                                            <label for="cardnameInput">Name on card</label>
                                                            <input type="text" class="form-control" id="cardnameInput"
                                                                placeholder="Name on Card">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group mt-4 mb-0">
                                                            <label for="expirydateInput">Expiry date</label>
                                                            <input type="text" class="form-control"
                                                                id="expirydateInput" placeholder="MM/YY">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group mt-4 mb-0">
                                                            <label for="cvvcodeInput">CVV Code</label>
                                                            <input type="text" class="form-control" id="cvvcodeInput"
                                                                placeholder="Enter CVV Code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-confir" role="tabpanel"
                                        aria-labelledby="v-pills-confir-tab">
                                        <div class="card shadow-none border mb-0">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Order Summary</h4>

                                                <div class="table-responsive">
                                                    <table class="table align-middle mb-0 table-nowrap">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Product</th>
                                                                <th scope="col">Product Desc</th>
                                                                <th scope="col">Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($cart != null && count($cart->cartlines) > 0)
                                                                @foreach ($cart->cartlines as $item)
                                                                    @php
                                                                        $photos = explode('&&', $item->product->photo);
                                                                    @endphp
                                                                    <tr id="{{ $item->id }}">
                                                                        <th scope="row"><img
                                                                                src="{{ URL::asset($photos[0]) }}"
                                                                                alt="product-img" title="product-img"
                                                                                class="avatar-md"></th>
                                                                        <td>
                                                                            <h5 class="font-size-14 text-truncate"><a
                                                                                    href="javascript: void(0);"
                                                                                    class="text-dark">{{ $item->product->name }}
                                                                                </a></h5>
                                                                            <p class="text-muted mb-0">
                                                                                {{ $item->product->price . 'x' . $item->quantity }}
                                                                                DA
                                                                                @if ($item->promotion_value > 0)
                                                                                    <span
                                                                                        class="text-danger">-{{ $item->promotion_value }}
                                                                                        <i
                                                                                            class="fal fa-badge-percent font-size-14 "></i></span>
                                                                                @endif
                                                                            </p>
                                                                        </td>
                                                                        <td>{{ $item->product->price - ($item->promotion_value * $item->product->price) / 100 }}
                                                                            DA</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif

                                                            <tr>
                                                                <td colspan="2">
                                                                    <h6 class="m-0 text-end">Sub Total:</h6>
                                                                </td>
                                                                <td>
                                                                    {{ $cart->total }} DA
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <div class="bg-primary bg-soft p-3 rounded">
                                                                        <h5 class="font-size-14 text-primary mb-0"><i
                                                                                class="fas fa-shipping-fast me-2"></i>
                                                                            Shipping <span class="float-end">Free</span>
                                                                        </h5>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <h6 class="m-0 text-end">Total:</h6>
                                                                </td>
                                                                <td>
                                                                    {{ $cart->total }} DA
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <a href="javascript: void(0);" class="btn text-muted d-none d-sm-inline-block btn-link">
                                    <i class="mdi mdi-arrow-left me-1"></i> Back to Shopping Cart </a>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">
                                        <i class="mdi mdi-truck-fast me-1"></i> Proceed to Shipping </button>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </form>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>

@endsection
