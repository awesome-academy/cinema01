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
                                        @if (count($data->tickets) > 0)
                                            {{ $dem = 0 }}
                                            @foreach ($data->tickets as $ticket)
                                                @if ($ticket->showtime_id == $id)
                                                    <span class="sits__place sits-price--cheap sits-state--not">Empty</span>
                                                @else {{ $dem++ }}
                                                @endif
                                                @if ($dem == count($data->tickets))
                                                    @if ($data->seatRow->seat_type_id == 1) 
                                                        <span class="sits__place sits-price--cheap" data-id='{{ $data->id }}' data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                                    @elseif ($data->seatRow->seat_type_id == 2)
                                                        <span class="sits__place sits-price--middle" data-id='{{ $data->id }}'  data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                                    @elseif ($data->seatRow->seat_type_id == 3)
                                                        <span class="sits__place sits-price--expensive" data-id='{{ $data->id }}'  data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                            @if ($data->seatRow->seat_type_id == 1) 
                                                <span class="sits__place sits-price--cheap" data-id='{{ $data->id }}' data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                            @elseif ($data->seatRow->seat_type_id == 2)
                                                <span class="sits__place sits-price--middle" data-id='{{ $data->id }}'  data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                            @elseif ($data->seatRow->seat_type_id == 3)
                                                <span class="sits__place sits-price--expensive" data-id='{{ $data->id }}'  data-place='{{ $data->seat_name }}' data-price='{{ $seatRow->seatType->seatPrices[0]->price }}'>{{ $data->seat_name }}</span>
                                            @endif
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
<form id='showtimeForm' method="POST" action="{{ route('payment.store') }}">
    @csrf
    <input type="hidden" name="seatId[]" id="seatId">
    <input type="hidden" name="showtimeId" id="showtimeId" value="{{ $id }}">
    <input type="hidden" name="result" id="result">
    <div id="booking-next" class="booking-pagination">
        <a href="{{ URL::previous() }}" class="booking-pagination__prev">
            <span class="arrow__text arrow--prev">{{ __('prev step') }}</span>
            <span class="arrow__info">{{ __('what - where - when') }}</span>
        </a>
        <div class="class-hide">
            <button type="submit" class="booking-pagination__next">
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
        $('.class-hide').show();
    });
</script>
@endpush
