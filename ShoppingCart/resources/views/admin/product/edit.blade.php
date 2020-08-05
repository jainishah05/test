@extends('layouts.admin.admin')
@section('content')
    <div class="container">
         @if($message = Session::get('flash_message')) 
                      <div class="alert alert-info alert-dismissible" role="alert">
                        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                       {{ $message }}
                      </div>
                    @endif
        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/product') }}">General</a></li>
                        @if(!$productImg)
                            <li class="nav-item"><a class="nav-link" href="{{ url('/admin/product-image/create/'. $product->id) }}">Images</a></li>
                            
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('/admin/product-image/' . $product->product_images[0]->id . '/edit/'. $product->id) }}">Images</a></li>
                        @endif
                        @if(!$productAttr)
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/product-attribute/create/'. $product->id) }}" >Attributes</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/product-attribute/'. $product->attributes[0]->id . '/edit/'. $product->id) }}" >Attributes</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-9 mt-3">
                <div class="card">
                    <div class="card-header row">Edit Product #{{ $product->id }}
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/product/' . $product->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.product.form', ['formMode' => 'edit'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
