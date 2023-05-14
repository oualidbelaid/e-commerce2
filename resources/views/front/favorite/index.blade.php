@extends('front/includes/layout.app')
@section('title', 'favorite')


@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Favorite</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Favorite</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Products</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3 row">
                    <div class="col-sm-6 col-xl-4">
                        <div class="mt-2">
                            <h5>Products</h5>
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
                    @forelse ($favorite->favoritelines as $item)
                        @php
                            $photos = explode('&&', $item->product->photo);
                        @endphp
                        <div class="col-sm-4 col-xl-3 col-6 ">
                            <div class="card" style="">
                                <div class="hover_pr">
                                    <div class="btn-group-vertical">
                                        <a type="button" data-productid="{{ $item->product->id }} "
                                            class="btn btn-outline-success add_cart">
                                            <i class="fal fa-shopping-bag"></i>
                                        </a>
                                        <a type="button" data-productid="{{ $item->id }} "
                                            class="btn btn-danger add_favorite remove_favorite">
                                            <i class="fal fa-heart"></i>
                                        </a>
                                        <a href="{{ route('fproduct.show', [$item->product->id]) }}" type="button"
                                            class="btn btn-outline-info">
                                            <i class="fal fa-eye"></i>
                                        </a>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <a href="{{ route('fproduct.show', [$item->product->id]) }}">
                                        <div class="avatar-sm product-ribbon"
                                            style="
                                            z-index: 100;">
                                            @if ($item->promotion)
                                                <span
                                                    class="avatar-title rounded-circle  bg-primary">-{{ $item->promotion->value }}%</span>
                                            @endif
                                        </div>
                                        <div class="product-img position-relative">
                                            <img src="{{ URL::asset($photos[0]) }}" alt=""
                                                class="img-fluid mx-auto d-block">
                                        </div>
                                    </a>
                                    <div class="mt-4 text-center">
                                        <h5 class="mb-3 text-truncate"><a
                                                href="{{ route('fproduct.show', [$item->product->id]) }}"
                                                class="text-dark">{{ $item->product->name }} </a></h5>
                                        <div class="text-muted mb-3">
                                            <div style="" class="svelte-g1srw1">
                                                <span class="text-warning fas fa-star"></span>
                                                <span class="text-warning fas fa-star"></span>
                                                <span class="text-warning fas fa-star"></span>
                                                <span class="text-warning fas fa-star"></span>
                                            </div>
                                        </div>
                                        {{-- <h5 class="my-0">
                                            <span class="text-muted me-2"><del>4600DA</del> </span>
                                            <b>{{ $item->product->price }}DA</b>
                                        </h5> --}}
                                        @if ($item->product->promotion)
                                            <h5 class="my-0">
                                                <span class="text-muted me-2">
                                                    <del>{{ $item->product->price }} DA</del>
                                                </span>
                                                <b>{{ $item->product->price - ($item->product->promotion->value * $item->product->price) / 100 }}
                                                    DA</b>
                                            </h5>
                                        @else
                                            <h5 class="my-0">

                                                <b>{{ $item->product->price }}DA</b>
                                            </h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
                @if ($nbr_pr > 1)
                    <div class="row">
                        <div class="col-lg-12">

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
                                @for ($i = 2; $i <= $nbr_pr + 1; $i++)
                                    <li
                                        class="page-item  {{ request()->get('page') == $i ? 'active' : '' }} {{ $i == 1 ? 'active' : '' }}">
                                        <a class="page-link" href="?page={{ $i }}">{{ $i }}
                                        </a>
                                    </li>
                                @endfor
                                <li
                                    class="page-item {{ $nbr_pr < 1 || request()->get('page') >= $nbr_pr ? 'disabled' : '' }}">
                                    <a class="page-link"
                                        href="{{ request()->get('page') != 0 ? url()->current() . '?page=' . request()->get('page') + 1 : url()->current() . '?page=' . request()->get('page') + 2 }}"
                                        aria-label="Next">
                                        <i class="fal fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

            </div>

        </div>

    @endsection
