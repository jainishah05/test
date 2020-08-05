@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
  <section id="form"><!--form-->
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->
           <h2 class="title text-center">Addresses</h2>
            <form action="{{ route('checkout') }}" method="post">
            @csrf
                <div class="row">
                    @if($message = Session::get('flash_message_success')) 
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                            {{ $message }}
                        </div>
                    @endif
                    @if($message = Session::get('flash_message_error')) 
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                            {{ $message }}
                        </div>
                    @endif
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="Billing">
                            <h2>Bill To</h2>
                            <div class="form-group">
                              <input type="text" id="billing_firstname" name="billing_firstname" class="form-control" placeholder="Billing FirstName" value="{{ $userDetails->firstname }}" />
                            </div>

                            <div class="form-group">
                              <input type="text" id="billing_lastname" name="billing_lastname" class="form-control" placeholder="Billing LastName" value="{{ $userDetails->lastname }}" />
                            </div>

                            <div class="form-group">
                                <textarea name="billing_address" id="billing_address" class="form-control" placeholder="Billing Address" rows="3" cols="50">{{ $userDetails->address }}</textarea>
                            </div>
                               
                            <div class="form-group">
                                <input type="text" value="{{ $userDetails->city }}" name="billing_city" id="billing_city" class="form-control"  placeholder="Billing City" />
                            </div>  
                            	
                            <div class="form-group">
                                <input type="text" value="{{ $userDetails->state }}" name="billing_state" id="billing_state" class="form-control"  placeholder="Billing State" />
                            </div> 
                                
                            <div class="form-group">
                                <select name="billing_country" id="billing_country" class="form-control" >
                                    <option value="" selected disabled="">--Select Country--</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->country_name
                                    }}" @if($country->country_name == $userDetails->country ) selected @endif>{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            	
                            <div class="form-group">
                                <input type="text" name="billing_pincode" id="billing_pincode" value="{{ $userDetails->pincode }}" class="form-control"  placeholder="Billing Pincode" />
                            </div>     
                            	
                            <div class="form-group">
                                <input type="text" name="billing_mobile" id="billing_mobile" value="{{ $userDetails->mobile }}" class="form-control"  placeholder="Billing Mobile" />
                            </div>  

                            <div class="checkbox">
                              <label><input type="checkbox" id="billtoship"> Shipping Address same as Billing Address</label>
                            </div>  
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <h2></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="Shipping">
                            <h2>Ship To</h2>
                            <div class="form-group">
                                <input type="text" name="shipping_firstname" id="shipping_firstname" class="form-control" placeholder="Shipping Name" value="{{ isset($shippingDetails->firstname) ? $shippingDetails->firstname : ''}}" />
                            </div> 

                            <div class="form-group">
                                <input type="text" name="shipping_lastname" id="shipping_lastname" class="form-control" placeholder="Shipping Name" value="{{ isset($shippingDetails->lastname) ? $shippingDetails->lastname : ''}}" />
                            </div> 
                            
                            <div class="form-group">
                                <textarea value="" id="shipping_address" name="shipping_address" class="form-control" placeholder="Shipping Address" rows="3" cols="50">{{ isset($shippingDetails->address) ? $shippingDetails->address : ''}}</textarea>
                            </div>  
                             
                            <div class="form-group">
                                <input type="text" value="{{ isset($shippingDetails->city) ? $shippingDetails->city : ''}}" name="shipping_city" id="shipping_city" class="form-control"  placeholder="Shipping City" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" value="{{ isset($shippingDetails->state) ? $shippingDetails->state : ''}}" name="shipping_state" id="shipping_state" class="form-control"  placeholder="Shipping State" />
                            </div>
                            
                            <div class="form-group">
                               <div class="form-group">
                                <select name="shipping_country" id="shipping_country" class="form-control" >
                                    <option value="" selected disabled="">--Select Country--</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->country_name
                                    }}" @if(!empty($shippingDetails->country))@if($country->country_name == $shippingDetails->country ) selected @endif @endif>{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            </div> 
                            
                            <div class="form-group">
                                <input type="text" name="shipping_pincode" id="shipping_pincode" value="{{ isset($shippingDetails->pincode) ? $shippingDetails->pincode : '' }}" class="form-control"  placeholder="Shipping Pincode" />
                            </div>   
                            
                            <div class="form-group">
                                <input type="text" name="shipping_mobile" id="shipping_mobile" value="{{ isset($shippingDetails->mobile) ? $shippingDetails->mobile : ''}}" class="form-control"  placeholder="Shipping Mobile" />
                            </div> 
                            <button type="submit" class="btn btn-default">Checkout</button>  
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section><!--/form-->
  <!-- footer -->
  @include('layouts.site.footer')
@endsection