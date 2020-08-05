@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
  	@auth
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ route('home')}}">Home</a></li>
				  <li class="active">Thanks</li>
				</ol>
			</div>
		</div>
	</section> 

	<section id="do_action">
		<div class="container">
			<div class="heading" align="center">
				<h3>YOUR ORDER HAS BEEN PLACED!</h3>
				<p>Your order number is {{ Session::get('order_id') }} and total payable amount is INR {{ Session::get('grand_total') }}</p>
				<a href="{{ route('home') }}" class="btn btn-default cart">HOME PAGE</a>
			</div>
		</div>
	</section>
	@endauth

	<!-- footer -->
  @include('layouts.site.footer')
@endsection

<?php
	Session::forget('order_id');
	Session::forget('grand_total');
?>