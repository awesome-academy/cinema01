@extends('frontend.layouts.master')
@section('content')
<section class="container">
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1>{{ $user->name }}</h1></div>
        </div>
        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <div class="text-center">
                    <img src="" class="avatar img-circle img-thumbnail">
                    <h6>{{ __('label.upload_ava') }}</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div>  
            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">{{ __('label.home') }}</a></li>
                    <li><a data-toggle="tab" href="#myDeal">{{ __('label.myDeal') }}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <form id="profileForm">
                            @csrf
                            <div class="form-group">
                                <label for="Email">{{ __('label.email') }}</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('label.fullName') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="{{ __('label.plh_fullName') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('label.address') }}</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" placeholder="{{ __('label.plh_address') }}">
                            </div>
                            <div class="form-group">
                                <label for="mobile">{{ __('label.mobile') }}</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $user->mobile }}" placeholder="{{ __('label.plh_mobile') }}">
                            </div>
                            <div class="form-group">
                                @if (Auth::user()->password == Auth::user()->email)
                                     <button type="button" class="btn btn-success btnCreatePass">{{ __('label.createPassLogin') }}</button>
                                @else
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">{{ __('label.changePass') }}</button>
                                @endif
                            </div>
                            <button type="submit" id="saveBtn" class="btn btn-primary">{{ __('label.save') }}</button>
                        </form>
                    </div>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ __('label.changePass') }}</h4>
                                </div>
                                <div id="error" class="alert alert-danger print-error-msg class-hide">
                                    <ul></ul>
                                </div>
                                <div class="modal-body">
                                    <form id="changePassForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="oldPass">{{ __('label.pass') }}</label>
                                            <input type="password" name="oldPass" id="oldPass" class="form-control" placeholder="{{ __('label.plh_pass') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="newPass">{{ __('label.newPass') }}</label>
                                            <input type="password" name="newPass" id="newPass" class="form-control" placeholder="{{ __('label.plh_newPass') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="rePass">{{ __('label.rePass') }}</label>
                                            <input type="password" name="rePass" id="rePass" class="form-control" placeholder="{{ __('label.plh_reNewPass') }}">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button id="changePassBtn" class="btn btn-primary">{{ __('label.save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="myDeal">
                        <table>
                            <thead>
                                <th>{{ __('Id') }}</th>
                                <th>{{ __('label.totalMoney') }}</th>
                                <th>{{ __('label.bookingDate') }}</th>
                                <th>{{ __('label.detail') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($bills as $key => $bill)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $bill->total }}</td>
                                        <td>{{ $bill->created_at }}</td>
                                        <td><a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $bill->id }}" class="viewDetail"><i class="fa fa-info-circle"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- The Modal -->
                    <div class="modal" id="detailModal">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="col-xm-6">
                                    <div class="ticket">
                                        <div class="ticket-position">
                                            <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">{{ __('label.onlineTicket') }}</div></div>
                                            <div class="ticket__inner">
                                                <div class="ticket-secondary">
                                                    <span class="ticket__item">{{ __('label.tk_ticketNumber') }}<strong class="ticket__number"><a class="code"></a></strong></span>
                                                    <span class="ticket__item ticket__date"><a class="date"></a></span>
                                                    <span class="ticket__item ticket__time"><a class="time"></a></span>
                                                    <span class="ticket__item">{{ __('label.tk_cinema') }}<span class="ticket__cinema"><a class="cinema"></a></span></span>
                                                    <span class="ticket__item">{{ __('label.tk_address') }}<span class="ticket__hall"><a class="address"></a></span></span>
                                                    <span class="ticket__item ticket__price">{{ __('label.tk_price') }}<strong class="ticket__cost"><a class="total"></a>{{ __('label.tk_dvt') }}</strong></span>
                                                </div>
                                                <div class="ticket-primery">
                                                    <span class="ticket__item ticket__item--primery ticket__film">{{ __('label.tk_film') }}<br><strong class="ticket__movie"></strong></span>
                                                    <span class="ticket__item ticket__item--primery">{{ __('label.tk_seat') }}<span class="ticket__place"></span></span>
                                                </div>
                                            </div>
                                            <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">{{ __('label.onlineTicket') }}</div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop
@push('scripts')
<script type="text/javascript">
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#profileForm').serialize(),
            url: "{{ route('profile.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#saveBtn').html('{{ __('label.save') }}');
                alert(data.success);
            },
            error: function(data) {
                console.log(data);
                $('#saveBtn').html('{{ __('label.save') }}');
            }
        });
    });
    $('#changePassBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#changePassForm').serialize(),
            url: "{{ route('profile.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#changePassBtn').html('{{ __('label.save') }}');
                if (data.errors){
                    $('.print-error-msg').css('display', 'block');
                    document.getElementById('error').innerHTML = data.errors;
                    setTimeout(function(){
                        $('#error').hide();
                    }, 3000);
                } else 
                {
                    alert(data.success);
                    $('#myModal').modal('hide');                }
                    $('#changePassForm').trigger("reset");
            },
            error: function(data) {
                var x = JSON.parse(data.responseText);
                printErrorMsg(x.errors);
                setTimeout(function(){
                        $('#error').hide();
                    }, 3000);
                $('#changePassBtn').html('{{ __('label.saveChange') }}');
            }
        });
    });
    $('body').on('click', '.viewDetail', function () {
        var bill_id = $(this).data('id');
        $.get("{{ route('profile.index') }}" + '/' + bill_id + '/edit', function (data) {
            $('#detailModal').modal('show');
            $('.code').html(data.tickets[0].code.substring(0, 8));
            $('.cinema').html(data.tickets[0].showtime.room.cinema.name);
            $('.address').html(data.tickets[0].showtime.room.cinema.address);
            $('.total').html(data.total);
            $('.date').html(data.date);
            $('.time').html(data.time);
            $('.ticket__movie').html(data.tickets[0].showtime.movie.name);
            printSeat(data.tickets);
        })
    });
    function printSeat (ticket) {
        var name = '';
        $.each( ticket, function( key, value ) {
            name += value.seat_col.seat_name + ', ';
        });
        $('.ticket__place').html(name.substring(0, name.length - 2));
    }
    function printErrorMsg (msg) {
        $('.print-error-msg').find('ul').html('');
        $('.print-error-msg').css('display', 'block');
        $.each( msg, function( key, value ) {
            $('.print-error-msg').find('ul').append('<li>' + value + '</li>');
        });
    }
    $('.btnCreatePass').click(function () {
        if (confirm('{{ __('label.confirmCreatePass') }}'))
        {
            $.get("{{ route('profile.create') }}", function (data) {
                alert(data.mess);
                location.reload(); 
            });
        }
    });
</script>
@endpush
