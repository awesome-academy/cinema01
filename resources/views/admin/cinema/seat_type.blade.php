@extends('admin.layouts.master')
@section('content')
<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createSeatType">{{ __('label.createSeatType') }}</a><a id="mess"></a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>{{ __('label.id') }}</th>
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
            <div class="modal-body">
                <form id="seatTypeForm" name="seatTypeForm" class="form-horizontal">
                   <input type="hidden" name="seat_type_id" id="seat_type_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">{{ __('label.name') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('label.enterName') }}" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{ __('label.note') }}</label>
                        <div class="col-sm-12">
                            <textarea id="note" name="note" required="" placeholder="{{ __('label.enterNote') }}" class="form-control"></textarea>
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
        ajax: "{{ route('seat_type.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'note', name: 'note'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createSeatType').click(function () {
        $('#saveBtn').val("create-seat_type");
        $('#seat_type_id').val('');
        $('#seatTypeForm').trigger("reset");
        $('#modelHeading').html("{{ __('label.createSeatType') }}");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editSeatType', function () {
        var seat_type_id = $(this).data('id');
        $.get("{{ route('seat_type.index') }}" +'/' + seat_type_id + '/edit', function (data) {
            $('#modelHeading').html("{{ __('label.editCinema') }}");
            $('#saveBtn').val("edit-seat_type");
            $('#ajaxModel').modal('show');
            $('#seat_type_id').val(data.id);
            $('#name').val(data.name);
            $('#address').val(data.address);
            $('#note').val(data.note);
        })
    });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#seatTypeForm').serialize(),
            url: "{{ route('seat_type.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#seatTypeForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                document.getElementById("mess").innerHTML = data.success;
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('{{ __('label.saveChange') }}');
            }
        });
    });
    $('body').on('click', '.deleteSeatType', function () {
        var seat_type_id = $(this).data("id");
        if (confirm("{{ __('label.confirmDelete') }}"))
        {
            $.ajax({
                type: "DELETE",
                url: "{{ route('seat_type.store') }}" + '/' + seat_type_id,
                success: function (data) {
                    table.draw();
                    document.getElementById("mess").innerHTML = data.success;
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });    
});
</script>
@endpush
