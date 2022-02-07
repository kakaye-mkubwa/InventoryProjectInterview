<div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <div class="logo-wrapper"><a href="{{ route('index') }}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a></div>
      <div class="dark-logo-wrapper"><a href="{{ route('index') }}"><img class="img-fluid" src="{{asset('assets/images/logo/dark-logo.png')}}" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">    </i></div>
    </div>
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <li class="onhover-dropdown p-0">
            @if(\Illuminate\Support\Facades\Auth::check())
                <a class="btn btn-primary-light" href="{{route('logout')}}"><i data-feather="log-out"></i>Log out</a>
            @else
                <a class="btn btn-primary" href="{{route('register')}}"><i data-feather="user"></i>Register</a>
                <a class="btn btn-primary" href="{{route('login')}}"><i data-feather="log-in"></i>Login</a>
            @endif

        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
