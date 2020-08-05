@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                     @if($message = Session::get('flash_message')) 
                      <div class="alert alert-info alert-dismissible" role="alert">
                        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                       {{ $message }}
                      </div>
                      @endif
                    <div class="card-header">Product</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <form method="GET" action="{{ url('/admin/product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Category</th><th>Product Code</th><th>Color</th><th>Featured</th><th>Recommended</th><th>Price</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $index => $item)
                                    <tr>
                                        <td>{{ $index + $product->firstItem() }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                        @foreach($item->categories as $cat)
                                            {{ $cat->category }}
                                        @endforeach
                                        </td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>
                                        @if($item->featured == 'on')
                                            <i class="far fa-check-square" aria-hidden="true" style="font-size: 20px;color: grey"></i>
                                        @else
                                           <i class="far fa-square" style="font-size: 20px;color: grey"></i>
                                        @endif
                                        </td>
                                        <td>
                                        @if($item->recommended == 'on')
                                            <i class="far fa-check-square" aria-hidden="true" style="font-size: 20px;color: grey"></i>
                                        @else
                                           <i class="far fa-square" style="font-size: 20px;color: grey"></i>
                                        @endif
                                        </td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('/admin/product/' . $item->id) }}" title="View ProductImage"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/admin/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $product->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
