@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
  	@auth
	<section id="cart_items">
		<div class="container">
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
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ route('home')}}">Home</a></li>
				  <li><a href="{{ route('orders')}}">Orders</a></li>
				  <li class="active">{{ $orderDetails->id }}</li>
				</ol>
			</div>
		</div>
	</section> 

	<section id="order_items">
		<div class="container">
			{{-- <div class="heading">
				
			</div> --}}
			<div class="table-responsive order_info">
				<table class="table table-bordered">
					<thead>
						<tr class="order_menu">
							<td>Product Code</td>
							<td>Product Image</td>
							<td>Product Name</td>
							<td>Product Size</td>
							<td>Product Price</td>
							<td>Product Qty</td>
						</tr>
					</thead>
					<tbody>
						@forelse($orderDetails->orders as $pro)
						<tr>
							<td class="order_description">
			                    <p>{{ $pro->product_code }}</p>
							</td>
							<td class="order_description">
								<a href=""><img src="{{ url('../uploads/productimages/'.$pro->product_image) }}" alt="" width="70" height="100" /></a>
							</td>
							<td class="order_description">
								<p>{{ $pro->product_name }}</p>
							</td>
							<td class="order_description">
								<p>{{  $pro->product_size }}</p>
							</td>
							<td class="order_description">
								<p>{{  $pro->product_price }}</p>
							</td>
							<td class="order_description">
								<p>{{  $pro->product_qty }}</p>
							</td>
						</tr>
						@empty 
						<tr><td colspan="6" class="text-center"><h4>No Order History</h4><td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</section>
	@endauth

	<!-- footer -->
  @include('layouts.site.footer')
@endsection
