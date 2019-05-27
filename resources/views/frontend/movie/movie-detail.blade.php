@extends('frontend.layouts.master')
@section('content')
<!-- Main content -->
<input type="hidden" class="getIdMovie" value="{{ $movie->status }}">
<input type="hidden" class="getRouteMovie" value="{{ route('movie-detail.store') }}">
<input type="hidden" class="getRouteVote" value="{{ route('vote.index') }}">
<input type="hidden" class="getRouteVoteStore" value="{{ route('vote.store') }}">
<section class="container">
    <div class="col-sm-12">
        <div class="movie">
            <h2 class="page-heading">{{ __('label.movie_text', ['data' => $movie->name]) }}</h2>
            <div class="movie__info">
                <div class="col-sm-4 col-md-3 movie-mobile">
                    <div class="movie__images">
                        <span class="movie__rating"></span>
                        <img class="resize-cover" alt='' src="{{ asset(config('app.upload_cover') . $movie->image) }}">
                        <div class="button-video play-btn">
                            <a data-fancybox="gallery" href="{{ $movie->trailer }}"><i class="fa fa-play text-center" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" value="{{ $vote }}"/><a class="ng"></a>
                    <p class="movie__option">
                        <strong>{{ __('label.yourVote') }}</strong>
                        <a class='yourVote'>{{ $vote }}</a>{{ __('/5') }}
                    </p>
                    <p class="movie__time">{{ __('label.movie_time', ['data' => $movie->time]) }}</p>
                    <p class="movie__option"><strong>{{ __('label.country') }}</strong>{{ $movie->country }}</p>
                    <p class="movie__option"><strong>{{ __('label.director') }}</strong>{{ $movie->directors }}</p>
                    <p class="movie__option"><strong>{{ __('label.product') }}</strong>{{ $movie->producer }}</p>
                    <p class="movie__option"><strong>{{ __('label.type') }}</strong>{{ $movie->type }}</p>
                    <p class="movie__option"><strong>{{ __('label.actor') }}</strong>{{ $movie->cast }}</p>
                    <p class="movie__option"><strong>{{ __('label.date') }}</strong>{{ $movie->day_start }}</p>
                </div>
            </div>  
            <div class="clearfix"></div>
            <h2 class="page-heading">{{ __('label.plot') }}</h2>
            <p class="movie__describe">{{ $movie->content }}</p>
            <h2 class="page-heading">{{ __('label.showtime_ticket') }}</h2>
            <div class="col-md-3">
                <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                    <input class="form-control inputDate" readonly="" type="text">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span> 
                </div>
            </div>
            <div class="choose-container">
                <div class="clearfix"></div>
                <div class="time-select"></div>
            </div>
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
                <span class="arrow__text arrow--next">{{ __('next step') }}</span>
                <span class="arrow__info">{{ __('choose a sit') }}</span>
            </button>
    </div>
</form>
<form id="dateAndId">
    @csrf
    <input type="hidden" name="idFilter" class="idFilter" value="{{ $movie->id }}">
    <input type="hidden" name="dateFilter" class="dateFilter">
</form>
<form id="voteMovie">
    @csrf
    <input type="hidden" name="movieId" class="movieId" value="{{ $movie->id }}">
    <input type="hidden" name="point" class="point">
</form>
@endsection
