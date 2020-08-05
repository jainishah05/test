@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
  	@guest
  		<div class="container text-center">
			<div class="content-404">
				<img src="{{ asset('images/cart/cart-empty.jpg') }}" class="img-responsive" width="30%" alt="" />
				<p><b>OPPS! </b>Looks like you're not logged in!</p>
				<p>Login to add items in your cart or click on the logo to return to our home page.</p>
				<h2><a href="{{ route('login') }}">Login</a></h2>
			</div>
        <br>
	</div>
  	@endguest
  	@auth
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ route('home')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			@if($message = Session::get('delete_success')) 
		        <div class="alert alert-info alert-danger" role="alert">
		            <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		            {{ $message }}
		       	</div>
		    @endif
		    @if($message = Session::get('flash_message_error')) 
	            <div class="alert alert-info alert-danger" role="alert">
	                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
	                {{ $message }}
	            </div>
	        @endif
		    @if($message = Session::get('flash_message_success')) 
		        <div class="alert alert-success alert-dismissible" role="alert">
		            <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		            {{ $message }}
		        </div>
		    @endif
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
			                    <a href=""><img src="{{ url('../uploads/productimages/'.$item->options->image) }}" alt="" width="70" height="100" /></a>
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
							<td class="cart_quantity">
								<form action="{{route('cart.update',$item->rowId)}}" method="post" role="form">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="proId" value="{{$item->id}}"/>
                                    <input type="hidden" name="user_id" value="{{ $item->user_id}}"/>
                                    <div class="cart_quantity_button">
										<a><input type="submit" class="btn cart_quantity_up" value="+" /> </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2" />
										@if($item->qty > 1)
										<a class="btn cart_quantity_down" href="{{route('cart.edit',$item->rowId)}}"> - </a>
										@endif
									</div>
                                </form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" id="price">{{ $item->qty*$item->price }}</p>
								<span id="getPrice" style="display: none">{{ $item->qty*$item->price }}</span>
							</td>
							
							<td class="cart_delete">
								<form method="POST" action="{{ url('/cart' . '/' . $item->rowId) }}" accept-charset="UTF-8" style="display:inline">
		                            {{ method_field('DELETE') }}
		                            {{ csrf_field() }}
		                            <button type="submit" class="btn btn-default deletecart" href="" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-times"></i></button>
		                        </form>													
							</td>
						</tr>
						@empty 
						<tr><td colspan="4" class="text-center"><h4>No Product(s) In Your Cart</h4><td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code,you want to use.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<label>Use Coupon Code</label>
								<form action="{{ url('cart/apply-coupon') }}"  method="post">
								{{ csrf_field() }}
									<input type="text" name="coupon_code">
									<input type="submit" value="Apply" class="btn btn-default apply">
								</form>
							</li>
							<br>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
		                    @if($message = Session::get('flash_message_success')) 
		                    	<li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
								<li>Coupon Discount <span>{{ Session::get('couponAmount') ?? '' }}</span></li>
								@if(Session::has('couponAmount'))
									{{ Session::put('couponDiscount',Session::get('couponAmount')) }}
								@endif
								{{-- <li>Eco Tax <span>{{ Cart::tax() }}</span></li> --}}
								<li>Shipping Cost <span>free</span></li>
								<li>Grand Total <span>{{ str_replace(' ', '', Cart::subtotal(0,' ',' '))-(Session::get('couponAmount')) }}</span></li>
							@else
								<li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
								<li>Shipping Cost <span>free</span></li>
								<li>Grand Total <span>{{ Cart::pricetotal() }}</span></li>
							@endif
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{ route('checkout')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	@endauth

	<!-- footer -->
  @include('layouts.site.footer')
@endsection