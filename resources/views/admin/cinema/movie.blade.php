@extends('admin.layouts.master')
@section('content')
<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createMovie">{{ __('label.createMovie') }}</a><a id="mess"></a>
    <table class="display data-table">
        <thead>
            <tr>
                <th></th>
                <th>{{ __('label.id') }}</th>
                <th>{{ __('label.name') }}</th>
                <th>{{ __('label.duration') }}</th>
                <th>{{ __('label.status') }}</th>
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
                <form id="movieForm" name="movieForm" class="form-horizontal">
                   <input type="hidden" name="movie_id" id="movie_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">{{ __('label.name') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('label.enterName') }}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select id="status" name="status">
                                <option value="">{{ __('label.chooseStatus') }}</option>
                                <option value="1">{{ __('label.showing') }}</option>
                                <option value="2">{{ __('label.soon') }}</option>
                                <option value="3">{{ __('label.closed') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{ __('label.duration') }}</label>
                        <div class="col-sm-12">
                            <input type="number" id="duration" name="duration" placeholder="{{ __('label.enterDuration') }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class="col-sm-2 control-label">{{ __('label.country') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="country" name="country" placeholder="{{ __('label.enterName') }}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="director" class="col-sm-2 control-label">{{ __('label.director') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="director" name="director" placeholder="{{ __('label.enterName') }}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">{{ __('label.type') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="type" name="type" placeholder="{{ __('label.enterName') }}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="producer" class="col-sm-2 control-label">{{ __('label.producer') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="producer" name="producer" placeholder="{{ __('label.enterName') }}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="actor" class="col-sm-2 control-label">{{ __('label.actor') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="actor" name="actor" placeholder="{{ __('label.enterName') }}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="day_start" class="col-sm-2 control-label">{{ __('label.day_start') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="day_start" name="day_start" placeholder="{{ __('label.enterName') }}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{ __('label.content') }}</label>
                        <div class="col-sm-12">
                            <textarea id="content" name="content" placeholder="{{ __('label.enterContent') }}" class="form-control"></textarea>
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
        ajax: "{{ route('movie.index') }}",
        columns: [
            {
                data: null,
                className: 'details-control',
                orderable: false,
                searchable: false,
                defaultContent: '',
            },
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'time', name: 'duration'},
            {
                data: 'status',
                name: 'status', 
                render: function (data) {
                    switch (data){
                        case '1':
                            return "{{ __('label.showing') }}";
                            break;
                        case '2':
                            return "{{ __('label.soon') }}";
                            break;
                        case '3':
                            return "{{ __('label.closed') }}";
                            break;
                        default:
                            return "{{ __('label.fail') }}";
                            break;
                    }
                },
            },
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createMovie').click(function () {
        $('#saveBtn').val("create-cinema");
        $('#movie_id').val('');
        $('#movieForm').trigger("reset");
        $('#modelHeading').html("{{ __('label.createMovie') }}");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editMovie', function () {
        var movie_id = $(this).data('id');
        $.get("{{ route('movie.index') }}" + '/' + movie_id + '/edit', function (data) {
            $('#modelHeading').html("{{ __('label.editCinema') }}");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#movie_id').val(data.id);
            $('#name').val(data.name);
            $('#duration').val(data.time);
            $('#country').val(data.country);
            $('#director').val(data.directors);
            $('#type').val(data.type);
            $('#producer').val(data.producer);
            $('#actor').val(data.cast);
            $('#day_start').val(data.day_start);
            $('#content').val(data.content);
        })
    });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('{{ __('label.sending') }}');
        $.ajax({
            data: $('#movieForm').serialize(),
            url: "{{ route('movie.store') }}",
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
    $('body').on('click', '.deleteMovie', function () {
        var movie_id = $(this).data('id');
        if (confirm("{{ __('label.confirmDelete') }}"))
        {
            $.ajax({
                type: "DELETE",
                url: "{{ route('movie.store') }}" + '/' + movie_id,
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
    $('.data-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
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
function format ( d ) {
    // `d` is the original data object for the row
    return `<table>
        <tr>
            <td>{{ __('label.country') }}</td>
            <td>` + d.country + `</td>
        </tr>
        <tr>
            <td>{{ __('label.producer') }}</td>
            <td>` + d.producer + `</td>
        </tr>
        <tr>
            <td>{{ __('label.type') }}</td>
            <td>` + d.type + `</td>
        </tr>
        <tr>
            <td>{{ __('label.director') }}</td>
            <td>` + d.directors + `</td>
        </tr>
        <tr>
            <td>{{ __('label.actor') }}</td>
            <td>` + d.cast + `</td>
        </tr>
        <tr>
            <td>{{ __('label.date') }}</td>
            <td>` + d.day_start + `</td>
        </tr>
        <tr>
            <td>{{ __('label.content') }}</td>
            <td>` + d.content + `</td>
        </tr>
    </table>`;
}
</script>
@endpush
