@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Productimage</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product-image/create') }}" class="btn btn-success btn-sm" title="Add New ProductImage">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/product-image') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Product</th><th>Image</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($productimage as $item)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @foreach($product as $pro)
                                        @if($item->product_id == $pro->id)
                                            <td>{{ $pro->name }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                    @if(json_decode($item->image, true))
                                        @foreach(json_decode($item->image, true) as $images)
                                            <img class="" src="{{url('/uploads/productimages/'.$images)}}" alt="{{$images}} " width="150px" height="100px">
                                        @endforeach
                                    @else
                                       <img class="" src="{{url('/uploads/productimages/'.$item->image)}}" alt="{{$item->image}} " width="150px" height="100px">
                                    @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/product-image/' . $item->id) }}" title="View ProductImage"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/product-image/' . $item->id . '/edit') }}" title="Edit ProductImage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/product-image' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete ProductImage" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $productimage->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
