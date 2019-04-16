@extends('frontend.layouts.master')
@section('content')
<!-- Main content -->
<section class="container">
    <div class="col-sm-12">
        <div class="movie">
            <h2 class="page-heading">{{ __('label.movie_text', ['data' => $movie->name]) }}</h2>
            <div class="movie__info">
                <div class="col-sm-4 col-md-3 movie-mobile">
                    <div class="movie__images">
                        <span class="movie__rating">{{ __('label.movie_text', ['data' => $vote]) }}</span>
                        <img alt='' src="{{ asset(config('app.image_url') .'526x773.png') }}">
                        <div class="swiper-container play_btn">
                          <div class="swiper-wrapper" >
                                <div class="media-video swiper-slide-visible swiper-slide-active">
                                <a href="{{ __($movie->trailer) }}" class="movie__media-item fa fa-youtube-play">
                                </a>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <p class="movie__time">{{ __('label.movie_time', ['data' => $movie->time]) }}</p>
                    <p class="movie__option"><strong>{{ __('label.country') }}</strong>{{ $movie->country }}</p>
                    <p class="movie__option"><strong>{{ __('label.director') }}</strong>{{ $movie->directors }}</p>
                    <p class="movie__option"><strong>{{ __('label.product') }}</strong>{{ $movie->producer }}</p>
                    <p class="movie__option"><strong>{{ __('label.type') }}</strong>{{ $movie->type }}</p>
                    <p class="movie__option"><strong>{{ __('label.actor') }}</strong>{{ $movie->cast }}</p>
                    <p class="movie__option"><strong>{{ __('label.date') }}</strong>{{ $movie->day_start }}</p>
                    <div class="movie__btns movie__btns--full">
                        <a href="#" class="btn btn-md btn--warning">{{ __('label.book_ticket') }}</a>
                    </div>
                </div>
            </div>  
            <div class="clearfix"></div>      
            <h2 class="page-heading">{{ __('label.plot') }}</h2>
            <p class="movie__describe">{{ $movie->content }}</p>
            <h2 class="page-heading">{{ __('label.showtime_ticket') }}</h2>
            <div class="choose-container">
                <div class="clearfix"></div>
                <div class="time-select">
                    @if($cinema == [])
                        {{ __('label.not_showtime') }}
                    @else
                        @foreach ($cinema as $data)
                            <div class="time-select__group">
                                <div class="col-sm-4">
                                    <p class="time-select__place">{{ $data->name }}</p>
                                </div>   
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@endsection
