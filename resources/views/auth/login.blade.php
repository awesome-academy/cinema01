@extends('frontend.layouts.master')
@section('content')
    <!-- Search bar -->
    <div class="search-wrapper">
        <div class="container container--add">
            <form id='search-form' method='get' class="search">
                <input type="text" class="search__field" placeholder="Search">
                <select name="sorting_item" id="search-sort" class="search__sort" tabindex="0">
                    <option value="1" selected='selected'>{{ __('label.By-title') }}</option>
                    <option value="2">{{ __('label.By-year') }}</option>
                    <option value="3">{{ __('label.By-producer') }}</option>
                    <option value="4">{{ __('label.By-title') }} </option>
                    <option value="5">{{ __('label.By-year') }}r</option>
                </select>
                <button type='submit' class="btn btn-md btn--danger search__button">{{ __('label.Search-a-movie') }}</button>
            </form>
        </div>
    </div>
        
    <!-- Main content -->
    <form class="login"  method="POST" action="{{ route('login') }}">
        @csrf
        
        <p class="login__title">{{ __('label.Sign-in') }}<br><span class="login-edition">{{ __('label.welcome-to-aMovie') }}</span></p>

        <div class="social social--colored">
            <a href='#' class="social__variant fa fa-facebook"></a>
            <a href='#' class="social__variant fa fa-twitter"></a>
            <a href='#' class="social__variant fa fa-tumblr"></a>
        </div>

        <p class="login__tracker">or</p>
                    
        <div class="field-wrap">
            <input id="email" type='email' placeholder='{{ __('label.Email') }}' name='email' value="{{ old('email') }}" required autofocus class="login__input">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input id="password" type='password' placeholder='{{ __('label.Password') }}' name='password' required class="login__input">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <input type='checkbox' name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class='login__check styled'>
            <label for='remember' class='login__check-info'>{{ __('label.Remember-Me') }}</label>
        </div>
                    
        <div class="login__control">
            <button type='submit' class="btn btn-md btn--warning btn--wider">{{ __('label.Sign-in') }}</button>
            @if (Route::has('password.request'))
                <a class="login__tracker form__tracker" href="{{ route('password.request') }}">
                    {{ __('label.Forgot-Your-Password') }}
                </a>
            @endif
        </div>
    </form>
        
    <div class="clearfix"></div>
@endsection
