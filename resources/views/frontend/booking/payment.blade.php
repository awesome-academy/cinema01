@extends('frontend.layouts.master')
@section('content')   
<!-- Main content -->
<section class="container">
    <div class="order-container">
        <div class="order">
            <img class="order__images" alt='' src="{{ asset(config('app.image_url') . 'tickets.png') }}">
            <p class="order__title">{{ __('label.book') }}<br><span class="order__descript">{{ __('label.orderDescript') }}</span></p>
        </div>
    </div>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable ">{{ __('label.firstStep') }}</div>
            <div class="order-step second--step order-step--disable">{{ __('label.secondStep') }}</div>
            <div class="order-step third--step">{{ __('label.thirdStep') }}</div>
        </div>
    <div class="col-sm-12">
        <div class="checkout-wrapper">
            <h2 class="page-heading">{{ __('label.price') }}</h2>
            <ul class="book-result">
                <li class="book-result__item">{{ __('label.tickets') }}<span class="book-result__count booking-ticket">{{ count($seat) }}</span></li>
                <li class="book-result__item">{{ __('label.total') }}<span class="book-result__count booking-cost">{{ number_format($totalMoney) }}{{ __('label.tk_dvt') }}</span></li>
            </ul>
            <h2 class="page-heading">{{ __('label.choosePayment') }}</h2>
            <div class="payment">
                <a href="#" class="payment__item">
                    <img alt='' src="{{ asset(config('app.image_pay') . 'pay1.png') }}">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="{{ asset(config('app.image_pay') . 'pay2.png') }}">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="{{ asset(config('app.image_pay') . 'pay3.png') }}">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="{{ asset(config('app.image_pay') . 'pay4.png') }}">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="{{ asset(config('app.image_pay') . 'pay5.png') }}">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="{{ asset(config('app.image_pay') . 'pay6.png') }}">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="{{ asset(config('app.image_pay') . 'pay7.png') }}">
                </a>
            </div> 
        </div>
        <form method="POST" action="{{ route('bill.store') }}">
            @csrf
            <input type="hidden" name="arrId[]" value="{{ $seatId }}">
            <input type="hidden" name="showtimeId" value="{{ $id }}">
            <input type="hidden" name="totalMoney" value="{{ $totalMoney }}">
            <div class="order">
                <button class="btn btn-md btn--warning btn--wide">{{ __('label.purchase') }}</button>
            </div>
        </form>
    </div>
</section>
<div class="clearfix"></div>
<div class="booking-pagination">
    <a href="{{ URL::previous() }}" class="booking-pagination__prev">
        <p class="arrow__text arrow--prev">{{ __('label.prevStep') }}</p>
        <span class="arrow__info">{{ __('label.chooseSit') }}</span>
    </a>
    <a href="#" class="booking-pagination__next hide--arrow">
        <p class="arrow__text arrow--next">{{ __('label.nextStep') }}</p>
        <span class="arrow__info"></span>
    </a>
</div>
<div class="clearfix"></div>
@endsection
