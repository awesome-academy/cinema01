@extends('admin.layouts.master')
@section('content')
<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createSeatPrice">{{ __('label.createSeatPrice') }}</a><a id="mess"></a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>{{ __('label.id') }}</th>
                <th>{{ __('label.roomType') }}</th>
                <th>{{ __('label.seatType') }}</th>
                <th>{{ __('label.price') }}</th>
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
                <form id="seatPriceForm" name="seatPriceForm" class="form-horizontal">
                    <input type="hidden" name="seat_price_id" id="seat_price_id">
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
                        <label for="name" class="col-sm-2 control-label">{{ __('label.price') }}</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="price" name="price" placeholder="{{ __('label.enterPrice') }}" value="">
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
        ajax: "{{ route('seat_price.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'room_type.name', name: 'room_type.name'},
            {data: 'seat_type.name', name: 'seat_type.name'},
            {data: 'price', name: 'price'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createSeatPrice').click(function () {
        $('#saveBtn').val("create-room");
        $('#seat_price_id').val('');
        $('#seatPriceForm').trigger("reset");
        $('#modelHeading').html("{{ __('label.createSeatPrice') }}");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editSeatPrice', function () {
        var seat_price_id = $(this).data('id');
        $.get("{{ route('seat_price.index') }}" + '/' + seat_price_id + '/edit', function (data) {
            $('#modelHeading').html("{{ __('label.editSeatPrice') }}");
            $('#saveBtn').val("edit-room");
            $('#ajaxModel').modal('show');
            $('#seat_price_id').val(data.id);
            $('#room_type_id').val(data.room_type_id);
            $('#seat_type_id').val(data.seat_type_id);
            $('#price').val(data.price);
        })
    });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#seatPriceForm').serialize(),
            url: "{{ route('seat_price.store') }}",
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
    $('body').on('click', '.deleteSeatPrice', function () {
        var seat_price_id = $(this).data("id");
        if (confirm("{{ __('label.confirmDelete') }}"))
        {
            $.ajax({
                type: "DELETE",
                url: "{{ route('seat_price.store') }}" + '/' + seat_price_id,
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
