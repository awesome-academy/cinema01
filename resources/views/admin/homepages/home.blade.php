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
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">{{ __('label.chart_user', ['data' => $countUser]) }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">{{ __('label.chart_detail') }}</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-film"></i>
                    </div>
                    <div class="mr-5">{{ __('label.chart_movie', ['data' => $countMovie]) }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('movie.index') }}">
                    <span class="float-left">{{ __('label.chart_detail') }}</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-ticket-alt"></i>
                    </div>
                    <div class="mr-5">{{ __('label.chart_ticket', ['data' => $countMovie]) }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">{{ __('label.chart_detail') }}</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-money-bill-wave"></i>
                    </div>
                    <div class="mr-8">{{ __('label.chart_money', ['data' => number_format($totalMoney)]) }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">{{ __('label.chart_detail') }}</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        {!! $rating->container() !!}
    </div>
    {!! $rating->script() !!}
    <div class="col-md-6">
        {!! $tav->container() !!}
    </div>
    {!! $tav->script() !!}
</div>
@endsection
