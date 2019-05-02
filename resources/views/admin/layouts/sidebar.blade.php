<!-- Sidebar -->
<ul class="sidebar navbar-nav">
	<li class="nav-item active">
		<a class="nav-link" href="{{ route('admin-home') }}">
		  	<i class="fas fa-fw fa-tachometer-alt"></i>
		  	<span>{{ __('label.dashboard') }}</span>
		</a>
	</li>
	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('label.Pages') }}</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">{{ __('label.Login-Screens') }}</h6>
            <a class="dropdown-item" href="login.html">{{ __('label.Login') }}</a>
            <a class="dropdown-item" href="register.html">{{ __('label.Register') }}</a>
            <a class="dropdown-item" href="forgot-password.html">{{ __('label.Forgot-Password') }}</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">{{ __('label.Other-Pages') }}:</h6>
         </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>{{ __('label.Charts') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
        	<i class="fas fa-fw fa-table"></i>
            <span>{{ __('label.Tables') }}</span>
        </a>
    </li>
</ul>
