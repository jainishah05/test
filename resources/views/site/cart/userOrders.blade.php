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
				  <li class="active">Orders</li>
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
							<td>Product code</td>
							<td>Ordered Products</td>
							<td>Payment Method</td>
							<td>Grand Total</td>
							<td>Created On</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
						@forelse($orders as $order)
						<tr>
							<td class="order_description">
			                    <p>{{ $order->id }}</p>
							</td>
							<td class="order_description">
							@foreach($order->orders as $pro)
								<p>{{ $pro->product_code }}</p>
							@endforeach
							</td>
							<td class="order_description">
								<p>{{ $order->payment_method }}</p>
							</td>
							<td class="order_description">
								<p>{{ $order->grand_total }}</p>
							</td>
							<td class="order_description">
								<p>{{ $order->created_at }}</p>
							</td>
							<td class="order_description">
								<a href="{{ url('/orders/'.$order->id) }}">Product Details</a>
							</td>
						</tr>
						@empty 
						<tr><td colspan="6" class="text-center"><h4>No Order History</h4></td>
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
