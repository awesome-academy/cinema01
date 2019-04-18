@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered" id="cinemas-table">
    <thead>
        <tr>
            <th>{{ __('label.id') }}</th>
            <th>{{ __('label.name') }}</th>
            <th>{{ __('label.address') }}</th>
            <th>{{ __('label.created_at') }} At</th>
            <th>{{ __('label.action') }}</th>
        </tr>
    </thead>
</table>
@stop
@push('scripts')
<script>
$(function() {
    $('#cinemas-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('cinema.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action' }
        ]
    });
});
</script>
@endpush
