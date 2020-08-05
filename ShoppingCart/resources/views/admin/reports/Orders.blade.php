@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Order Details</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/reports/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Order Id</th><th>Order Date</th><th>Order Products</th><th>Total Amount</th><th>Order Status</th><th>Payment Method</th><th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Orders as $index => $item)
                                    <tr>
                                        <td>{{ $index + $Orders->firstItem() }}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal-xl{{$item->id}}" href=""> {{ $item->id }} </a>
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
                                                <div class="row">
                                                  <div class="col-lg-6">
                                                    <div class="card">
                                                     <div class="card-header" style="background-color: #f9fafb">
                                                        <h5 class="card-title">Billing Details</h5>
                                                     </div>  
                                                     <div class="card-body">
                                                        <p class="card-text">
                                                          {{ $item->user->firstname }}&nbsp;{{ $item->user->lastname }}<br>
                                                          {{ $item->user->address }}<br>
                                                          {{ $item->user->city }}<br>
                                                          {{ $item->user->state }}<br>
                                                          {{ $item->user->country }}<br>
                                                          {{ $item->user->pincode }}<br>
                                                          {{ $item->user->mobile }}
                                                        </p>   
                                                     </div>
                                                    </div><!-- /.card -->
                                                  </div>
                                                  <!-- /.col-md-6 -->

                                                  <div class="col-lg-6">
                                                    <div class="card">
                                                      <div class="card-header" style="background-color: #f9fafb">
                                                        <h5 class="card-title">Shipping Details</h5>
                                                      </div>
                                                      <div class="card-body">
                                                        <p class="card-text">
                                                          {{ $item->firstname }}&nbsp;{{ $item->lastname }}<br>
                                                          {{ $item->address }}<br>
                                                          {{ $item->city }}<br>
                                                          {{ $item->state }}<br>
                                                          {{ $item->country }}<br>
                                                          {{ $item->pincode }}<br>
                                                          {{ $item->mobile }}
                                                        </p>                              
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- /.col-md-6 -->

                                                  <div class="col-lg-12">
                                                    <div class="card">
                                                      <div class="card-body m-0 p-0">
                                                        <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <thead>
                                                                <tr style="background-color: #f9fafb">
                                                                    <td>Product Code</td>
                                                                    <td>Product Image</td>
                                                                    <td>Product Name</td>
                                                                    <td>Product Size</td>
                                                                    <td>Product Price</td>
                                                                    <td>Product Qty</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($item->orders as $product)
                                                                <tr>
                                                                    <td>{{ $product->product_code }}</td>
                                                                    <td><a href=""><img src="{{ url('../uploads/productimages/'.$product->product_image) }}" alt="" width="70" height="100" /></a></td>
                                                                    <td>{{ $product->product_name }}</td>
                                                                    <td>{{ $product->product_size }}</td>
                                                                    <td>{{ $product->product_price }}</td>
                                                                    <td>{{ $product->product_qty }}</td>
                                                                </tr>
                                                              @endforeach
                                                            </tbody>
                                                        </table>
                                                        </div> 
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- /.col-md-12 -->
                                                </div>
                                                </div>
                                                {{-- <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div> --}}
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
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
                                        <td>{{ $item->payment_status }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="pagination-wrapper"> {!! $Orders->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
