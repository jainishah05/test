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
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/admin/order') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Order Date</th><th>Customer Name</th><th>Customer Email</th><th>Order Products</th><th>Order Amount</th><th>Order Status</th><th>Payment Method</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $index => $item)
                                    <tr>
                                        <td>{{ $index + $orders->firstItem() }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->firstname }}&nbsp;{{ $item->lastname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                        @foreach($item->orders as $pro)
                                            <p>
                                                {{ $pro->product_code }}
                                                ({{ $pro->product_qty }})
                                            </p>
                                        @endforeach
                                        </td>
                                        <td>{{ $item->grand_total }}</td>
                                        <td>{{ $item->order_status }}</td>
                                        <td>{{ $item->payment_method }}</td>
                                        <td>
                                            <a href="{{ url('/admin/order/' . $item->id) }}" title="View Coupon"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View Order Details</button></a>
                                            {{-- <a href="{{ url('/admin/coupon/' . $item->id . '/edit') }}" title="Edit Coupon"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/coupon' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Coupon" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
