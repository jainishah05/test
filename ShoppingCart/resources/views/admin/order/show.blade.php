@extends('layouts.admin.admin')
@section('content')
<!-- /.content-header -->
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            @if($message = Session::get('flash_message_success')) 
                <div class="alert alert-info alert-dismissible" role="alert">
                    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                    {{ $message }}
                </div>
            @endif
            <div class="card" style="background-color: #f9fafb">
                <div class="card-header">Order #{{ $orderDetails->id }}</div>
                <div class="card-body">
                    <a href="{{ url('/admin/order') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br>
                    <br>
                    <!-- Main content -->
                    <div class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="card">
                             <div class="card-header" style="background-color: #f9fafb">
                                <h5 class="card-title">Order Details</h5>
                             </div>
                              <div class="card-body p-0 m-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                               <td>Order Date</td> <td>{{ $orderDetails->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Status</td><td>{{ $orderDetails->order_status }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Total</td><td>{{ $orderDetails->grand_total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Charges</td><td>{{ $orderDetails->shipping_charges }}</td>
                                            </tr>
                                            <tr>
                                                <td>Coupon Code</td><td>{{ empty($orderDetails->coupon_code) ? '-' : $orderDetails->coupon_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Coupon Amount</td><td>{{ $orderDetails->coupon_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Method</td><td>{{ $orderDetails->payment_method }}</td>
                                            </tr>
                                            <tr>
                                              <td>Payment Status</td><td>{{ $orderDetails->payment_status }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                              </div>
                            </div>

                            <div class="card">
                             <div class="card-header" style="background-color: #f9fafb">
                                <h5 class="card-title">Billing Details</h5>
                             </div>   
                             <div class="card-body">
                                <p class="card-text">
                                  {{ $userDetails->firstname }}&nbsp;{{ $userDetails->lastname }}<br>
                                  {{ $userDetails->address }}<br>
                                  {{ $userDetails->city }}<br>
                                  {{ $userDetails->state }}<br>
                                  {{ $userDetails->country }}<br>
                                  {{ $userDetails->pincode }}<br>
                                  {{ $userDetails->mobile }}
                                </p>   
                             </div>
                            </div><!-- /.card -->
                          </div>
                          <!-- /.col-md-6 -->

                          <div class="col-lg-6">
                            <div class="card">
                              <div class="card-header" style="background-color: #f9fafb">
                                <h5 class="card-title">Customer Details</h5>
                              </div>
                              <div class="card-body  p-0 m-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                               <td>Customer Name</td> <td>{{ $orderDetails->firstname }}&nbsp;{{ $orderDetails->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer Email</td><td>{{ $orderDetails->email }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                              </div>
                            </div>

                            <div class="card">
                              <div class="card-header" style="background-color: #f9fafb">
                                <h5 class="card-title">Update Order Status</h5>
                              </div>
                              <div class="card-body">
                                <form action="{{ route('order.update',$orderDetails->id) }}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                    <div class="form-group">
                                        <select class="form-control" name="order_status" id="order_status">
                                            <option value="New" @if($orderDetails->order_status == "New") selected @endif>New</option>
                                            <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pending</option>
                                            <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
                                            <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif>In Process</option>
                                            <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
                                            <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Delivered</option>
                                        </select>
                                        <button class="btn btn-default mt-2">Update Status</button>
                                    </div>
                                </form>
                                
                              </div>
                            </div>


                            <div class="card">
                              <div class="card-header" style="background-color: #f9fafb">
                                <h5 class="card-title">Shipping Details</h5>
                              </div>
                              <div class="card-body">
                                <p class="card-text">
                                  {{ $shippingDetails->firstname }}&nbsp;{{ $shippingDetails->lastname }}<br>
                                  {{ $shippingDetails->address }}<br>
                                  {{ $shippingDetails->city }}<br>
                                  {{ $shippingDetails->state }}<br>
                                  {{ $shippingDetails->country }}<br>
                                  {{ $shippingDetails->pincode }}<br>
                                  {{ $shippingDetails->mobile }}
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
                                        @foreach($productDetails as $product)
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
                        <!-- /.row -->
                      </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
