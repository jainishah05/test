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
                        <a href="{{ url('/admin/product-attribute/create/'.$product_id) }}" ><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Create New</button></a>
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
                                    <select class="form-control"  name="attribute" id="attribute">
                                        @foreach($attribute as $attr)
                                            <option value="{{ $attr->id }}" @if($attr->id == $productAttr->attribute_id) selected @endif>{{ $attr->name }}</option>
                                            @break
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
                    <div class="card-header">Edit Attribute Value</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admin/product-attribute/'. $productAttr->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control" name="product_id" type="hidden" value="{{ $p_id = $product_id }}">
                            </div>
                            @include ('admin.product-attribute.form', ['formMode' => 'edit'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="table" >
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="card">    
                    <div class="card-header">Product-Attribute</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th><th>Product</th>
                                    <th>Attribute</th>
                                    <th>Sku</th><th>Quantity</th>
                                    <th>Price</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $pro)
                                <tr>
                                    @if($pro->id == $p_id)
                                        @foreach($pro->attributes as $item)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pro->name }}</td>  
                                        <td>{{ $item->attribute_value }}</td>
                                        <td>{{ $item->sku }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('admin/product-attribute/' . $item->id . '/edit/'.$p_id)}}" title="Edit Attribute"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/product-attribute' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            {{-- <input class="form-control" name="attribute_id" type="hidden" id="attribute_id" value="{{ $attribute_id }}" > --}}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete ProductAttribute" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
