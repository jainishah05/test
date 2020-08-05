@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>	
	<section>
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
					@if(isset($categoryProduct[0]))
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{{ $categoryProduct[0]->category }}</h2>
						@foreach($categoryProduct[0]->products as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										@foreach($pro->product_images as $img)
											<img src="{{ url('../uploads/productimages/'.$img->image) }}" alt="" style="width: 60%" height="200" />
											@break
										@endforeach
										<h2>{{ $pro->price }}</h2>
										<p>{{ $pro->name }}</p>
										<a href="{{url('/product/'.$pro->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
				</div>
				@else
					<div class="col-sm-12">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($Feature_product as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										@foreach($pro->product_images as $img)
											<img src="{{ url('../uploads/productimages/'.$img->image) }}" alt="" style="width: 60%" height="200" />
											@break
										@endforeach
										<h2>{{ $pro->price }}</h2>
										<p>{{ $pro->name }}</p>
										<a href="{{url('/product/'.$pro->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{ $pro->price }}</h2>
											<p>{{ $pro->name }}</p>
											<a href="{{url('/product/'.$pro->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
								
						{{-- <ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul> --}}
						{{-- The links method will render/provide the links to the rest of the pages in the result set. Each of these links will already contain the proper page query string variable. --}}
					</div><!--features_items-->
					{{-- pagination --}}
					{{ $Feature_product->links() }} 
				</div>
				
				@endif
			</div>
		</div>
	</section>
	<!-- footer -->
  @include('layouts.site.footer')
@endsection