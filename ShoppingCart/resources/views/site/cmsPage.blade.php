@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
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
			<div class="row" style="margin-bottom: 100px;">
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
					<h2 class="title text-center">{{ $cmsPageDetails->title }}</h2>
					<div>
						<p><?php echo $cmsPageDetails->description ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- footer -->
  @include('layouts.site.footer')
@endsection