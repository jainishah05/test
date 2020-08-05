@extends('layouts.site.layout')
@section('content')
  <!-- header -->
  @include('layouts.site.header')
  <section id="form"><!--form-->
        <div class="container">
            @if($message = Session::get('flash_message_error')) 
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                        {{ $message }}
                    </div>
                @endif
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        {{-- <form action="#">
                            <input type="text" placeholder="Name" />
                            <input type="email" placeholder="Email Address" />
                            <span>
                                <input type="checkbox" class="checkbox"> 
                                Keep me signed in
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form> --}}
                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- <div class="form-group row"> --}}
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            {{-- <div class="col-md-6"> --}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                                
                            {{-- </div>
                        </div> --}}

                        {{-- <div class="form-group row"> --}}
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            {{-- <div class="col-md-6"> --}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                                
                                <br>
                            {{-- </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check"> --}} 
                                    <span>
                                        <input class="checkbox"{{-- class="form-check-input" --}} type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label {{-- class="form-check-label" --}} for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </span>
                                {{-- </div>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4"> --}}
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            {{-- </div>
                        </div> --}}
                    </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        {{-- <form action="#">
                            <input type="text" placeholder="Name"/>
                            <input type="email" placeholder="Email Address"/>
                            <input type="password" placeholder="Password"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form> --}}
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label> --}}

                            {{-- <div class="col-md-6"> --}}
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" autocomplete="firstname" autofocus placeholder="First Name">
                                @error('firstname')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                                
                            {{-- </div>
                        </div>
 --}}
                        {{-- <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus placeholder="Last Name">
                                @error('lastname')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                                
                            {{-- </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                       {{ $message }}
                                    </span>
                                @enderror
                                
                            {{-- </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                                
                            {{-- </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6"> --}}
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                            {{-- </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
  <!-- footer -->
  @include('layouts.site.footer')
@endsection