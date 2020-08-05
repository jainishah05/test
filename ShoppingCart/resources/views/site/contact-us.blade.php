@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
	<section>
		<div id="contact-page" class="container">
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
    	<div class="bg">   	
    		<div class="row"> 
    			<div class="col-sm-3">
		          <div class="left-sidebar">
		            <h2>Category</h2>
		            <div class="panel-group category-products" id="accordian"><!--category-products-->
		            @foreach($categories as $cat)
		              <div class="panel panel-default">
		                  <div class="panel-heading">
		                    <form method="post" action="{{ route('display.product') }}">
		                      @csrf
		                          <h4 class="panel-title">
		                            <input type="hidden" name="category_id" value="{{$cat->id}}">
		                            <input type="submit" class="input-submit" value=" {{$cat->category}}" />
		                              <span class="badge pull-right"><i class="fa fa-plus"></i></span>
		                          </h4>
		                        </div>
		                      </div>
		                  </form>
		            @endforeach
		            </div><!--/category-products-->
		          </div>
		        </div> 	
	    		<div class="col-sm-9 padding-right">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Contact <strong>Us</strong></h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="POST" action="{{ route('contactUs') }}">
				    	@csrf
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control"placeholder="Name">
				                @error('name')
	                                <span class="invalid-feedback" role="alert" style="color: red">
	                                    {{ $message }}
	                                </span>
	                            @enderror
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" placeholder="Email">
				                @error('email')
	                                <span class="invalid-feedback" role="alert" style="color: red">
	                                    {{ $message }}
	                                </span>
	                            @enderror
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" placeholder="Subject">
				                @error('subject')
	                                <span class="invalid-feedback" role="alert" style="color: red">
	                                    {{ $message }}
	                                </span>
	                            @enderror
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				                @error('message')
	                                <span class="invalid-feedback" role="alert" style="color: red">
	                                    {{ $message }}
	                                </span>
	                            @enderror
				            </div>                        
				            <div class="form-group col-md-12">
				                <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		{{-- <div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    	 --}}		
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	</section>
	<!-- footer -->
  @include('layouts.site.footer')
@endsection