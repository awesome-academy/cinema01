var routeIndex = $('.routeIndex').val();
var routeStore = $('.routeStore').val();
var newSlide = $('.newSlide').val();
var editSlide = $('.editSlide').val();
var confirmDel = $('.confirmDel').val();
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: routeIndex,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'movie.name', name: 'cinema.name'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewSlide').click(function () {
        $('#saveBtn').val("create-slide");
        $('#slide_id').val('');
        $('#slideForm').trigger("reset");
        $('#modelHeading').html(newSlide);
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editSlide', function () {
        var slide_id = $(this).data('id');
        $.get(routeIndex + '/' + slide_id + '/edit', function (data) {
            $('#modelHeading').html(editSlide);
            $('#saveBtn').val("edit-room");
            $('#ajaxModel').modal('show');
            $('#slide_id').val(data.id);
            $('#movie_id').val(data.movie_id);
            $('#status').val(data.status);
        })
    });
    $('#saveBtn').click(function (e) {
        var mydata = new FormData($('#slideForm')[0]);
        e.preventDefault();
        $(this).html('Sending ...');
        $.ajax({
            data: mydata,
            url: routeStore,
            cache: false,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                $('#slideForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                document.getElementById('mess').innerHTML = data.success;
                $('#saveBtn').html('Save change');
            },
            error: function(data) {
                var x = JSON.parse(data.responseText);
                printErrorMsg(x.errors);
                setTimeout(function(){
                        $('#error').hide();
                    }, 3000);
                $('#saveBtn').html('Save change');
            }
        });
    });
    $('body').on('click', '.deleteSlide', function () {
        var slide_id = $(this).data("id");
        if (confirm(confirmDel))
        {
            $.ajax({
                type: "DELETE",
                url: routeStore + '/' + slide_id,
                success: function (data) {
                    table.draw();
                    document.getElementById('mess').innerHTML = data.success;
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });    
});
function printErrorMsg (msg) {
    $('.print-error-msg').find('ul').html('');
    $('.print-error-msg').css('display', 'block');
    $.each( msg, function( key, value ) {
        $('.print-error-msg').find('ul').append('<li>' + value + '</li>');
    });
}
