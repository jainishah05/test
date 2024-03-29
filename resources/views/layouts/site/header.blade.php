<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              @guest
                <a href="{{ url('/') }}"><img src="{{ asset('images/home/logo.png') }}" alt="" /></a>
              @endguest
              @auth
                <a href="{{ url('/home') }}"><img src="{{ asset('images/home/logo.png') }}" alt="" /></a>
              @endauth
            </div>
            <div class="btn-group pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  USA
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canada</a></li>
                  <li><a href="#">UK</a></li>
                </ul>
              </div>
              
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  DOLLAR
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canadian Dollar</a></li>
                  <li><a href="#">Pound</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                <li><a href="{{ route('orders') }}"><i class="fa fa-crosshairs"></i> Orders</a></li>
                <li>
                @guest
                  <a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                @else
                  @if(Cart::count() > 0)
                    <span class="desktop-badge">{{ Cart::count()}}</span>
                  @endif
                    <a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                @endguest
                </li>
                @guest
                  <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                @endguest
                @auth
                  <li><a href="{{ route('account') }}"><i class="fa fa-user"></i> Account</a></li>
                  <li>
                    <a class="text-white" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>
                @endauth
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
              @guest
                <li><a href="{{ url('/') }}" class="active">Home</a></li>
              @endguest
              @auth
                <li><a href="{{ url('/home') }}" class="active">Home</a></li>
              @endauth
                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                    <li><a href="{{ route('display.product')}}">Products</a></li>
                    {{-- @foreach($categories as $cat)
                    <li><a href="{{ route('display.product')}}">{{ $cat->category }}</a></li>
                    @endforeach --}}
                    @guest 
                      <li><a href="{{ url('/login') }}">Login</a></li>
                    @endguest 
                    @auth
                      <li>
                        <a class="text-white" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                    @endauth
                  </ul>
                </li> 
                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                      <li><a href="blog.html">Blog List</a></li>
                      <li><a href="blog-single.html">Blog Single</a></li>
                    </ul>
                </li> 
                <li><a href="{{ url('404') }}">404</a></li>
                <li><a href="contact-us.html">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <input type="text" placeholder="Search"/>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
</header><!--/header-->