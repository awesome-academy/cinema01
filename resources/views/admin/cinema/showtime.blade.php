@extends('admin.layouts.master')
@section('content')
<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createShowtime">{{ __('label.createShowtime') }}</a><a id="mess"></a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>{{ __('label.id') }}</th>
                <th>{{ __('label.movie') }}</th>
                <th>{{ __('label.room') }}</th>
                <th>{{ __('label.timestart') }}</th>
                <th>{{ __('label.created_at') }}</th>
                <th>{{ __('label.updated_at') }}</th>
                <th>{{ __('label.action') }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div id="error" class="alert alert-danger print-error-msg">
                <ul></ul>
            </div>
            <div class="modal-body">
                <form id="showtimeForm" name="showtimeForm" class="form-horizontal">
                    <input type="hidden" name="showtime_id" id="showtime_id">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select id="movie_id" name="movie_id">
                                <option value=''>{{ __('label.chooseSeatType') }}</option>
                                @foreach ($movies as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select id="room_id" name="room_id">
                                <option value=''>{{ __('label.chooseRoomType') }}</option>
                                @foreach ($rooms as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="timestart" class="col-sm-4 control-label">{{ __('label.timestart') }}</label>
                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="timestart_day" name="timestart_day" value="">
                            </div>
                            <div class="col-sm-6">
                                <input type="time" class="form-control" id="timestart_time" name="timestart_time" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">{{ __('label.saveChange') }}
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('showtime.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'movie.name', name: 'movie.name'},
            {data: 'room.name', name: 'room.name'},
            {data: 'timestart', name: 'timestart'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createShowtime').click(function () {
        $('#saveBtn').val("create-room");
        $('#showtime_id').val('');
        $('#showtimeForm').trigger("reset");
        $('#modelHeading').html("{{ __('label.createShowtime') }}");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editShowtime', function () {
        var showtime_id = $(this).data('id');
        $.get("{{ route('showtime.index') }}" + '/' + showtime_id + '/edit', function (data) {
            $('#modelHeading').html("{{ __('label.editShowtime') }}");
            $('#saveBtn').val("edit-showtime");
            $('#ajaxModel').modal('show');
            $('#showtime_id').val(data.id);
            $('#movie_id').val(data.movie_id);
            $('#room_id').val(data.room_id);
            $('#timestart_day').val(data.timestart.split(" ")[0]);
            $('#timestart_time').val(data.timestart.split(" ")[1]);
        })
    });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#showtimeForm').serialize(),
            url: "{{ route('showtime.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#roomTypeForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                document.getElementById('mess').innerHTML = data.success;
            },
            error: function(data) {
                var x = JSON.parse(data.responseText);
                printErrorMsg(x.errors);
                setTimeout(function(){
                        $('#error').hide();
                    }, 3000);
                $('#saveBtn').html('{{ __('label.saveChange') }}');
            }
        });
    });
    $('body').on('click', '.deleteShowtime', function () {
        var showtime_id = $(this).data("id");
        if (confirm("{{ __('label.confirmDelete') }}"))
        {
            $.ajax({
                type: "DELETE",
                url: "{{ route('showtime.store') }}" + '/' + showtime_id,
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
</script>
@endpush
