@extends('frontend.layouts.master')
@section('content')
<!-- Slider -->
<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)      
        <div class="swiper-slide">
            <a href="{{ route('movie-detail.show', ['id' => $slide->movie->id]) }}">
                <img src="{{ asset(config('app.upload_slide') . $slide->image) }}">
            </a>
            <div class="button-video play-btn">
                <a data-fancybox="gallery" href="{{ $slide->movie->trailer }}"><i class="fa fa-play text-center" aria-hidden="true"></i></a>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<!--end slider -->
<!-- Main content -->
<section class="container">
    <div class="movie-best">
        <div class="col-sm-10 col-sm-offset-1 movie-best__rating">{{ __('label.movie_best') }}</div>
        <div class="col-sm-12 change--col">
            @foreach ($best as $data)
            <div class="movie-beta__item ">
                <img class="resize-best-movie" alt='' src="{{ asset(config('app.upload_cover') . $data->image) }}">
                <span class="best-rate">{{ __('label.rate', ['data' => round($data->point, 1)]) }}</span>
                <ul class="movie-beta__info">
                    <li><span class="best-voted">{{ __('label.vote_day', ['data' => '70']) }}</span></li>
                    <li>
                        <p class="movie__time">{{ __('label.movie_time', ['data' => $data->time]) }}</p>
                        <p>{{ __('label.movie_type', ['data' => $data->type]) }}</p>
                    </li>
                    <li class="last-block">
                        <a href="{{ route('movie-detail.show', ['id' => $data->id]) }}" class="slide__link">{{ __('label.more') }}</a>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>
        <div class="col-sm-10 col-sm-offset-1 movie-best__check">{{ __('label.all_now') }}</div>
    </div>
    <div class="clearfix"></div>
    <h2 id='target' class="page-heading heading--outcontainer">{{ __('label.now_cinema') }}</h2>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-8 col-md-9">
                @foreach ($new as $data)
                    <div class="movie movie--test movie--test--dark movie--test--left">
                        <div class="movie__images">
                            <a href="{{ route('movie-detail.show', ['id' => $data->id]) }}" class="movie-beta__link">
                                <img class="resize-now-movie-home" alt='' src="{{ asset(config('app.upload_cover') . $data->image) }}">
                            </a>
                        </div>
                        <div class="movie__info">
                            <a href='{{ route('movie-detail.show', ['id' => $data->id]) }}' class="movie__title">{{ __('label.movie_title', ['data' => $data->name]) }}</a>
                            <p class="movie__time">{{ __('label.movie_time', ['data' => $data->time]) }}</p>
                            <p class="movie__option">{{ __('label.movie_type', ['data' => $data->type]) }}</p>
                            <div class="movie__rate row">
                                <div class="col-md-9">
                                    <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" disabled="" value="{{ round($data->votes->avg('point'), config('const.round')) }}" />
                                </div>
                                <div class="col-md-3">
                                    <span class="movie__rating">{{ __('label.rate', ['data' => round($data->votes->avg('point'), config('const.round'))]) }}</span>
                                </div>
                            </div>               
                        </div>
                    </div>
                @endforeach
            </div>
            <aside class="col-sm-4 col-md-3">
                <div class="sitebar first-banner--left">
                    <div class="banner-wrap first-banner--left">
                        <img alt='banner' src="{{ asset(config('app.image_url') . '500x500.png') }}">
                    </div>
                </div>
            </aside>
        </div>
    </div>     
</section> 
<div class="clearfix"></div>
@stop
@push('styles')
<link rel="stylesheet" href="{{ asset('custom-css/home.css') }}">
@endpush
@push('scripts')
<script type="text/javascript" src="{{ asset('custom-js/home.js') }}"></script>
@endpush
