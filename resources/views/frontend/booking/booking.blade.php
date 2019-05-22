@extends('frontend.layouts.master')
@section('content')
<input type="hidden" class="getIdMovie" value="1">
<input type="hidden" class="getRouteMovie" value="{{ route('movie-detail.store') }}">
<section class="container">
    <div class="order-container">
        <div class="order">
            <img class="order__images" alt='' src="{{ asset(config('app.image_url') . 'tickets.png') }}">
            <p class="order__title">{{ __('label.book') }}<br><span class="order__descript">{{ __('label.orderDescript') }}</span></p>
        </div>
    </div>
    <div class="order-step-area">
        <div class="order-step first--step">{{ __('label.firstStep') }}</div>
    </div>
    <h2 class="page-heading heading--outcontainer">{{ __('label.chooserMovie') }}</h2>
</section>
<div class="choose-film">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($movies as $movie)
                <div class="swiper-slide" data-film="{{ $movie->name }}" data-id="{{ $movie->id }}">
                    <img class="styleBgImage" src="{{ asset(config('app.upload_cover') . $movie->image) }}">
                    <p class="choose-film__title">{{ $movie->name }}</p>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>  
<section class="container">
    <div class="col-sm-12">
        <div class="choose-indector choose-indector--film">
            <strong>{{ __('label.choosen') }}</strong><span class="choosen-area"></span>
        </div>
        <h2 class="page-heading">{{ __('label.cityDate') }}</h2>
        <div class="choose-container choose-container--short ">
            <div id="datepicker" class="input-group date col-md-3" data-date-format="yyyy-mm-dd">
                <input class="form-control inputDate" readonly="" type="text">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span> 
            </div>
        </div>
        <h2 class="page-heading">{{ __('label.pickTime') }}</h2>
        <div class="choose-container">
            <div class="clearfix"></div>
            <div class="time-select"></div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<form id='showtimeForm' class='booking-form' method="POST" action="{{ route('choose-seat.store') }}">
    @csrf
    <input type="hidden" name="showtime_id" id="showtime_id">
    <div id="booking-next" class="booking-pagination class-hide">
        <a href="#" class="booking-pagination__prev hide--arrow">
            <span class="arrow__text arrow--prev"></span>
            <span class="arrow__info"></span>
        </a>
        <button class="booking-pagination__next">
            <span class="arrow__text arrow--next">{{ __('label.nextStep') }}</span>
            <span class="arrow__info">{{ __('label.chooseSit') }}</span>
        </button>
    </div>
</form>
<div class="clearfix"></div>
<form id="dateAndId">
    @csrf
    <input type="hidden" name="idFilter" class="idFilter">
    <input type="hidden" name="dateFilter" class="dateFilter">
</form>
@endsection
