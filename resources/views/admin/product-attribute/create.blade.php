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
                    </ul>
                </div>
            </div>
            <div class="col-md-9 mt-3">
                <div class="card">
                    <div class="card-header">Product Attribute</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product/'.$product_id.'/edit') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('attribute') ? 'has-error' : ''}}">
                                <label for="attribute" class="control-label">{{ 'Attributes' }}</label>
                                    <select name="attribute" id="attribute" class="form-control" >
                                        <option value="">--Select Attribute--</option>
                                        @foreach($attribute as $attr)
                                            <option value="{{ $attr->id }}">{{ $attr->name }}</option>
                                        @endforeach
                                    </select>
                                {!! $errors->first('attribute', '<p class="help-block">:message</p>') !!}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="attributevalue" style="display: none">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Add Attribute Value</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admin/product-attribute/') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control" name="product_id" type="hidden" value="{{ $p_id = $product_id }}">
                            </div>
                            @include ('admin.product-attribute.form', ['formMode' => 'create'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
