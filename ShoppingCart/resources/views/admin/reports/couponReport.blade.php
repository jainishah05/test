@extends('layouts.admin.admin')
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Coupon Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Coupon Report</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row">
           <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fa fa-bar-chart"></i> Choose the report type</h3>
                     </div>
                    <div class="card-body">
                      <div class="well">
                      <div class="input-group">
                          <select name="report" onchange="location = this.value;" class="form-control">
                            <option value="report">--Select one type--</option>
                            <option value="user">Customer Orders Report</option>
                            <option value="coupon" selected>Coupon Report</option>
                          </select>
                      </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-pull-3 col-sm-12">
                <div class="card">
                    <div class="card-header">Coupons List</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Coupon</th>
                                        <th>Amount</th>
                                        <th>Amount Type</th>
                                        <th>Used Count</th>
                                        <th>Status</th>
                                        <th>Expiry Date</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($couponReport as $index => $item)
                                    <tr>
                                        <td>{{ $index + $couponReport->firstItem() }}</td>
                                        <td>{{ $item->coupon_code }}</td><td>{{ $item->amount }}</td>
                                        <td>{{ $item->amount_type }}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal-xl{{$item->id}}" href="">{{ $Order->where('coupon_code', $item->coupon_code )->count()}}</a>
                                            <div class="modal fade" id="modal-xl{{$item->id}}">
                                            <div class="modal-dialog modal-xl">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Order Details</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Coupon</th><th>Order Id</th><th>User</th><th>Discount</th><th>Used Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($Order->where('coupon_code', $item->coupon_code ) as $order)
                                                            <tr>
                                                                <td>{{ $order->coupon_code }}</td>
                                                                <td>{{ $order->id }}</td>
                                                                <td>{{ $order->firstname }}&nbsp;{{ $order->lastname }}</td>
                                                                <td>{{ $order->coupon_amount }}</td>
                                                                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5"><p class="text-center">No Data Available</p></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                    </div>
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                            @if($item->status == 0)
                                                Inactive
                                            @else
                                                Active
                                            @endif
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($item->expiry_date)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8"><p class="text-center">No Data Available</p></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="row">
                              <div class="pagination-wrapper"> {!! $couponReport->render() !!} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- col-2 start --}}
            <div id="filter-report" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-filter"></i> Filter</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{ url('admin/reports/coupon') }}" method="post">
                    @csrf
                    @if(Session::has('couponfilter'))
                        <div class="form-group">
                        <label class="control-label" for="input-date-range">Date Range</label>
                            <div class="input-group">
                                <input type="text" value="{{ isset($date) ? $date : ''}}" class="form-control">
                                <input type="hidden" name="datefilter" value="" placeholder="Date Range" id="input-date-range" class="form-control">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" name="couponfiltercancle" class="btn btn-default" value="Cancle">Cancle</button>
                        </div>
                    @else
                        <div class="form-group">
                        <label class="control-label" for="input-date-range">Date Range</label>
                            <div class="input-group date">
                                <input type="hidden" name="coupon" value="coupon" />
                                <input type="text" name="datefilter" value="" placeholder="Date Range" id="input-date-range" class="form-control">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
                        </div>
                    @endif
                    </form>
                    </div>
                </div>
            </div>
            {{-- col-2 ends --}}
        </div>
    </div>
@endsection
