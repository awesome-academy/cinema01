@extends('admin.layouts.master')
@section('content')
<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createNewSlide">{{ __('label.createNewSlide') }}</a><a id="mess"></a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>{{ __('label.id') }}</th>
                <th>{{ __('label.movieName') }}</th>
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
                <form id="slideForm" name="slideForm" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="slide_id" id="slide_id">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select id="movie_id" name="movie_id">
                                <option value=''>{{ __('label.chooseMovie') }}</option>
                                @foreach ($movies as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{ __('label.status') }}</label>
                        <div class="col-sm-12">
                            <select id="status" name="status">
                                <option value="">{{ __('label.chooseStatus') }}</option>
                                <option value="0">{{ __('label.hide') }}</option>
                                <option value="1">{{ __('label.show') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label">{{ __('label.coverImage') }}</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="image" name="image">
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
<input type="hidden" name="routeIndex" class="routeIndex" value="{{ route('slide.index') }}">
<input type="hidden" name="routeStore" class="routeStore" value="{{ route('slide.store') }}">
<input type="hidden" name="newSlide" class="newSlide" value="{{ __('label.createNewSlide') }}">
<input type="hidden" name="editSlide" class="editSlide" value="{{ __('label.editSlide') }}">
<input type="hidden" name="confirmDel" class="confirmDel" value="{{ __('label.confirmDelete') }}">
@stop
@push('scripts')
<script type="text/javascript" src="{{ asset('custom-js/adm_slide.js') }}"></script>
@endpush
