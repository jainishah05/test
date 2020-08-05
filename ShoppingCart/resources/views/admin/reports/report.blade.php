@extends('layouts.admin.admin')
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
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
                            <option value="coupon">Coupon Report</option>
                            {{-- <option value="sales">Sales Report</option> --}}
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
                    <div class="card-header">Report Type</div>
                    <div class="card-body">
                        <p class="text-center">No Results!</p>
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
                        <div class="form-group">
                        <label class="control-label" for="input-date-range">Date Range</label>
                            <div class="input-group date">
                                <input type="text" name="datefilter" value="" placeholder="Date Range" id="input-date-range" class="form-control">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- col-2 ends --}}
        </div>
    </div>
@endsection
