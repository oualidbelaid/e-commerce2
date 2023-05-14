@extends('admin/includes/layout.app')
@section('title', 'products')
@section('content')
    <div class="container-fluid product">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18 h_title ">Edit Product</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Ecommerce</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Edit Product</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('product.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="h4 card-title"> Basic Information</h5>
                            <p class="card-title-desc">Fill all information below</p>

                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    {!! \Session::get('success') !!}
                                </div>
                            @endif

                            <div class="row form_input">

                                <div class="col-sm-6">

                                    <div class="mb-3 mb-3"><label class="form-label">Product Name</label> <input
                                            id="productname" class="form-control form-control" type="text" name="name"
                                            placeholder="" value="{{ $product->name }}"> </div>
                                    <div class="mb-3 mb-3"><label class="form-label">Amount</label>
                                        <input id="manufacturerbrand" class="form-control form-control" type="number"
                                            name="amount" placeholder="" value="{{ intval($product->amount) }}">
                                    </div>
                                    <div class="mb-3 mb-3"><label class="form-label">Price</label> <input id="price"
                                            class="form-control form-control" type="number" name="price" placeholder=""
                                            value="{{ intval($product->price) }}">
                                    </div>
                                    <div class="mb-3 mb-3">
                                        @if ($product->promotion)
                                            <div class="mb-3 mb-3 ">
                                                <div class="mb-3 mb-3">
                                                    <label class="form-label" for="valuePrm">Promotion value <i
                                                            class="fal fa-badge-percent font-size-15"></i>
                                                    </label>
                                                    <input class="form-control" type="number"
                                                        value="{{ intval($product->promotion->value) }}" id="valuePrm"
                                                        name="promotionValue">
                                                </div>
                                                <div class="mb-3 mb-3 ">
                                                    <label class="form-label" for="expiryPrm">
                                                        Expiry date
                                                    </label>
                                                    <input class="form-control" type="date"
                                                        value="{{ $product->promotion->expiry_date }}" id="expiryPrm"
                                                        name="expiryPromotion">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-info btn-danger" id="add_prm">Remove
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-info" id="add_prm">Add Promotion
                                            </button>
                                        @endif

                                    </div>

                                    @if (count($product->attributs) > 0)
                                        @foreach ($product->attributs as $key => $item)
                                            @if ($key < count($product->attributs) / 2)
                                                <label class="form-label">{{ $item->attribut->name }}</label>
                                                <div class="mb-3 mb-3 input-group">
                                                    <input id="productname" class="form-control  " type="text"
                                                        name="attributs[{{ $item->attribut_id }}]"
                                                        placeholder="{{ $item->attribut->name }}"
                                                        aria-describedby="button-addon2" value="{{ $item->value }} ">
                                                    <a href="{{ route('product.destroyAttrPr', [$item->id]) }} "
                                                        class="btn btn-danger" type="submit" id="button-addon2">
                                                        <i class="fad fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-3"><label class="form-label">Min Quantity</label>
                                        <input id="manufacturerbrandq" class="form-control form-control" type="number"
                                            name="min_quantity" value="{{ intval($product->min_quantity) }}"
                                            placeholder="">
                                    </div>
                                    <div class="mb-3 mb-3"><label class="control-label form-label">Category</label>

                                        <div class="selectContainer svelte-17l1npl focused" style="">

                                            <input autocapitalize="none" autocomplete="off" autocorrect="off"
                                                spellcheck="false" tabindex="0" type="text"
                                                aria-autocomplete="list" placeholder="Select..."
                                                class="svelte-17l1npl show-ctg serch_list" style="">

                                            <div class="listContainer svelte-1uyqfml add-ctg"
                                                style="min-width:450.6000061035156px;width:auto;top:41px; display: none;">
                                                @foreach ($categories as $item)
                                                    <div
                                                        class="item  svelte-3e0qet list  @foreach ($product->categories as $ctg) @if ($ctg->name == $item->name)
                                                                {{ 'hover' }} @endif @endforeach ">
                                                        {{ $item->name }}
                                                        <input class="form-check-input d-none" name="categories[]"
                                                            type="checkbox" value="{{ $item->id }}"
                                                            @foreach ($product->categories as $ctg) @if ($ctg->name == $item->name)
                                                                {{ 'checked' }} @endif
                                                            @endforeach>
                                                    </div>
                                                @endforeach
                                                <div class='item svelte-3e0qet  '> <a href="{{ route('category') }} "
                                                        class="fonr-size-14">Add
                                                        category</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-3"><label class="form-label">Product Description</label>
                                        <textarea class="form-control" name="description" id="productdesc" rows="6" style="height: 119px;">{{ $product->description }} </textarea>
                                    </div>
                                    @if (count($product->attributs) > 0)
                                        @foreach ($product->attributs as $key => $item)
                                            @if ($key >= count($product->attributs) / 2)
                                                <label class="form-label">{{ $item->attribut->name }}</label>
                                                <div class="mb-3 mb-3 input-group">
                                                    <input id="productname" class="form-control  " type="text"
                                                        name="attributs[{{ $item->attribut_id }}]"
                                                        placeholder="{{ $item->attribut->name }}"
                                                        aria-describedby="button-addon2" value="{{ $item->value }} ">
                                                    <a href="{{ route('product.destroyAttrPr', [$item->id]) }} "
                                                        class="btn btn-danger" type="submit" id="button-addon2">
                                                        <i class="fad fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="mb-3 h4 card-title">Product Images</h5>

                            <div tabindex="0" class="dropzone svelte-817dg2 p-0" style=""><input
                                    class="form-control" multiple="" name="photos[]"
                                    value="http://127.0.0.1:8000/uploads/products/1650396963pms_1574845806.64467083.png"
                                    type="file" autocomplete="off" tabindex="-1" id="product_photos">

                                <div>
                                    <div class="dz-message needsclick">
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="fad fa-cloud-upload-alt" style="font-size: 40px"></i>
                                            </div>
                                            <h4>Drop photo here or click to upload.<br> (Preferably the same size)</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                            <div class="">
                                @php
                                    $photos = explode('&&', $product->photo);
                                @endphp
                                @foreach ($photos as $photo)
                                    @if ($photo != '')
                                        <img class="img-thumbnail pr_photo" src="{{ URL::asset($photo) }}"
                                            alt="{{ $product->name }}" width="200">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card" style="">
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2"><button type="submit"
                                    class="waves-effect waves-light btn btn-primary" value="" style="">Save
                                    Changes
                                </button> <button type="submit" class="waves-effect waves-light btn btn-secondary"
                                    value="" style="">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="h4 card-title">Add Data</h5>
                        <p class="card-title-desc">Fill all information below
                        </p>
                        <div class="row">
                            <div class="col-sm-6 mb-5">
                                <div class="mb-5"><label class="control-label form-label">Attribut</label>
                                    <div class="selectContainer svelte-17l1npl focused" style="">
                                        <input autocapitalize="none" autocomplete="off" autocorrect="off"
                                            spellcheck="false" tabindex="0" type="text" aria-autocomplete="list"
                                            placeholder="Select..." class="svelte-17l1npl show-att serch_list"
                                            style="">
                                        <div class="listContainer svelte-1uyqfml add-att"
                                            style=" width: auto; top: 41px; max-height: 80px;min-height:40px; display: none;">
                                            @foreach ($attributs as $att)
                                                @php
                                                    $checked = false;
                                                @endphp
                                                @foreach ($product->attributs as $item)
                                                    @if ($item->attribut == $att)
                                                        <div class="item  svelte-3e0qet list hover">
                                                            {{ $att->name }}
                                                            <input class="form-check-input d-none" name="attributs[]"
                                                                type="checkbox" value="{{ $att->id }}"
                                                                data-name="{{ $att->name }}" data-attr-cheched="true"
                                                                checked="checked">
                                                        </div>
                                                        @php
                                                            $checked = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if (!$checked)
                                                    <div class="item  svelte-3e0qet list "> {{ $att->name }}
                                                        <input class="form-check-input d-none" name="attributs[]"
                                                            type="checkbox" value="{{ $att->id }}"
                                                            data-name="{{ $att->name }}  ">
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="item  svelte-3e0qet ">
                                                <a href="{{ route('attribut') }} ">Add new Attribut</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2"><button type="button"
                                class="waves-effect waves-light btn btn-warning" id="add-att" value=""
                                style="">Add
                                Attribut
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
