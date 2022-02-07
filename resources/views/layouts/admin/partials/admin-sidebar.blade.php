<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile">
            <h6 class="mt-3 f-14 f-w-600">{{Auth::user()->name}}</h6></a>
{{--        <p class="mb-0 font-roboto">{{Auth::user()->roleID}}</p>--}}
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li>
                        <a class="nav-link  {{ prefixActive('/blog') }}" href="{{route('sales')}}"><i data-feather="home"></i><span>Sales</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/admin') }}" href="javascript:void(0)"><i data-feather="archive"></i><span>Products</span></a>
                        <ul class="nav-submenu menu-content"  style="display: {{ prefixBlock('/admin') }};">
                            <li><a href="{{ route('add-products') }}" class="{{routeActive('add-products')}}">Add Products</a></li>
                            <li><a href="{{ route('sell-products') }}" class="{{routeActive('sell-products')}}">Sell Products</a></li>
                            <li><a href="{{ route('list-products') }}" class="{{routeActive('list-products')}}">List Products</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
