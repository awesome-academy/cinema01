@extends('admin.layouts.master')
@section('content')
<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createSeatRow">{{ __('label.createSeatRow') }}</a><a id="mess"></a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>{{ __('label.id') }}</th>
                <th>{{ __('label.room') }}</th>
                <th>{{ __('label.seatType') }}</th>
                <th>{{ __('label.name') }}</th>
                <th>{{ __('label.seatCols') }}</th>
                <th>{{ __('label.action') }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div class="modal fade" id="ajaxSeat" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadingSeat"></h4>
            </div>
            <div id="error" class="alert alert-danger print-error-msg">
                <ul></ul>
            </div>
            <div class="modal-body">
                <form id="seatColForm" name="seatColForm" class="form-horizontal">
                    <input type="hidden" name="seat_row_id" id="seat_row_id">
                    <div class="form-group">
                        <label for="seat_quantity" class="col-sm-2 control-label">{{ __('label.quantity') }}</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="seat_quantity" name="seat_quantity" placeholder="{{ __('label.enterQuantityAdd') }}" value="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="addBtn" value="addCol">{{ __('label.saveChange') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ajaxSeatCol" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelSeatCol"></h4>
            </div>
            <div class="modal-body">
                <form id="seatColForm" name="seatColForm" class="form-horizontal">
                    <input type="hidden" name="seat_col_id" id="seat_col_id">
                    <div class="form-group">
                        <label for="seat_col_name" class="col-sm-2 control-label">{{ __('label.seat') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="seat_col_name" name="seat_col_name" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="seat_status" class="col-sm-2 control-label">{{ __('label.status') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="seat_status" name="seat_status" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="created_at" class="col-sm-2 control-label">{{ __('label.created_at') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="created_at" name="created_at" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="updated_at" class="col-sm-2 control-label">{{ __('label.updated_at') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="updated_at" name="updated_at" readonly>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-12">
                        <button href="javascript:void(0)" data-toggle="tooltip" class="btn btn-danger btn-sm deleteSeatCol float-right">{{ __('label.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                <form id="seatRowForm" name="seatRowForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select id="room_id" name="room_id">
                                <option value=''>{{ __('label.chooseRoom') }}</option>
                                @foreach ($room as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select id="seat_type_id" name="seat_type_id">
                                <option value=''>{{ __('label.chooseSeatType') }}</option>
                                @foreach ($seat_type as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="row_name" class="col-sm-2 control-label">{{ __('label.name') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="row_name" name="row_name" placeholder="{{ __('label.enterName') }}" value="">
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
        ajax: "{{ route('seat.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'room.name', name: 'room.name'},
            {data: 'seat_type.name', name: 'seat_type.name'},
            {data: 'row_name', name: 'row_name'},
            {data: 'seat_cols', name: 'seat_cols', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createSeatRow').click(function () {
        $('#saveBtn').val("create-room");
        $('#id').val('');
        $('#seatRowForm').trigger("reset");
        $('#modelHeading').html("{{ __('label.createSeatRow') }}");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editSeatRow', function () {
        var id = $(this).data('id');
        $.get("{{ route('seat.index') }}" + '/' + id + '/edit', function (data) {
            $('#modelHeading').html("{{ __('label.editSeatname') }}");
            $('#saveBtn').val("edit-room");
            $('#ajaxModel').modal('show');
            $('#id').val(id);
            $('#room_id').val(data.room_id);
            $('#seat_type_id').val(data.seat_type_id);
            $('#row_name').val(data.row_name);
            $('#seat_cols').val(data.seat_cols);
        })
    });
    $('body').on('click', '.addSeatCol', function () {
        var seat_row_id = $(this).data('id');
        $('#modelHeadingSeat').html("{{ __('label.addSeat') }}");
        $('#addBtn').val("add-seat");
        $('#ajaxSeat').modal('show');
        $('#seat_row_id').val(seat_row_id);
        $('#seat_quantity').val('');
    });
    $('body').on('click', '.editSeatCol', function () {
        var seat_col_id = $(this).data('id');
        $.get("{{ route('seat_col.index') }}" + '/' + seat_col_id + '/edit', function (data) {
            $('#modelSeatCol').html("{{ __('label.seatInfo') }}");
            $('#addBtn').val("edit-seat");
            $('#ajaxSeatCol').modal('show');
            $('#seat_col_id').val(seat_col_id);
            $('.deleteSeatCol').val(seat_col_id);
            $('#seat_col_name').val(data.seat_name);
            $('#seat_status').val(data.status);
            $('#created_at').val(data.created_at);
            $('#updated_at').val(data.updated_at);
        })
    });
    $('#addBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#seatColForm').serialize(),
            url: "{{ route('seat_col.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#seatColForm').trigger("reset");
                $('#ajaxSeat').modal('hide');
                table.draw();
                document.getElementById('mess').innerHTML = data.success;
                $('#addBtn').html('{{ __('label.saveChange') }}');
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
    $('.deleteSeatCol').click(function (e) {
        var id = $('.deleteSeatCol').val();
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            type: "DELETE",
                url: "{{ route('seat_col.store') }}" + '/' + id,
                success: function (data) {
                    $('#ajaxSeatCol').modal('hide');
                    table.draw();
                    document.getElementById('mess').innerHTML = data.success;
                    $('.deleteSeatCol').html('{{ __('label.delete') }}');
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('.deleteSeatCol').html('{{ __('label.delete') }}');
                }
        });
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#seatRowForm').serialize(),
            url: "{{ route('seat.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#seatRowForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                document.getElementById('mess').innerHTML = data.success;
                $('#saveBtn').html('{{ __('label.saveChange') }}');
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
    $('body').on('click', '.deleteSeatRow', function () {
        var id = $(this).data("id");
        if (confirm("{{ __('label.confirmDelete') }}"))
        {
            $.ajax({
                type: "DELETE",
                url: "{{ route('seat.store') }}" + '/' + id,
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
