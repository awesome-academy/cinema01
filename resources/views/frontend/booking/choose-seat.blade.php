@extends('frontend.layouts.master')
@section('content')
<div class="place-form-area">
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="{{ asset(config('app.image_url') . 'tickets.png') }}">
                <p class="order__title">{{ __('Book a ticket ') }}<br><span class="order__descript">{{ __('and have fun movie time') }}</span></p>
            </div>
        </div>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable ">{{ __('1. What - Where - When') }}</div>
            <div class="order-step second--step">{{ __('2. Choose a sit') }}</div>
        </div>
        <div class="choose-sits">
            <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                <div class="sits-area hidden-xs">
                    <div class="sits-anchor">{{ __('screen') }}</div>
                    <div class="sits">
                        <aside class="sits__line">
                            @foreach ($seatRow as $seat)
                                <span class="sits__indecator">{{ $seat->row_name }}</span>
                            @endforeach
                        </aside>
                            @foreach ($seatCol as $seatRow)
                                <div class="sits__row">
                                    @foreach ($seatRow->seatCols as $data)
                                        @if ($data->seatRow->seat_type_id == 1) 
                                        {
                                            <span class="sits__place sits-price--cheap" data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                        } @elseif ($data->seatRow->seat_type_id == 2)
                                        {
                                            <span class="sits__place sits-price--middle" data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                        } @elseif ($data->seatRow->seat_type_id == 3)
                                        {
                                            <span class="sits__place sits-price--expensive" data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                        }
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        <aside class="sits__checked">
                            <div class="checked-place">
                            </div>
                            <div class="checked-result">
                                {{ __('0 đ') }}
                            </div>
                        </aside>
                        <footer class="sits__number">
                            @for ($i = 1; $i <= $max; $i++)
                                <span class="sits__indecator">{{ $i }}</span>
                            @endfor
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="clearfix"></div>
<form id='film-and-time' class="booking-form" method='get' action='book3-buy.html'>
    <input type='text' name='choosen-number' class="choosen-number">
    <input type='text' name='choosen-number--cheap' class="choosen-number--cheap">
    <input type='text' name='choosen-number--middle' class="choosen-number--middle">
    <input type='text' name='choosen-number--expansive' class="choosen-number--expansive">
    <input type='text' name='choosen-cost' class="choosen-cost">
    <input type='text' name='choosen-sits' class="choosen-sits">
    <div class="booking-pagination booking-pagination--margin">
        <a href="{{ URL::previous() }}" class="booking-pagination__prev">
            <span class="arrow__text arrow--prev">{{ __('prev step') }}</span>
            <span class="arrow__info">{{ __('what - where - when') }}</span>
        </a>
        <div class="hide">
            <button href="#" class="booking-pagination__next">
                <span class="arrow__text arrow--next">{{ __('next step') }}</span>
                <span class="arrow__info">{{ __('checkout') }}</span>
            </button>
        </div>
    </div>
</form>
@stop
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        init_BookingTwo();
    });
    $('.sits__place').click(function () {
        //data element init
        var chooseTime = $(this).attr('data-time');
        var id = $(this).attr('data-id');
        $('.hide').show();
    });
</script>
@endpush
