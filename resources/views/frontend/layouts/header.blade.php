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
                                    <a href='{{ route('movie.show', ['id' => $data->id]) }}' class="gallery-item__image">
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
                                    <a href='{{ route('movie.show', ['id' => $data->id]) }}' class="gallery-item__image">
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
        <div class="control-panel">
            <a href="#" class="btn btn--sign">{{ __('label.login') }}</a>
        </div>
    </div>
</header>
