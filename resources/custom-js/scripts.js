var routeMovie = $('.getRouteMovie').val();
var routeVote = $('.getRouteVote').val();
var routeVoteStore = $('.getRouteVoteStore').val();

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
function getShowtimeOnTimeChange (route) {
    $('.class-hide').hide();
    var date = $('.inputDate').val();
    var input = new Date(date + 'T17:00:00Z');
    var today = new Date;
    if (input >= today) {
        $('.dateFilter').val(date);
        $.ajax({
            data: $('#dateAndId').serialize(),
            url: route,
            type: "POST",
            dataType: 'json',
            success: function (data) {
                var status = $('.getIdMovie').val();
                var html = '';
                if (status == 2) {
                    html += `<div class="contact">
                        <p class="contact__title">Comming Soon</p>
                    </div>`;
                } else if (status == 1) {
                    $.each( data, function (key, cinema) {
                        html += `<div class="time-select__group">
                            <div class="col-sm-4">
                                <p class="time-select__place">` + cinema.name + `</p>
                            </div>
                            <ul class="col-sm-8 items-wrap">`;
                            $.each(cinema.rooms, function (key2, room) {
                                $.each(room.showtimes, function (key3, showtime) {
                                    html += `<li class='time-select__item selectShowtime' data-time='` + showtime.timestart.substr(11, 5) + `' data-id=` + showtime.id + ` onclick='myFun()'>` + showtime.timestart.substr(11, 5) + `</li>`;
                                });
                            });
                        html += `</ul></div>`;
                    });
                    html += `<div class="choose-indector choose-indector--time">
                        <strong>Choosen: </strong><span class="choosen-area"></span>
                    </div>`;
                }
                $('.time-select').html(html);
            },
            error: function(data) {
                console.log('Error:' + data);
            },
        });
    } else {
        $('.time-select').html('');
    };
};
var id = $('.movieId').val();
$.get(routeVote + '/' + id, function (data) {
    var avg = Math.round(data.avg * 10) / 10;
    $('.movie__rating').html(avg);
    $('.ng').html(' (' + data.ng + ')');
});
$('input.rating').on('change', function () {
    console.log('aaaaaaaaaa');
    var point = $(this).val();
    $('.point').val(point);
    $.ajax({
        data: $('#voteMovie').serialize(),
        url: routeVoteStore,
        type: "POST",
        dataType: 'json',
        success: function (data) {
            $('.yourVote').html(point);
            var id = $('.movieId').val();
            $.get(routeVote + '/' + id, function (data) {
                var avg = Math.round(data.avg * 10) / 10;
                $('.movie__rating').html(avg);
                $('.ng').html(' (' + data.ng + ')');
            });
        },
        error: function (data) {
            console.log('Error:' + data);
        }
    });
});
//swiper
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
    $("#datepicker").datepicker({
        autoclose: true,
        todayHighlight: true,
    }).change(function () {
        getShowtimeOnTimeChange(routeMovie);
    }).datepicker('update', new Date());
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
$("#datepicker").datepicker({
    autoclose: true,
    todayHighlight: true,
}).change(function () {
    getShowtimeOnTimeChange(routeMovie);
}).datepicker('update', new Date());
