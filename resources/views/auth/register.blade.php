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
    <form class="login" method="POST" action="{{ route('register') }}">
        @csrf
        
        <p class="login__title">{{ __('label.Register') }}<br><span class="login-edition">{{ __('label.welcome-to-aMovie') }}</span></p>

        <div class="social social--colored">
            <a href='#' class="social__variant fa fa-facebook"></a>
            <a href='#' class="social__variant fa fa-twitter"></a>
            <a href='#' class="social__variant fa fa-tumblr"></a>
        </div>

        <p class="login__tracker">{{ __('label.or') }}</p>
                    
        <div class="field-wrap">
            <input id="name" type="text" placeholder='{{ __('label.Name') }}' class="login__input" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
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

            <input id="password-confirm" type="password" class="login__input" name="password_confirmation" placeholder='{{ __('label.Confirm-Password') }}' required>
        </div>
                    
        <div class="login__control">
            <button type="submit" class="btn btn-md btn--warning btn--wider">{{ __('label.Register') }}</button>
        </div>
    </form>
        
    <div class="clearfix"></div>
@endsection
