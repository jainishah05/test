@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
  <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order Review</li>
				</ol>
			</div><!--/breadcrums-->
			<h2 class="title text-center">Address Details</h2>
            <form action="">
                <div class="row">
                    @if($message = Session::get('flash_message_success')) 
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                            {{ $message }}
                        </div>
                    @endif
                    @if($message = Session::get('flash_message_error')) 
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                            {{ $message }}
                        </div>
                    @endif
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="Billing">
                            <h2>Billing Details</h2>
                            <div class="form-group">
                              {{ $userDetails->firstname }}
                            </div>

                            <div class="form-group">
                              {{ $userDetails->lastname }}
                            </div>

                            <div class="form-group">
                                {{ $userDetails->address }}
                            </div>
                               
                            <div class="form-group">
                                {{ $userDetails->city }}
                            </div>  
                            	
                            <div class="form-group">
                                {{ $userDetails->state }}
                            </div> 
                                
                            <div class="form-group">
                                {{ $userDetails->country}}   
                            </div> 
                            	
                            <div class="form-group">
                                {{ $userDetails->pincode }}
                            </div>     
                            	
                            <div class="form-group">
                                {{ $userDetails->mobile }}
                            </div>  
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <h2></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="Shipping">
                            <h2>Shipping Details</h2>
                            <div class="form-group">
                                {{ $shippingDetails->firstname }}
                            </div> 

                            <div class="form-group">
                                {{ $shippingDetails->lastname }}
                            </div> 
                            
                            <div class="form-group">
                                {{ $shippingDetails->address }}
                            </div>  
                             
                            <div class="form-group">
                                {{ $shippingDetails->city }}
                            </div>
                            
                            <div class="form-group">
                                {{ $shippingDetails->state }}
                            </div>
                            
                            <div class="form-group">
                               {{ $shippingDetails->country }} 
                            </div> 
                            
                            
                            <div class="form-group">
                                {{ $shippingDetails->pincode }}
                            </div>   
                            
                            <div class="form-group">
                                {{ $shippingDetails->mobile }}
                            </div> 
                        </div>
                    </div>
                </div>
            </form>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@forelse($cartCollection as $item)
						<tr>
							<td class="cart_product">
								<a href="" ><img src="{{ url('../uploads/productimages/'.$item->options->image) }}" alt="" width="90" height="100" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $item->name }}</a></h4>
								<p>Product Code: {{ $item->options->p_code }}</p>
								<p>{{ $item->options->description }}</p>
								<p>Size: {{ $item->options->size[1] }}</p>
							</td>
							<td class="cart_price">
								<p>{{ $item->price }}</p>
							</td>
							<td class="cart_description">
                                <div class="cart_quantity_button">
									<p>{{ $item->qty }}</p>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ $item->price*$item->qty }}</p>
							</td>
						</tr>
						@empty 
						<tr>
							<td colspan="4" class="text-center"><h4>No Product(s) In Your Cart</h4><td>
						</tr>
						@endforelse
						<tr>
							<td colspan="4">&nbsp;</td>
							<td>
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>{{ Cart::subTotal() }}</td>
									</tr>
									{{-- <tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr> --}}
									<tr>
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr class="shipping-cost">
										<td>Discount Amount</td>
										@if(Session::has('couponDiscount'))
										<td>{{ Session::get('couponDiscount') }}</td>
										@else
										<td>No Applied <br>Coupons in cart!<br>
										Want to apply?<br>
										<a href="{{ url('/cart') }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back to cart!</a>
										</td>
										@endif								
									</tr>
									<tr>
										<td>Total</td>
										<td><span>{{ $grand_total = str_replace(' ', '', Cart::subtotal(0,' ',' '))-(Session::get('couponDiscount')) }}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<form class="paymentForm" id="paymentForm" action="{{ route('placeOrder') }}" method="post">
			@csrf
				<input type="hidden" name="grand_total" value="{{ $grand_total }}">
				<input type="hidden" name="coupon_amount" value="{{ Session::get('couponDiscount') }}">
				<input type="hidden" name="coupon_code" value="{{ Session::get('couponCode') }}">
				<div class="payment-options">
					<span>
						<label><strong>Select Payment Method: </strong></label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="COD" value="COD"> COD</label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="Paypal" value="Paypal"> Paypal</label>
					</span>
					<button type="submit" class="btn btn-default" onclick="return selectPaymentMethod(); ">Place Order</button>  
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->
	<!-- footer -->
  @include('layouts.site.footer')
@endsection