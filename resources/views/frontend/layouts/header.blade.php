<!-- Banner -->
<div class="banner-top">
    <img alt='top banner' src="{{ asset(config('app.image_url') .'1600x90.png') }}">
</div>
<!-- Header section -->
<header class="header-wrapper">
    <div class="container">
        <!-- Logo link-->
        <a href="" class="logo">
            <img alt='logo' src="{{ asset(config('app.image_url') .'logo.png') }}">
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
                    <a href="#">{{ __('label.book') }}</a>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="#">{{ __('label.movie') }}</a>
                    <ul class="mega-menu container">
                        <li class="col-md-3 mega-menu__coloum">
                            <h4 class="mega-menu__heading">{{ __('label.now') }}</h4>
                            <ul class="mega-menu__list">   
                                <li class="mega-menu__nav-item"><a href="#">{{ __('label.now') }}</a></li>
                                <li class="mega-menu__nav-item"><a href="#">{{ __('label.now') }}</a></li>
                            </ul>
                        </li>
                        <li class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                            <ul class="mega-menu__list">
                                <li class="mega-menu__nav-item"><a href="#">{{ __('label.now') }}</a></li>
                                <li class="mega-menu__nav-item"><a href="#">{{ __('label.now') }}</a></li>
                            </ul>
                        </li>
                        <li class="col-md-3 mega-menu__coloum">
                            <h4 class="mega-menu__heading">{{ __('label.soon') }}</h4>
                            <ul class="mega-menu__list">
                                <li class="mega-menu__nav-item"><a href="#">{{ __('label.soon') }}</a></li>
                                <li class="mega-menu__nav-item"><a href="#">{{ __('label.soon') }}</a></li>
                            </ul>
                        </li>
                        <li class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                            <ul class="mega-menu__list">
                                <li class="mega-menu__nav-item"><a href="#">{{ __('label.soon') }}</a></li>
                                <li class="mega-menu__nav-item"><a href="#">{{ __('label.soon') }}</a></li>
                            </ul>
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
