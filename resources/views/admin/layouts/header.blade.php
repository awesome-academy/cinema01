<nav class="navbar navbar-expand navbar-dark bg-dark static-top">    
    <a class="navbar-brand mr-1" href="{{ route('admin-home') }}">
        {{ __('label.hi', ['data' => Auth::user()->name]) }}
    </a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <a href="{{ route('home') }}" class="logo">
        <img alt='logo' src="{{ asset(config('app.image_url') . 'logo.png') }}">
    </a>
    <ul class="navbar-nav ml-auto">                    
        <li class="nav-item dropdown no-arrow">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">{{ __('label.Settings') }}</a>
                <a class="dropdown-item" href="#">{{ __('label.Activity') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
