@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
  <section id="form"><!--form-->
        <div class="container">
           <h2 class="title text-center">User Profile</h2>
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
                    <div class="login-form"><!--Update Account-->
                        <h2>Update Account</h2>
                        <form method="POST" name="accountform" action="{{ route('account') }}">
                        @csrf
                        	<input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ $userDetails->firstname }}" />
                            @error('firstname')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        	<input type="text" name="lastname" class="form-control"  placeholder="Last Name" value="{{ $userDetails->lastname }}" />
                            @error('lastname')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        	<textarea value="" name="address" class="form-control" placeholder="Address" rows="3" cols="50">{{ $userDetails->address }}</textarea>
                            @error('address')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        	<input type="text" value="{{ $userDetails->city}}" name="city" class="form-control"  placeholder="City" />
                            @error('city')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        	<input type="text" value="{{ $userDetails->state }}" name="state" class="form-control"  placeholder="State" />
                            @error('state')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        	<select name="country" class="form-control" >
                        		<option value="">--Select Country--</option>
                        		@foreach($countries as $country)
                        		<option value="{{ $country->country_name
                        		}}" @if($country->country_name == $userDetails->country ) selected @endif>{{ $country->country_name }}</option>
                        		@endforeach
                        	</select>
                            @error('country')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        	<input type="text" name="pincode" value="{{ $userDetails->pincode }}" class="form-control"  placeholder="Pincode" />
                            @error('pincode')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        	<input type="text" name="mobile" value="{{ $userDetails->mobile }}" class="form-control"  placeholder="Mobile" />
                            @error('mobile')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        	<button type="submit" class="btn btn-default">Update</button>
                    	</form>
                    </div><!--/Update Account-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--Update Password-->
                        <h2>Update Password</h2>
                       
                        <form method="post" action="{{ route('updatePwd') }}">
                        @csrf

                        <input id="current_password" type="password" class="form-control" name="current_password" placeholder="Current Password">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                {{ $message }}
                            </span>
                        @enderror
                        <span id="chk_pwd"></span>
                        <input id="new_password" type="password" class="form-control" name="new_password" placeholder="New Password">
                        @error('new_password')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                {{ $message }}
                            </span>
                        @enderror

                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                        @error('confirm_password')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                {{ $message }}
                            </span>
                        @enderror

                        <button type="submit" class="btn btn-default">Update</button> 
                        </form>
                    </div><!--/Update Password-->
                </div>
            </div>
        </div>
    </section><!--/form-->
  <!-- footer -->
  @include('layouts.site.footer')
@endsection