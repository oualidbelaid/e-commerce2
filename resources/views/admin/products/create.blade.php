@extends('admin/includes/layout.app')
@section('content')
    <div class="container-fluid product">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18 h_title ">Add Product</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Ecommerce</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Add Product</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="h4 card-title"> Basic Information</h5>
                            <p class="card-title-desc">Fill all information below
                            </p>
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
                                    <div class="mb-3 mb-3">
                                        <label class="form-label">Product Name</label> <input id="productname"
                                            class="form-control form-control" type="text" name="name" placeholder="">
                                    </div>
                                    <div class="mb-3 mb-3"><label class="form-label">Amount</label>
                                        <input id="manufacturerbrand" class="form-control form-control" type="number"
                                            name="amount" placeholder="">
                                    </div>
                                    <div class="mb-3 mb-3">
                                        <label class="form-label" for="price">Price</label>
                                        <input id="price" class="form-control form-control" type="number" name="price"
                                            placeholder="">
                                    </div>
                                    <div class="mb-3 mb-3">
                                        <button type="button" class="btn btn-info" id="add_prm">Add Promotion </button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-3"><label class="form-label">Min Quantity</label>
                                        <input id="manufacturerbrandq" class="form-control form-control" type="number"
                                            name="min_quantity" placeholder="">
                                    </div>
                                    <div class="mb-3 mb-3"><label class="control-label form-label">Category</label>

                                        <div class="selectContainer svelte-17l1npl focused" style="">
                                            <span aria-live="polite" aria-atomic="false" aria-relevant="additions text"
                                                class="a11yText svelte-17l1npl"><span id="aria-selection">
                                                </span>
                                            </span>

                                            </span>
                                            <input autocapitalize="none" autocomplete="off" autocorrect="off"
                                                spellcheck="false" tabindex="0" type="text" aria-autocomplete="list"
                                                placeholder="Select category..." class="svelte-17l1npl show-ctg serch_list"
                                                style="">
                                            <div class="listContainer svelte-1uyqfml add-ctg"
                                                style="min-width:450.6000061035156px;width:auto;top:41px; display: none;">
                                                @foreach ($categories as $item)
                                                    <div class="item  svelte-3e0qet list">
                                                        {{ $item->name }}
                                                        <input class="form-check-input d-none" name="categories[]"
                                                            type="checkbox" value="{{ $item->id }}">
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
                                        <textarea class="form-control" name="description" id="productdesc" rows="6" style="height: 119px;"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="mb-3 h4 card-title">Product Images</h5>
                            <div tabindex="0" class="dropzone svelte-817dg2 p-0" style="">
                                <input class="form-control" multiple name="photos[]" type="file" id="product_photos">
                                <div>
                                    <div class="dz-message needsclick">
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="fad fa-cloud-upload-alt" style="font-size: 40px"></i>
                                            </div>
                                            <h4>Drop photo here or click to upload. <br> (Preferably the same size)</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                        </div>
                    </div>
                    <div class="card" style="">
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="waves-effect waves-light btn btn-primary" value=""
                                    style="">Create
                                </button>
                                <button type="button" id="cancel" class="waves-effect waves-light btn btn-secondary"
                                    value="" style="">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="h4 card-title">Add Data</h5>
                        <p class="card-title-desc">Fill all information below</p>
                        <div class="row">
                            <div class="col-sm-6 mb-5">
                                <div class="mb-5"><label class="control-label form-label">Attribut</label>
                                    <div class="selectContainer svelte-17l1npl focused" style="">
                                        <input autocapitalize="none" autocomplete="off" autocorrect="off" spellcheck="false"
                                            tabindex="0" type="text" aria-autocomplete="list" placeholder="Select..."
                                            class="svelte-17l1npl show-att serch_list" style="">
                                        <div class="listContainer svelte-1uyqfml add-att"
                                            style=" width: auto; top: 41px; max-height: 80px;min-height:40px; display: none;">
                                            @foreach ($attributs as $att)
                                                <div class="item  svelte-3e0qet list"> {{ $att->name }}
                                                    <input class="form-check-input d-none" name="attributs[]"
                                                        type="checkbox" value="{{ $att->id }}"
                                                        data-attr-cheched="false" data-name="{{ $att->name }} ">
                                                </div>
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
                                class="waves-effect waves-light btn btn-warning" id="add-att" value="" style="">Add
                                Attribut
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
