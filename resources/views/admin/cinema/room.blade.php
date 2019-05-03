@extends('admin.layouts.master')
@section('content')
<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createNewRoom">{{ __('label.createNewRoom') }}</a><a id="mess"></a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>{{ __('label.id') }}</th>
                <th>{{ __('label.cinemaName') }}</th>
                <th>{{ __('label.roomType') }}</th>
                <th>{{ __('label.name') }}</th>
                <th>{{ __('label.note') }}</th>
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
                <form id="roomForm" name="roomForm" class="form-horizontal">
                    <input type="hidden" name="room_id" id="room_id">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select id="cinema_id" name="cinema_id">
                                <option value=''>{{ __('label.chooseCinema') }}</option>
                                @foreach ($cinemas as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select id="room_type_id" name="room_type_id">
                                <option value=''>{{ __('label.chooseRoomType') }}</option>
                                @foreach ($room_type as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">{{ __('label.name') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('label.enterName') }}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{ __('label.note') }}</label>
                        <div class="col-sm-12">
                            <textarea id="note" name="note" placeholder="{{ __('label.enterNote') }}" class="form-control"></textarea>
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
        ajax: "{{ route('room.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'cinema.name', name: 'cinema.name'},
            {data: 'room_type.name', name: 'room_type.name'},
            {data: 'name', name: 'name'},
            {data: 'note', name: 'note'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewRoom').click(function () {
        $('#saveBtn').val("create-room");
        $('#room_id').val('');
        $('#roomForm').trigger("reset");
        $('#modelHeading').html("{{ __('label.createNewRoom') }}");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editRoom', function () {
        var room_id = $(this).data('id');
        $.get("{{ route('room.index') }}" + '/' + room_id + '/edit', function (data) {
            $('#modelHeading').html("{{ __('label.editRoom') }}");
            $('#saveBtn').val("edit-room");
            $('#ajaxModel').modal('show');
            $('#room_id').val(data.id);
            $('#cinema_id').val(data.cinema_id);
            $('#room_type_id').val(data.room_type_id);
            $('#name').val(data.name);
            $('#note').val(data.note);
        })
    });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#roomForm').serialize(),
            url: "{{ route('room.store') }}",
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
    $('body').on('click', '.deleteRoom', function () {
        var room_id = $(this).data("id");
        if (confirm("{{ __('label.confirmDelete') }}"))
        {
            $.ajax({
                type: "DELETE",
                url: "{{ route('room.store') }}" + '/' + room_id,
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
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
}
</script>
@endpush
