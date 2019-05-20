@extends('frontend.layouts.master')
@section('content')
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
        <div class="time-select time-select--wide"></div>
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
@stop
@push('scripts')
<script type="text/javascript">
    $('.swiper-slide').click(function (e) {
        //visual iteractive for choose
        $('.swiper-slide').removeClass('film--choosed');
        $(this).addClass('film--choosed');
        //data element init
        var chooseFilm = $(this).attr('data-film');
        var filmId = $(this).attr('data-id');
        $('.choose-indector--film').find('.choosen-area').text(chooseFilm);
        $('.idFilter').val(filmId);
        $('.class-hide').hide();
        runFilter();
    });
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: false,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: -30,
            depth: 100,
            modifier: 1,
            slideShadows : true,
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
    function runFilter () {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).change(function () {
            var date = $('.inputDate').val();
            var input = new Date(date + 'T17:00:00Z');
            var today = new Date;
            if (input >= today)
            {
                $('.dateFilter').val(date);
                $.ajax({
                    data: $('#dateAndId').serialize(),
                    url: "{{ route('movie-detail.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        var html = '';
                            $.each( data, function(key, cinema) {
                                html += `<div class="time-select__group">
                                    <div class="col-sm-4">
                                        <p class="time-select__place">` + cinema.name + `</p>
                                    </div>
                                    <ul class="col-sm-8 items-wrap">`;
                                    $.each(cinema.rooms, function(key2, room) {
                                        $.each(room.showtimes, function(key3, showtime) {
                                            html += `<li class='time-select__item selectShowtime' data-time='` + showtime.timestart.substr(11, 5) + `' data-id=` + showtime.id + ` onclick='myFun()'>` + showtime.timestart.substr(11, 5) + `</li>`;
                                        });
                                    });
                                    html += `</ul></div>`;
                            });
                            html += `<div class="choose-indector choose-indector--time">
                                <strong>{{ __('label.choosen') }}</strong><span class="choosen-area"></span>
                            </div>`;
                        $('.time-select--wide').html(html);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            } else 
            {
                $('.time-select--wide').html('');
            }
        }).datepicker('update', new Date());
    };
    function myFun () { 
       $('.time-select__item').click(function () {
            $('.time-select__item').removeClass('active');
            $(this).addClass('active');
            //data element init
            var chooseTime = $(this).attr('data-time');
            var id = $(this).attr('data-id');
            $('.choose-indector--time').find('.choosen-area').text(chooseTime);
            $('.class-hide').show();
            //gán showtime_id form
            $('#showtime_id').val(id);
        });
    };
</script>
@endpush