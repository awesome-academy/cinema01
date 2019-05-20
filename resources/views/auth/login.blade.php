@extends('frontend.layouts.master')
@section('content')
    <!-- Main content -->
    <form class="login" method="POST" action="{{ route('login') }}">
        @csrf
        <p class="login__title">{{ __('label.Sign-in') }}<br><span class="login-edition">{{ __('label.welcome-to-aMovie') }}</span></p>
        <div class="social social--colored">
            <a href='{{ url('redirect/facebook') }}' class="social__variant fa fa-facebook"></a>
            <a href='{{ url('redirect/google') }}' class="social__variant fa fa-google-plus"></a>
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
            <input type='checkbox' name="remember" id="remember" class='login__check styled'>
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
