<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin-home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('label.dashboard') }}</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          	<i class="fas fa-fw fa-folder"></i>
          	<span>{{ __('Manages') }}</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          	<a class="dropdown-item" href="{{ route('cinema.index') }}">{{ __('Cinema') }}</a>
          	<a class="dropdown-item" href="{{ route('room.index') }}">{{ __('Room') }}</a>
          	<a class="dropdown-item" href="{{ route('room_type.index') }}">{{ __('Room Type') }}</a>
          	<a class="dropdown-item" href="{{ route('seat.index') }}">{{ __('Seat') }}</a>
          	<a class="dropdown-item" href="{{ route('seat_type.index') }}">{{ __('Seat Type') }}</a>
          	<a class="dropdown-item" href="{{ route('seat_price.index') }}">{{ __('Seat Price') }}</a>
          	<a class="dropdown-item" href="{{ route('movie.index') }}">{{ __('Moive') }}</a>
          	<a class="dropdown-item" href="{{ route('showtime.index') }}">{{ __('Showtime') }}</a>
        </div>
    </li>
</ul>
