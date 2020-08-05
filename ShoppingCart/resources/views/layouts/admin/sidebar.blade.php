 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ asset('admin') }}" class="nav-link @if(URL::current() == asset('admin'))active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ asset('admin/config') }}" class="nav-link {{ (request()->is('admin/config*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Configuration
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/user') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-user"></i>
              <p>
               Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/banner') }}" class="nav-link {{ (request()->is('admin/banner*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>
              Banners
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/category') }}" class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-tags"></i>
              <p>
              Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/product') }}" class="nav-link {{ (request()->is('admin/product*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-shopping-bag"></i>
              <p>
              Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/attribute') }}" class="nav-link {{ (request()->is('admin/attribute*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-th-large"></i>
              <p>
              Attributes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/coupon') }}" class="nav-link {{ (request()->is('admin/coupon*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-tag fa-lg"></i>
              <p>
              Coupons
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/order') }}" class="nav-link {{ (request()->is('admin/order*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tshirt"></i>
              <p>
              Orders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/cms-page') }}" class="nav-link {{ (request()->is('admin/cms-page*')) ? 'active' : '' }}">
              <i class="nav-icon fab fa-blogger-b"></i>
              <p>
              CMS pages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/contact-us') }}" class="nav-link {{ (request()->is('admin/contact-us*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
              Contact Us
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/email-template') }}" class="nav-link {{ (request()->is('admin/email-template*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-file-code"></i>
              <p>
              Email Templates
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('admin/reports/report') }}" class="nav-link {{ (request()->is('admin/reports*')) ? 'active' : '' }}">
              <i class="nav-icon far fa-chart-bar"></i>
              <p>
               Reports
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ asset('admin/news-letter') }}" class="nav-link {{ (request()->is('admin/news-letter*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-file"></i>
              <p>
              Newsletters
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              {{ __('Logout') }}
              <!-- <p class="text">Logout</p> -->
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
             </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>