@extends('frontend.layouts.master')
@section('content')
<section class="container">
    <div class="order-container">
        <div class="order">
            <img class="order__images" alt='' src="{{ asset(config('app.image_url') . 'tickets.png') }}">
            <p class="order__title">{{ __('Thank you') }}<br><span class="order__descript">{{ __('you have successfully purchased tickets') }}</span></p>
        </div>
        <div class="ticket">
            <div class="ticket-position">
                <div class="ticket__indecator indecator--pre">
                    <div class="indecator-text pre--text">{{ __('label.onlineTicket') }}</div> 
                </div>
                <div class="ticket__inner">
                    <div class="ticket-secondary">
                        <span class="ticket__item">{{ __('label.tk_ticketNumber') }}<strong class="ticket__number">{{ $code }}</strong></span>
                        <span class="ticket__item ticket__date">{{ \Carbon\Carbon::parse($showtime->timestart)->format('d/m/Y') }}</span>
                        <span class="ticket__item ticket__time">{{ \Carbon\Carbon::parse($showtime->timestart)->format('H:i') }}</span>
                        <span class="ticket__item">{{ __('label.tk_cinema') }}<span class="ticket__cinema">{{ $showtime->room->cinema->name }}</span></span>
                        <span class="ticket__item">{{ __('label.tk_address') }}<span class="ticket__hall">{{ $showtime->room->cinema->address }}</span></span>
                        <span class="ticket__item ticket__price">{{ __('label.tk_price') }}<strong class="ticket__cost">{{ number_format($totalMoney) }}</strong>{{ __('label.tk_dvt') }}</span>
                    </div>
                    <div class="ticket-primery">
                        <span class="ticket__item ticket__item--primery ticket__film">{{ __('label.tk_film') }}<br><strong class="ticket__movie">{{ $showtime->movie->name }}</strong></span>
                        <span class="ticket__item ticket__item--primery">{{ __('label.tk_seat') }}<span class="ticket__place">
                            @foreach ($arrSeat as $data)
                                {{ $data->seat_name . ', ' }}
                            @endforeach
                        </span></span>
                    </div>
                </div>
                <div class="ticket__indecator indecator--post">
                    <div class="indecator-text post--text">{{ __('label.onlineTicket') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@endsection
