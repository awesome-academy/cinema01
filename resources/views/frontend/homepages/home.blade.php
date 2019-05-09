@extends('frontend.layouts.master')
@section('content')
<!-- Slider -->
<div class="bannercontainer">
    <div class="banner">
        <ul>
            <li data-transition="fade" data-slotamount="7" class="slide fading-slide" data-slide='Travel worldwide. Create trip film. '>
                <img alt='' src="{{ asset(config('app.image_url') . '1920x616.png') }}">
                <div class="caption slide__name slide__name--smaller"
                    data-x="left"
                    data-y="160"
                    data-splitin="chars"
                    data-elementdelay="0.1"
                    data-speed="700" 
                    data-start="1400" 
                    data-easing="easeOutBack"
                    data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                    data-frames="{ typ :lines;
                                elementdelay :0.1;
                                start:1650;
                                speed:500;
                                ease:Power3.easeOut;
                                animation:x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                },
                                { typ :lines;
                                elementdelay :0.1;
                                start:2150;
                                speed:500;
                                ease:Power3.easeOut;
                                animation:x:0;y:0;z:0;rotationX:00;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                }"
                    data-splitout="lines"
                    data-endelementdelay="0.1"
                    data-customout="x:-230;y:0;z:0;rotationX:0;rotationY:0;rotationZ:90;scaleX:0.2;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%"
                    data-endspeed="500"
                    data-endeasing="Back.easeIn">
                    {{ __('label.slide_name', ['data' => 'Travel, Admire, Remember. ']) }}
                </div>
                <div class="caption slide__time position-center postion-place--one sfr stl"
                    data-x="left"
                    data-y="242" 
                    data-speed="300" 
                    data-start="2100" 
                    data-easing="easeOutBack"
                    data-endspeed="300"
                    data-endeasing="Back.easeIn">
                    {{ __('label.from') }}
                </div>
                <div class="caption slide__date position-center postion-place--two lfb ltb"
                    data-x="left"             
                    data-y="242" 
                    data-speed="500" 
                    data-start="2400" 
                    data-easing="Power4.easeOut"
                    data-endspeed="400"
                    data-endeasing="Back.easeIn">
                    {{ __('label.slide_date', ['data' => 'April 18']) }}
                </div>
                <div class="caption slide__time position-center postion-place--three sfr stl" 
                    data-x="left" 
                    data-y="242" 
                    data-speed="300" 
                    data-start="2100" 
                    data-easing="easeOutBack"
                    data-endspeed="300"
                    data-endeasing="Back.easeIn">
                    {{ __('label.till') }}
                </div>
                <div class="caption slide__date position-center postion-place--four lfb ltb" 
                    data-x="left"
                    data-y="242" 
                    data-speed="500" 
                    data-start="2800" 
                    data-easing="Power4.easeOut" 
                    data-endspeed="400"
                    data-endeasing="Back.easeIn">
                    {{ __('label.slide_date', ['data' => 'May 01']) }}
                </div>
                <div class="caption lfb slider-wrap-btn ltb" 
                    data-x="left"
                    data-y="310" 
                    data-speed="400" 
                    data-start="3300" 
                    data-easing="Power4.easeOut"
                    data-endspeed="500"
                    data-endeasing="Power4.easeOut" >
                    <a href="#" class="btn btn-md btn--danger btn--wide slider--btn">{{ __('label.learn_more') }}</a>
                </div>
            </li>
        </ul>
    </div>
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
    <div class="col-sm-12">
        <div class="mega-select-present mega-select-top mega-select--full">
            <div class="mega-select-marker">
                <div class="marker-indecator location">
                    <p class="select-marker"><span>{{ __('label.market_location_top') }}</span> <br>{{ __('label.market_location_bot') }}</p>
                </div>
                <div class="marker-indecator cinema">
                    <p class="select-marker"><span>{{ __('label.market_cinema_top') }}</span> <br>{{ __('label.market_cinema_bot') }}</p>
                </div>
                <div class="marker-indecator film-category">
                    <p class="select-marker"><span>{{ __('label.market_movie_top') }}</span> <br>{{ __('label.market_movie_bot') }}</p>
                </div>
            </div>
            <div class="mega-select pull-right">
                <span class="mega-select__point">{{ __('label.search_by') }}</span>
                <ul class="mega-select__sort">
                    <li class="filter-wrap"><a href="#" class="mega-select__filter filter--active" data-filter='location'>{{ __('label.mega_location') }}</a></li>
                    <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='cinema'>{{ __('label.mega_cinema') }}</a></li>
                    <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='film-category'>{{ __('label.mega_movie') }}</a></li>
                </ul>
                <input name="search-input" type='text' class="select__field">
                <div class="select__btn">
                    <a href="#" class="btn btn-md btn--danger location">{{ __('label.find') }}<span class="hidden-exrtasm">{{ __('label.find_location') }}</span></a>
                    <a href="#" class="btn btn-md btn--danger cinema">{{ __('label.find') }}<span class="hidden-exrtasm">{{ __('label.find_cinema') }}</span></a>
                    <a href="#" class="btn btn-md btn--danger film-category">{{ __('label.find') }}<span class="hidden-exrtasm">{{ __('label.find_movie') }}</span></a>
                </div>
            </div>
        </div>
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
                                <img alt='' src="{{ asset(config('app.image_url') . '424x424.png') }}">
                            </a>
                        </div>
                        <div class="movie__info">
                            <a href='{{ route('movie-detail.show', ['id' => $data->id]) }}' class="movie__title">{{ __('label.movie_title', ['data' => $data->name]) }}</a>
                            <p class="movie__time">{{ __('label.movie_time', ['data' => $data->time]) }}</p>
                            <p class="movie__option">{{ __('label.movie_type', ['data' => $data->type]) }}</p>
                            <div class="movie__rate">
                                <div class="score"></div>
                                <span class="movie__rating">{{ __('label.rate', ['data' => round($data->votes->avg('point'), 1)]) }}</span>
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
@endsection
