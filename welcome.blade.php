@php
use App\Object\Cartcookie;
$cart = new Cartcookie(Cookie::get('cartlines'));
@endphp
@extends('front/includes/layout.app')
@section('title', 'ecommerce')

@section('slide')
    <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
        {{-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div> --}}
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="{{ asset('slider/pexels-artem-malushenko-2249063.jpg') }}" class="d-block w-100" alt="...">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div> --}}
            </div>
            <div class="carousel-item active ">
                <img src="{{ asset('slider/pexels-min-an-694740.jpg') }} " class="d-block w-100" alt="...">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> --}}
            </div>
            <div class="carousel-item">
                <img src="{{ asset('slider/pexels-cottonbro-6344231.jpg') }}" class="d-block w-100" alt="...">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div> --}}
            </div>
            <div class="carousel-item ">
                <img src="{{ asset('slider/pexels-anna-tarazevich-8016913.jpg') }} " class="d-block w-100" alt="...">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> --}}
            </div>


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"
            style="position: absolute;top: 40%;width: 27px;height: 60px;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next"
            style="position: absolute;top: 40%;width: 27px;height: 60px;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        {{-- <div class="row ">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Products</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Ecommerce</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Products</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">



                        <h4 class="card-title mb-4">Filter</h4>

                        <div>
                            <h5 class="font-size-14 mb-3">Books</h5>
                            <ul class="list-unstyled product-list">
                                <li><a href="#"><i class="mdi mdi-chevron-right me-1"></i> Fictional</a></li>
                                <li><a href="#"><i class="mdi mdi-chevron-right me-1"></i> Scientific</a></li>
                                <li><a href="#"><i class="mdi mdi-chevron-right me-1"></i> Historical</a></li>
                                <li><a href="#"><i class="mdi mdi-chevron-right me-1"></i> Political</a></li>
                            </ul>
                        </div>
                        <form action="{{ route('fproduct.filtre') }}" method="get">
                            <div class="mt-4 pt-3">
                                <h5 class="font-size-14 mb-3">Price (DA)</h5>
                                <span class="irs irs--square js-irs-0 irs-with-grid">
                                    <span class="irs">
                                        <input type="text" id="pricerange" name="price">
                                    </span>

                            </div>

                            <div class="mt-4 pt-3">
                                <h5 class="font-size-14 mb-3">Discount</h5>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" id="productdiscountCheck1"
                                        name="prom">
                                    <label class="form-check-label" for="productdiscountCheck1">
                                        Less than 10%
                                    </label>
                                </div>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" id="productdiscountCheck2" value="10"
                                        name="prom">
                                    <label class="form-check-label" for="productdiscountCheck2">
                                        10% or more
                                    </label>
                                </div>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" id="productdiscountCheck3" value="20"
                                        name="prom">
                                    <label class="form-check-label" for="productdiscountCheck3">
                                        20% or more
                                    </label>
                                </div>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" id="productdiscountCheck4" value="30"
                                        name="prom">
                                    <label class="form-check-label" for="productdiscountCheck4">
                                        30% or more
                                    </label>
                                </div>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" id="productdiscountCheck5" value="40"
                                        name="prom">
                                    <label class="form-check-label" for="productdiscountCheck5">
                                        40% or more
                                    </label>
                                </div>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" id="productdiscountCheck6"
                                        value="50" name="prom">
                                    <label class="form-check-label" for="productdiscountCheck6">
                                        50% or more
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" id="productdiscountCheck6"
                                        value="60" name="prom">
                                    <label class="form-check-label" for="productdiscountCheck6">
                                        60% or more
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 pt-3">
                                <hr>
                                <div>
                                    <button type="submit" class="btn btn-success">Filtre</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
            <div class="col-lg-9">
                <div class="mb-3 row">
                    <div class="col-sm-6 col-xl-4">
                        <div class="mt-2">
                            <h5>Books</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-8">

                        <form class="mt-4 mt-sm-0 float-sm-end d-flex align-items-center"
                            action="{{ route('fproduct.search') }}" method="GET" role="search">
                            <div class="search-box me-2">
                                <div class="position-relative"><input class="form-control border-0 form-control"
                                        type="text" name="q" placeholder="Search..."
                                        value="{{ isset($key) ? $key : '' }}">
                                    <button type="submit" class="border-0">
                                        <i class="fal fa-search search-icon"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <div class="row">
                    @forelse ($products as $item)
                        @php
                            $photos = explode('&&', $item->photo);
                        @endphp
                        <div class="col-sm-4 col-xl-3 col-6 ">

                            <div class="card" style="">
                                <div class="hover_pr">
                                    <div class="btn-group-vertical">
                                        <a type="button" data-productid="{{ $item->id }}"
                                            class="btn {{ $cart->productExist($item->id) ? 'btn-success' : 'btn-outline-success' }} add_cart">
                                            <i class="fal fa-shopping-bag"></i>
                                        </a>
                                        <a type="button" data-productid="{{ $item->id }}"
                                            {{ Auth::user() == null ? "href=/favorite/favoriteline/store?product_id=$item->id&&login=1" : '' }}
                                            @if (Auth::user() != null) @forelse (Auth::user()->favorite->favoritelines as $fv)
                                                    @if ($fv->product->id == $item->id)
                                                    class="btn  btn-danger add_favorite"
                                                    @else @endif
                                            @empty @endforelse
                                        @else
                                            class="btn  btn-outline-danger add_favorite"
                    @endif class="btn  btn-outline-danger add_favorite">
                    <i class="fal fa-heart"></i>
                    </a>
                    <a href="{{ route('fproduct.show', [$item->id]) }}" type="button" class="btn btn-outline-info">
                        <i class="fal fa-eye"></i>
                    </a>
                </div>

            </div>
            <div class="card-body">

                <a href="{{ route('fproduct.show', [$item->id]) }}">
                    <div class="avatar-sm product-ribbon"
                        style="
                                                                        z-index: 1;">
                        @if ($item->promotion)
                            <span class="avatar-title rounded-circle  bg-primary">-{{ $item->promotion->value }}%</span>
                        @endif
                    </div>
                    <div class="product-img position-relative">

                        <img src="{{ URL::asset($photos[0]) }}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </a>
                <div class="mt-4 text-center">
                    <h5 class="mb-3 text-truncate"><a href="{{ route('fproduct.show', [$item->id]) }}"
                            class="text-dark">{{ $item->name }} </a></h5>
                    <div class="text-muted mb-3">
                        <div style="" class="svelte-g1srw1">
                            <span class="text-warning fas fa-star"></span>
                            <span class="text-warning fas fa-star"></span>
                            <span class="text-warning fas fa-star"></span>
                            <span class="text-warning fas fa-star"></span>
                        </div>
                    </div>
                    @if ($item->promotion)
                        <h5 class="my-0">
                            <span class="text-muted me-2">
                                <del>{{ $item->price }} DA</del>
                            </span>
                            <b>{{ $item->price - ($item->promotion->value * $item->price) / 100 }}
                                DA</b>
                        </h5>
                    @else
                        <h5 class="my-0">

                            <b>{{ $item->price }}DA</b>
                        </h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
        <div class="alert">

            <h5>product not found</h3>
        </div>
        @endforelse

        </div>
        <div class="row">
            <div class="col-lg-12">

                <ul id="more_product" class="pagination pagination-rounded justify-content-end mb-2">
                    <li class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ url()->current() . '?page=' . request()->get('page') - 1 }}"
                            aria-label="Previous">
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                    {{-- <li
                                class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'active' : '' }}">
                                <a class="page-link" href="{{  }}">1</a>
                            </li> --}}

                    <li class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'active' : '' }}">
                        <a class="page-link" href="?page=1">1</a>
                    </li>
                    @for ($i = 2; $i <= $nbr_pr + 1; $i++)
                        <li
                            class="page-item  {{ request()->get('page') == $i ? 'active' : '' }} {{ $i == 1 ? 'active' : '' }}">
                            <a class="page-link" href="?page={{ $i }}">{{ $i }}
                            </a>
                        </li>
                    @endfor
                    <li class="page-item {{ $nbr_pr < 1 || request()->get('page') >= $nbr_pr ? 'disabled' : '' }}">
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

    @endsection
