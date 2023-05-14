@extends('admin/includes/layout.app')
@section('title', 'products')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Product Detail</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Ecommerce</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Product Detail</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="product-detai-imgs">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-4">
                                            <ul class="flex-column nav nav-pills">
                                                @php
                                                    $photos = explode('&&', $product->photo);
                                                @endphp
                                                @foreach ($photos as $photo)
                                                    @if ($photo != '')
                                                        <button href="#" class="nav-link checked_photo">
                                                            <img src="{{ URL::asset($photo) }}" alt=""
                                                                class="img-fluid mx-auto d-block rounded">
                                                        </button>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-sm-9 col-md-7 offset-md-1 col-8">
                                            <div class="tab-content">
                                                {{-- <ul class="nav nav-tabs">
                                                    <li class="nav-item"><a href="#" class="nav-link"> </a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link"> </a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link"> </a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link"> </a></li>
                                                </ul> --}}
                                                <div class="tab-pane active">
                                                    <div><img src="{{ URL::asset($photos[0]) }}" alt=""
                                                            class="img-fluid mx-auto d-block photo"></div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('product.edit', [$product->id]) }} " type="button"
                                                    class="btn btn-success waves-effect waves-light mt-2 me-1"> Edit
                                                </a>
                                                <a href="{{ route('product.destroy', [$product->id]) }} " type="button"
                                                    class="btn btn-danger waves-effect waves-light mt-2 me-1"> delete
                                                </a>
                                                {{-- <button type="button"
                                                    class="btn btn-success waves-effect  mt-2 waves-light"><i
                                                        class="bx bx-shopping-bag me-2"></i>Buy now
                                                </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mt-4 mt-xl-3">

                                    @forelse ($product->categories as $key=> $item)
                                        @if ($key == count($product->categories) - 1)
                                            <a href="/" class="text-primary">{{ $item->name }}</a>
                                        @else
                                            <a href="/" class="text-primary">{{ $item->name }}</a>,
                                        @endif
                                    @empty
                                    @endforelse
                                    </a>
                                    <h4 class="mt-1 mb-3">{{ $product->name }} </h4>
                                    <p class="text-muted float-start me-3">
                                        <span class="text-warning fad fa-star"></span>
                                        <span class="text-warning fad fa-star"></span>
                                        <span class="text-warning fad fa-star"></span>
                                        <span class="text-warning fad fa-star"></span>
                                        <span class="fad fa-star"></span>
                                    </p>
                                    <p class="text-muted mb-4">( 152 Customers Review )</p>
                                    @if ($product->promotion)
                                        <h6 class="text-success text-uppercase">{{ $product->promotion->value }} % Off
                                        </h6>
                                        <h5 class="mb-4">Price : <span class="text-muted me-2">
                                                <del>{{ $product->price }} DA</del>
                                            </span>
                                            <b>{{ $product->price - ($product->promotion->value * $product->price) / 100 }}
                                                DA</b>
                                        </h5>
                                    @else
                                        <h5 class="mb-4">Price :
                                            <b>{{ $product->price }}
                                                DA</b>
                                        </h5>
                                    @endif

                                    <p class="text-muted mb-4">{{ $product->description }}</p>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <div>
                                                @forelse ($product->attributs as $key=> $item)
                                                    @if ($key % 2 == 0)
                                                        <p class="text-muted fw-bold"><i
                                                                class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>
                                                            {{ $item->attribut->name }} : {{ $item->value }}</p>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                @forelse ($product->attributs as $key=> $item)
                                                    @if ($key % 2 != 0)
                                                        <p class="text-muted fw-bold"><i
                                                                class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>
                                                            {{ $item->attribut->name }} : {{ $item->value }}</p>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-color">
                                        @forelse ($product->attributs as $item)
                                            @if ($item->attribut->name == 'color')
                                                @php
                                                    $colors = explode(' ', $item->value);
                                                @endphp
                                                <h5 class="font-size-15">Color :</h5>
                                                @foreach ($colors as $color)
                                                    <button class=" btn">
                                                        <div class="product-color-item border rounded"
                                                            style="background-color:{{ $color }};">
                                                            <img src=" " alt="" class="avatar-md">
                                                        </div>
                                                        <p>{{ $color }} </p>
                                                    </button>
                                                @endforeach
                                            @endif
                                        @empty
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h5 class="mb-3">Specifications :</h5>

                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 400px;">Category</th>
                                            <td>
                                                @forelse ($product->categories as $key=> $item)
                                                    @if ($key == count($product->categories) - 1)
                                                        {{ $item->name }}
                                                    @else
                                                        {{ $item->name . ',' }}
                                                    @endif
                                                @empty
                                                    not have category
                                                @endforelse
                                            </td>
                                        </tr>
                                        @forelse ($product->attributs as $item)
                                            <tr>
                                                <th scope="row" style="text-transform: capitalize">
                                                    {{ $item->attribut->name }}
                                                </th>
                                                <td>{{ $item->value }}</td>
                                            </tr>

                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h5>Reviews :</h5>
                            @if (count($product->comments) > 0)
                                @foreach ($product->comments as $item)
                                    <div class="d-flex py-3 border-bottom">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs"><span
                                                    class="avatar-title bg-primary bg-soft text-primary rounded-circle font-size-16">{{ strtoupper($item->user->name[0]) }}</span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1 font-size-15">{{ ucwords($item->user->name) }}</h5>
                                            <p class="text-muted">{{ $item->content }} .</p>
                                            <ul class="list-inline float-sm-end mb-sm-0">
                                                <li class="list-inline-item"><a href="/"><i
                                                            class="far fa-thumbs-up me-1"></i>
                                                        Like</a></li>
                                                <li class="list-inline-item"><a href="/"><i
                                                            class="far fa-comment-dots me-1"></i>
                                                        Comment</a></li>
                                            </ul>
                                            <div class="text-muted font-size-12"><i
                                                    class="far fa-calendar-alt text-primary me-1"></i>
                                                {{ $item->created_at->format(' d M ,Y ') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{-- <div class="d-flex py-3 border-bottom">
                                <div class="flex-shrink-0 me-3"><img src="/assets/images/users/avatar-4.jpg"
                                        class="avatar-xs rounded-circle" alt="img"></div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">Denver</h5>
                                    <p class="text-muted">To an English person, it will seem like simplified English,
                                        as a skeptical Cambridge</p>
                                    <ul class="list-inline float-sm-end mb-sm-0">
                                        <li class="list-inline-item"><a href="/"><i class="far fa-thumbs-up me-1"></i>
                                                Like</a></li>
                                        <li class="list-inline-item"><a href="/"><i class="far fa-comment-dots me-1"></i>
                                                Comment</a></li>
                                    </ul>
                                    <div class="text-muted font-size-12"><i
                                            class="far fa-calendar-alt text-primary me-1"></i> 07 Oct, 2019</div>
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0 me-3"><img src="/assets/images/users/avatar-5.jpg"
                                                class="avatar-xs rounded-circle" alt="img"></div>
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1 font-size-15">Henry</h5>
                                            <p class="text-muted">Their separate existence is a myth. For science,
                                                music,
                                                sport, etc.</p>
                                            <ul class="list-inline float-sm-end mb-sm-0">
                                                <li class="list-inline-item"><a href="/"><i
                                                            class="far fa-thumbs-up me-1"></i> Like</a></li>
                                                <li class="list-inline-item"><a href="/"><i
                                                            class="far fa-comment-dots me-1"></i> Comment</a></li>
                                            </ul>
                                            <div class="text-muted font-size-12"><i
                                                    class="far fa-calendar-alt text-primary me-1"></i> 08 Oct,
                                                2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="mt-3 row">
            <div class="col-lg-12">
                <div>
                    <h5 class="mb-3">Recent product :</h5>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="card" style="">
                                <div class="card-body">
                                    <div class="align-items-center row">
                                        <div class="col-md-4"><img src="/assets/images/product/img-7.png" alt=""
                                                class="img-fluid mx-auto d-block"></div>
                                        <div class="col-md-8">
                                            <div class="text-center text-md-start pt-3 pt-md-0">
                                                <h5 class="text-truncate"><a href="/" class="text-dark">Wireless
                                                        Headphone</a></h5>
                                                <p class="text-muted mb-4"><i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star"></i>
                                                </p>
                                                <h5 class="my-0"><span
                                                        class="text-muted me-2"><del>$240</del></span>
                                                    <b>$225</b>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card" style="">
                                <div class="card-body">
                                    <div class="align-items-center row">
                                        <div class="col-md-4"><img src="/assets/images/product/img-4.png" alt=""
                                                class="img-fluid mx-auto d-block"></div>
                                        <div class="col-md-8">
                                            <div class="text-center text-md-start pt-3 pt-md-0">
                                                <h5 class="text-truncate"><a href="/" class="text-dark">Phone
                                                        patterned cases</a></h5>
                                                <p class="text-muted mb-4"><i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star"></i>
                                                </p>
                                                <h5 class="my-0"><span
                                                        class="text-muted me-2"><del>$150</del></span>
                                                    <b>$145</b>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card" style="">
                                <div class="card-body">
                                    <div class="align-items-center row">
                                        <div class="col-md-4"><img src="/assets/images/product/img-6.png" alt=""
                                                class="img-fluid mx-auto d-block"></div>
                                        <div class="col-md-8">
                                            <div class="text-center text-md-start pt-3 pt-md-0">
                                                <h5 class="text-truncate"><a href="/" class="text-dark">Phone Dark
                                                        Patterned cases</a></h5>
                                                <p class="text-muted mb-4"><i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star"></i>
                                                </p>
                                                <h5 class="my-0"><span
                                                        class="text-muted me-2"><del>$138</del></span>
                                                    <b>$135</b>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
