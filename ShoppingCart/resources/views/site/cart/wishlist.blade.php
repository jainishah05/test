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
				  <li class="active">Wishlist</li>
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
						@forelse($wishlistCollection as $item)
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
								<p>{{ $item->qty }}</p> 			
							</td>
							<td class="cart_total">
								<p class="cart_total_price" id="price">{{ $item->qty*$item->price }}</p>
								<span id="getPrice" style="display: none">{{ $item->qty*$item->price }}</span>
							</td>
							<td class="cart_delete">
								<form method="POST" action="{{ route('wishlistToCart') }}" accept-charset="UTF-8" style="display:inline">
		                        {{ csrf_field() }}
		                        	<input id="id" type="hidden" name="id" value="{{ $item->id }}" />
		                        	<input id="rowId" type="hidden" name="rowId" value="{{ $item->rowId }}" />
		                            <input id="price" type="hidden" name="price" value="{{ $item->price }}" />
		                            <input id="size" type="hidden" name="size" value="{{ $item->options->size[1] }}" />
									<input type="hidden" value="{{ $item->qty }}" name="quantity" />
			                        <input type="hidden" value="{{ $item->id }}" id="id" name="id" />
			                        <input type="hidden" value="{{ $item->name }}" id="name" name="name">
			                        <input type="hidden" value="{{ $item->options->p_code }}" id="p_code" name="p_code">
			                        <input type="hidden" value="{{ $item->options->description }}" id="description" name="description">
			                        <input type="hidden" value="{{ $item->options->image }}" id="img" name="img">
		                            <button type="submit" class="btn btn-default deletecart"><i class="fa fa-shopping-cart"></i>
										Add to cart</button>
								</form>
								<form method="POST" action="{{ url('/wishlist' . '/' . $item->rowId) }}" accept-charset="UTF-8" style="display:inline">
		                            {{ csrf_field() }}
		                            <button type="submit" class="btn btn-default deletecart" href="" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-times"></i></button>
		                        </form>											
							</td>
						</tr>
						@empty 
						<tr><td colspan="4" class="text-center"><h4>No Product(s) In Your Wishlist</h4><td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	@endauth

	<!-- footer -->
  @include('layouts.site.footer')
@endsection