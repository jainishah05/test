@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-products-->
			            @foreach($categories as $cat)
			               <div class="panel panel-default">
			                  <div class="panel-heading">
			                    <h4 class="panel-title">
			                      <a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
			                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
			                        {{$cat->category}}
			                      </a>
			                    </h4>
			                  </div>
			                  <div id="{{$cat->id}}" class="panel-collapse collapse">
			                    <div class="panel-body">
			                      <ul>
			                        <li><a href="#">{{$cat->category}}</a></li>
			                      </ul>
			                    </div>
			                </div>
			              </div>
			            @endforeach
			            </div><!--/category-products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ url('../uploads/productimages/'.$productDetail->product_images[0]->image) }}" alt="" style="width: 90%" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								 	@foreach($productImage->chunk(1) as $image)
										<div class="item @if($loop->first) active @endif">
											<div class="col-sm-12">
						                    <div class="product-image-wrapper">
						                      <div class="single-products">
						                        <div class="productinfo text-center">
						                            @foreach($image as $img)
													  <a href=" "><img src="{{ url('../uploads/productimages/'.$img->image) }}" alt="" style="width: 50%" />
													  </a>
													@endforeach
						                        </div>
						                      </div>
						                    </div>
						                  </div>
										</div>
										@endforeach
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{ $productDetail->name }} </h2>
								<p>Product code: {{ $productDetail->product_code }}</p>
								{{-- add to cart form 		 --}}

								<form action="{{ route('cart.store') }}" method="POST">
								{{ csrf_field() }}
								<p style="width: 30%">
									<select name="size" id="selSize" class=" form-group{{ $errors->has('size') ? ' has-error' : '' }}">
										<option value="">Select Size</option>
										@foreach($productDetail->attributes as $sizes)
										@if($sizes->size != "0")
                                            <option value="{{ $productDetail->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
                                        @endif
                                        @endforeach
									</select>
									<small style="color:red;">{{ $errors->first('size') }}</small>
								</p>
								<img src="" alt="" />
								<span>
									<span id="price">{{ $productDetail->price }}</span>
									<input id="hiddenprice" type="hidden" name="price" value="{{ $productDetail->price }}" />
									<span id="getPrice" style="display: none">{{ $productDetail->price }}</span>
									{{-- <label>Quantity:</label> --}}
									<input type="hidden" value="1" name="quantity" />
			                        <input type="hidden" value="{{ $productDetail->id }}" id="id" name="id" />
			                        <input type="hidden" value="{{ $productDetail->name }}" id="name" name="name">
			                        <input type="hidden" value="{{ $productDetail->product_code }}" id="p_code" name="p_code">
			                        <input type="hidden" value="{{ $productDetail->description }}" id="description" name="description">
			                        <input type="hidden" value="{{ $productDetail->product_images[0]->image ?? ''}}" id="img" name="img"> 
			                        @if($message = Session::get('success')) 
			                        <a href="{{ url('/cart') }}" class="btn btn-default add-to-cart"><i class="fa fa-arrow-right" aria-hidden="true"></i>Go to cart</a>
									@else
			                        <button type="submit" class="btn btn-fefault cart">
									<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									@endif
								</span>
			                   	</form>
								{{-- end add to cart form --}}
								
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
								@if($message = Session::get('success')) 
				                    <div class="alert alert-warning"  role="alert">
				                        <span type="button" class="close" style="margin:0" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
				                       {{ $message }}
				                    </div>
				                @endif
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
								<li><a href="#sizeopt" data-toggle="tab">Size Options</a></li>
								<li><a href="#delivery" data-toggle="tab">Delivery</a></li>
								{{-- <li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li> --}}
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="desc" >
								<div class="col-sm-12">
									<p>{{ $productDetail->description }}</p>
								</div>
							</div>
							
							<div class="tab-pane fade" id="sizeopt" >
								@foreach($productDetail->attributes as $sizes)
									<p>{{ $sizes->size }}</p>
								@endforeach
							</div>
							
							<div class="tab-pane fade" id="delivery" >
								<div class="col-sm-12">
									<p>100% Original Products<br>
										Cash On Delivery
									</p>
								</div>
							</div>
							
							{{-- <div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div> --}}
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Similar items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							@foreach($categories as $cat)
								@if($cat->category == $productDetail->categories[0]->category)
								<div class="carousel-inner">
								@foreach($cat->products->chunk(3) as $product)
									<div class="item @if($loop->first) active @endif">
										@foreach($product as $pro)
											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img src="{{ url('../uploads/productimages/'.$pro->product_images[0]->image) }}" alt="" style="width: 60%" height="160" />
															<h2>{{ $pro->price }}</h2>
															<p>{{ $pro->name }}</p>
															<a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								@endforeach
								</div>
								@endif
							@endforeach
							<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>			
						</div>
					</div><!--/recommended_items-->
				</div>
			</div>
		</div>
	</section>
	<!-- footer -->
  @include('layouts.site.footer')
@endsection