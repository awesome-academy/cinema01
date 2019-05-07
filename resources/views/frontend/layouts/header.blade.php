<!-- Banner -->
<div class="banner-top">
    <img alt='top banner' src="{{ asset(config('app.image_url') . '1600x90.png') }}">
</div>
<!-- Header section -->
<header class="header-wrapper">
    <div class="container">
        <!-- Logo link-->
        <a href="{{ route('home') }}" class="logo">
            <img alt='logo' src="{{ asset(config('app.image_url') . 'logo.png') }}">
        </a> 
        <!-- Main website navigation-->
        <nav id="navigation-box">
            <!-- Toggle for mobile menu mode -->
            <a href="" id="navigation-toggle">
                <span class="menu-icon">
                    <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                      <span class="lines"></span>
                    </span>
                </span>
            </a> 
            <!-- Link navigation -->
            <ul id="navigation">
                <li>
                    <a href="#">{{ __('label.book') }}</a>
                </li>
                <li>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="#">{{ __('label.movie') }}</a>
                    <ul class="mega-menu container">
                        <li class="col-md-6 mega-menu__coloum">
                            <a href="{{ route('now-showing') }}"><h4 href='' class="mega-menu__heading">{{ __('label.now') }}</h4></a>
                            @foreach ($new as $data)
                                <div class="gallery-item col-md-6">
                                    <a href='{{ route('movie-detail.show', ['id' => $data->id]) }}' class="gallery-item__image">
                                        <img alt='' src="{{ asset(config('app.image_url') . '424x300.png') }}">
                                    </a>
                                    <a>{{ $data->name }}</a>
                                </div>
                            @endforeach
                        </li>
                        <li class="col-md-6 mega-menu__coloum">
                            <a href="{{ route('comming-soon') }}"><h4 class="mega-menu__heading">{{ __('label.soon') }}</h4></a>
                            @foreach ($soon as $data)
                                <div class="gallery-item col-md-6">
                                    <a href='{{ route('movie-detail.show', ['id' => $data->id]) }}' class="gallery-item__image">
                                        <img alt='' src="{{ asset(config('app.image_url') . '424x300.png') }}">
                                    </a>
                                    <a>{{ $data->name }}</a>
                                </div>
                            @endforeach
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">{{ __('label.support') }}</a>
                </li>
            </ul>
        </nav>
        <!-- Additional header buttons / Auth and direct link to booking-->
        @guest
        <!-- <div class="control-panel"> -->
            <div class="control-panel">
                <a href="{{ route('login') }}" class="btn btn--sign">{{ __('label.login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn--sign">{{ __('Register') }}</a>
                @endif
            </div>         
                  
        @else
            <!-- <div class="control-panel"> -->
            <div class="control-panel">
                <div class="auth auth--home">
                    <div class="auth__show">
                        <span class="auth__image">
                            <img alt="" src="http://placehold.it/31x31">
                            <i class="fas fa-user-circle fa-fw"></i>
                        </span>
                    </div>
                    <a href="#" class="btn btn--sign btn--singin">
                        {{ Auth::user()->name }}
                        
                    </a>
                    <ul class="auth__function">
                        <li><a href="#" class="auth__function-item">{{ __('label.Watchlist') }}</a></li>
                        <li><a href="#" class="auth__function-item">{{ __('label.Booked-tickets') }}</a></li>
                        <li><a href="#" class="auth__function-item">{{ __('label.Profile') }}</a></li>
                        @if (Auth::user()->role == 1)
                            <li><a href="{{ route('admin-home') }}" class="auth__function-item">{{ __('label.Admin') }}</a></li>
                        @endif
                        <li>                            
                            <a class="auth__function-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endguest
    </div>
</header>
