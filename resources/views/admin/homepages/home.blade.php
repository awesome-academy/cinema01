@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin-home') }}">{{ __('label.dashboard') }}</a>
            </li>
        </ol>
        <!-- Page Content -->
    </div>
@endsection()
