@extends('layouts.admin.admin')
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Users Report</li>
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
                            <option value="user" selected>Customer Orders Report</option>
                            <option value="coupon">Coupon Report</option>
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
                    <div class="card-header">Users List</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Mobile No.</th>
                                        <th>Status</th>
                                        <th>Orders</th>
                                        <th>Amount</th>
                                        <th>Created_Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($userReport as $index => $item)
                                    <tr>
                                        <td>{{ $index + $userReport->firstItem() }}</td>
                                        <td>{{ $item->firstname }}&nbsp;{{ $item->lastname }}</td><td>{{ $item->email }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>
                                        @if($item->status == 1)
                                            Enabled
                                        @else
                                            Disabled
                                        @endif
                                        </td>
                                        <td>
                                           <a href="{{ route('Orders',$item->id) }}" name="Order">{{ $item->orders->count() }}</a>
                                        </td>
                                        <td>
                                            {{ $item->orders->sum('grand_total') }}
                                        </td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8"><p class="text-center">No Data Available</p></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="row">
                              <div class="pagination-wrapper"> {!! $userReport->render() !!} </div>
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
                    <form action="{{ url('admin/reports/user') }}" method="post">
                    @csrf
                        @if(Session::has('userfilter'))
                        <div class="form-group">
                        <label class="control-label" for="input-date-range">Date Range</label>
                            <div class="input-group">
                                <input type="text" value="{{ isset($date) ? $date : ''}}" class="form-control">
                                <input type="hidden" name="datefilter" value="" placeholder="Date Range" id="input-date-range" class="form-control">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" name="userfiltercancle" class="btn btn-default" value="Cancle"></i>Cancle</button>
                        </div>
                        @else
                        <div class="form-group">
                        <label class="control-label" for="input-date-range">Date Range</label>
                            <div class="input-group date">
                                <input type="hidden" name="user" value="user" />
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
