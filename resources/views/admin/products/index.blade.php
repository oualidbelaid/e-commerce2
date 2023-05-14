@extends('admin/includes/layout.app')
@section('title', 'products')
@section('content')
    <!-- start products -->
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Product List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Products</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Product List</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 tr_hs">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2 row">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <form class="mt-4 mt-sm-0 float-sm-end d-flex align-items-center"
                                        action="{{ route('product.search') }}" method="GET" role="search">
                                        <div class="search-box me-2">
                                            <div class="position-relative"><input class="form-control" type="text"
                                                    name="q" placeholder="Search..."
                                                    value="{{ isset($key) ? $key : '' }}">
                                                <button type="submit" class="border-0">
                                                    <i class="fal fa-search search-icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{ route('product.create') }}"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 ">
                                        <i class="fas fa-plus  me-1"></i>
                                        New Product
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle table-nowrap  table ">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">name</th>
                                        <th scope="col">price // promotion</th>
                                        <th scope="col">photo</th>
                                        <th scope="col">amount</th>
                                        <th scope="col" colspan="2">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($messagError))
                                        <div class="alert alert-danger">
                                            {!! $messagError !!}
                                        </div>
                                    @else
                                        @foreach ($products as $key => $item)
                                            @php
                                                $photos = explode('&&', $item->photo);
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $item->id }} </th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}DA //
                                                    <span
                                                        class="text-info">{{ $item->promotion ? $item->promotion->value : '0' }}

                                                        <i class="fal fa-badge-percent font-size-14"></i>
                                                    </span>
                                                </td>


                                                <td><img src="{{ URL::asset($photos[0]) }}" alt="" srcset="">
                                                </td>
                                                <td>{{ $item->amount }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', [$item->id]) }}" type="button"
                                                        class="btn btn-success btn-sm btn-rounded waves-effect waves-light">
                                                        Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('product.destroy', [$item->id]) }}" type="button"
                                                        class="btn btn-danger btn-sm btn-rounded waves-effect waves-light">
                                                        Delelet
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        @if ($nbr_pr > 0)
                            <ul id="more_product" class="pagination pagination-rounded justify-content-end mb-2">
                                <li
                                    class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'disabled' : '' }}">
                                    <a class="page-link"
                                        href="{{ url()->current() . '?q=' . request()->get('q') . '&&page=' . request()->get('page') - 1 }}"
                                        aria-label="Previous">
                                        <i class="fal fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li
                                    class="page-item  {{ !request()->get('page') || request()->get('page') == 1 ? 'active' : '' }}">
                                    <a class="page-link" href="?q={{ request()->get('q') }}&&page=1">1</a>
                                </li>
                                @for ($i = 2; $i <= $nbr_pr + 1; $i++)
                                    <li
                                        class="page-item  {{ request()->get('page') == $i ? 'active' : '' }} {{ $i == 1 ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="?q={{ request()->get('q') }}&&page={{ $i }}">{{ $i }}
                                        </a>
                                    </li>
                                @endfor
                                <li
                                    class="page-item {{ $nbr_pr < 1 || request()->get('page') >= $nbr_pr ? 'disabled' : '' }}">
                                    <a class="page-link"
                                        href="{{ request()->get('page') != 0 ? url()->current() . '?q=' . request()->get('q') . '&&page=' . request()->get('page') + 1 : url()->current() . '?q=' . $key . '&&page=' . request()->get('page') + 2 }}"
                                        aria-label="Next">
                                        <i class="fal fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->
@endsection
