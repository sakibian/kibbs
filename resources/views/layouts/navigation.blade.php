<nav class="navbar navbar-expand-md navbar-light bg-white shadow-md cf">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            <img src="{{ asset('img/kibbs/brand.png') }}"
            alt="Kibbs Logo" width="80" height="80" class="d-inline-block align-text-center">
        </a>
        <button onclick="openNav()" class="navbar-toggler px-3 py-3 rounded-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span><i class="fas fa-align-right fa-1x"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li onclick="openNav()" class="nav-item d-sm-block d-lg-block d-xl-block">
                        <a href="#" class="nav-link px-3 py-3" id="nav-dropdown">
                            <span><i class="fas fa-align-right fa-2x"></i></span>
                        </a>
                    </li>
                @else
                    <li onclick="openNav()" class="nav-item">
                        <a href="#" class="nav-link px-3" id="nav-dropdown">
                            <span><i class="fas fa-align-right"></i></span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="sidebar-div">
                <!-- Left Side Of Navbar -->
                <ul class="sidebar-ul">
                    <!-- Authentication Links -->
                    @guest
                        @if (Request::path() == '/')
                            <li class="sidebar-item">
                                <a class="sidebar-link" id="welcome" href="{{ URL('/') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#booking">{{ __('Bookings') }}</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#features">{{ __('Features') }}</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#about">{{ __('About') }}</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ URL('/') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endif
                    @else
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ URL('/') }}">
                                <i class="far fa-user"></i> {{ Auth::user()->name }}
                                @if (Auth::user()->is_admin == 1)
                                    <small class="ml-1"> (Admin)</small>
                                @endif
                            </a>
                        </li>
                        <hr>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ URL('/') }}">{{ __('Home') }}</a>
                        </li>
                        @if (Auth::user()->is_admin == 1)
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.bookings.index') }}">{{ __('Admin Panel') }}</a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('user.bookings.index') }}">{{ __('Booking') }}</a>
                        </li>
                        @endif
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('kibbsChat') }}">{{ __('Kibbs Messages') }}</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

