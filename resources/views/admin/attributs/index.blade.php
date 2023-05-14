@extends('admin/includes/layout.app')
@section('title', 'attributs')
@section('content')
    <!-- attribut -->
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Attribut List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/#">Catigories</a></li>
                            <li class="active breadcrumb-item" aria-current="page"><a href="/#">Attribut List</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 tr_hs">
                <div class="card">
                    <div class="card-body">
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
                        <div class="table-responsive">
                            <div class="create">
                                <div class=" h4 card-title">Attribut</div>
                                <form class="row g-3" action="{{ route('attribut.store') }}" method="GET">
                                    @csrf
                                    @method('get')
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Add Attribut"
                                            aria-describedby="button-addon2">
                                        <button class="btn btn-success" type="submit" id="button-addon2">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <table class="align-middle table-nowrap  table category">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">attribut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attributs as $key => $item)
                                        <tr>
                                            <form action="{{ route('attribut.update', [$item->id]) }}" method="post">
                                                @csrf
                                                @method('post')
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>
                                                    <input type="text" class="form-control d-none" name="name"
                                                        value=" {{ $item->name }}" style="text-align: center;">
                                                    <span class="update_categry">{{ $item->name }}</span>
                                                </td>
                                                <td>
                                                    <button type=" button"
                                                        class="btn btn-success btn-sm btn-rounded waves-effect waves-light update disabled ">
                                                        Edit
                                                    </button>

                                                    <a href="{{ route('attribut.destroy', [$item->id]) }}" type="button"
                                                        class="btn btn-danger btn-sm btn-rounded waves-effect waves-light">
                                                        Delelet
                                                    </a>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end attributs -->
@endsection
