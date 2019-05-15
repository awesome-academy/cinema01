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
            <a href="#" id="navigation-toggle">
                <span class="menu-icon">
                    <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                      <span class="lines"></span>
                    </span>
                </span>
            </a> 
            <!-- Link navigation -->
            <ul id="navigation">
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="#">{{ __('label.movie') }}</a>
                    <ul class="mega-menu container">
                        <li class="col-md-6 mega-menu__coloum">
                            <a href="{{ route('now-showing') }}"><h4 href='' class="mega-menu__heading">{{ __('label.now') }}</h4></a>
                            @foreach ($new as $data)
                                <div class="gallery-item col-md-6">
                                    <a href='{{ route('movie-detail.show', ['id' => $data->id]) }}' class="gallery-item__image">
                                        <img class="resize-menu-movie" alt='' src="{{ asset(config('app.upload_cover') . $data->image) }}">
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
                                        <img class="resize-menu-movie" alt='' src="{{ asset(config('app.upload_cover') . $data->image) }}">
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
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown"> 
                        {{ Auth::user()->name }}
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile.index') }}">{{ __('label.profile') }}</a></li>
                        @if (Auth::user()->role == 1)
                            <li><a href="{{ route('admin-home') }}">{{ __('label.Admin') }}</a></li>
                        @endif
                        <li>                            
                            <a href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
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
