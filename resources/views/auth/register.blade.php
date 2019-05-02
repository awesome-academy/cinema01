@extends('frontend.layouts.master')
@section('content')
    <!-- Main content -->
    <form class="login" method="POST" action="{{ route('register') }}">
        @csrf
        <p class="login__title">{{ __('label.Register') }}<br><span class="login-edition">{{ __('label.welcome-to-aMovie') }}</span></p>
        <div class="field-wrap">
            <input id="name" type="text" placeholder='{{ __('label.Name') }}' class="login__input" name="name" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <input id="email" type='email' placeholder='{{ __('label.Email') }}' name='email' required autofocus class="login__input">
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
