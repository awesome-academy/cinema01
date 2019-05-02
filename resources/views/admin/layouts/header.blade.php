<nav class="navbar navbar-expand navbar-dark bg-dark static-top">    
    @guest
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ __('label.hi', ['data' => 'Admin']) }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                 <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                 <!-- Authentication Links -->
                    <li class="nav-item">
                         <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    @else
        <a class="navbar-brand mr-1" href="{{ url('/home') }}">
            {{ __('label.hi', ['data' => 'Admin']) }}
        </a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{ __('label.search_for') }}" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto ml-md-0">                    
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
        <!-- end ul -->
    @endguest
</nav>
