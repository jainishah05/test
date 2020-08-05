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
                    <div class="card-header">Coupon</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/coupon/create') }}" class="btn btn-success btn-sm" title="Add New Coupon">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/coupon') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Coupon Code</th><th>Amount</th><th>Amount Type</th><th>Expiry Date</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($coupon as $index => $item)
                                    <tr>
                                        <td>{{ $index + $coupon->firstItem() }}</td>
                                        <td>{{ $item->coupon_code }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->amount_type }}</td>
                                        <td>{{ $item->expiry_date }}</td>
                                        <td>@if($item->status == 1 ) Active @else Inactive @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/coupon/' . $item->id) }}" title="View Coupon"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/coupon/' . $item->id . '/edit') }}" title="Edit Coupon"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/admin/coupon' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Coupon" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $coupon->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
