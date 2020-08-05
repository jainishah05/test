@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/product') }}">General</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 mt-3">
                <div class="card">
                    <div class="card-header">Edit ProductImage #{{ $productimage->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product/'.$product_id.'/edit') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/product-image/' . $productimage->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.product-image.form', ['formMode' => 'edit'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Product-Images </div>
                    <div class="card-body">
                        @foreach($multipleimg as $img)
                            <div class="card ml-2" style="width: 7rem; float: left">
                                <img id="image" class="card-img-top" src="{{url('/uploads/productimages/'.$img->image)}}" width = "100" height = "80" >
                                <div class="card-body">
                                    <form method="POST" action="{{ url('/admin/product-image' . '/' . $img->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <center>
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete ProductImage" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash"></i></button>
                                    </center>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
