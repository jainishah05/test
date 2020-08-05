@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
  <section id="slider"><!--slider-->
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
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              @foreach($banners as $banner)
                <li data-target="#slider-carousel" data-slide-to="{{ $loop->iteration }}" class="@if($loop->first) active @endif"></li>
              @endforeach
              {{-- <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li> --}}
            </ol>
            
            <div class="carousel-inner">
              @foreach($banners as $banner)
                <div class="item  @if($loop->first) active @endif">
                  <div class="col-sm-6">
                    <h1><span>E</span>-SHOPPER</h1>
                    <h2>{{ $banner->title }}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <button type="button" class="btn btn-default get">Get it now</button>
                  </div>
                  <div class="col-sm-6">
                    <img src="{{ url('../uploads/banners/'.$banner->image) }}" class="girl img-responsive" alt="" />
                    {{-- <img src="images/home/pricing.png"  class="pricing" alt="" /> --}}
                  </div>
               </div>
              @endforeach
            </div>
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->
  
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
                    <h4 class="panel-title"><a href="#">{{ $cat->category }}</a></h4>
                  </div>
                </div>
              @endforeach
            </div><!--/category-products-->
          </div>
        </div>
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Features Items</h2>
            <div id="features-item-carousel" class="carousel slide" data-ride="carousel"> 
              <div class="carousel-inner"> 
                @foreach($Feature_product->chunk(3) as $productChunk)
                  <div class="item @if($loop->first) active @endif"> 
                    @foreach($productChunk as $pro)
                    <div class="col-sm-4">
                      <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ url('../uploads/productimages/'.$pro->product_images[0]->image) }}" alt="" style="width: 60%" height="200" />
                              <h2>{{ $pro->price }}</h2>
                              <p>{{ $pro->name }}</p>
                              <a href="{{ url('/product/'.$pro->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                              <div class="overlay-content">
                                <h2>{{ $pro->price }}</h2>
                                <p>{{ $pro->name }}</p>
                                <a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                              </div>
                            </div>
                        </div>
                        <div class="choose">
                          <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                @endforeach
              </div>
              <a class="left features-item-control" href="#features-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right features-item-control" href="#features-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>  
            </div>
          </div><!--features_items-->
          
          <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                @foreach($categories as $cat)
                  <li><a href="#{{ $cat->id }}" data-toggle="tab">{{ $cat->category }}</a></li>
                @endforeach
                {{-- <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li> --}}
              </ul>
            </div>
            <div class="tab-content">
              @foreach($categories as $cat)
              <div class="tab-pane active in" id="{{ $cat->id }}">
                @foreach($cat->products as $pro)
                  <div class="col-sm-3">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <div class = "slider">
                            @foreach($pro->product_images as $img)
                              <img src="{{ url('../uploads/productimages/'.$img->image) }}" alt="" style="width: 75%" height="200" />
                            @endforeach
                          </div>
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
          </div><!--/category-tab-->
          
        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>
              <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                @foreach($recommended_product->chunk(3) as $productChunk)
                <div class="item @if($loop->first) active @endif"> 
                  @foreach($productChunk as $pro)
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ url('../uploads/productimages/'.$pro->product_images[0]->image) }}" alt="" style="width: 60%" height="160" />
                          <h2>{{ $pro->price }}</h2>
                          <p>{{ $pro->description }}</p>
                          <a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                @endforeach
              </div>
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
  </section>
  <!-- footer -->
  @include('layouts.site.footer')
@endsection