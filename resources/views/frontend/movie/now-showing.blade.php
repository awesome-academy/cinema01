@extends('frontend.layouts.master')
@section('content')
<section class="container">
	<ul class="nav nav-tabs">
	    <li class="active">
	        <a>{{ __('label.now') }}</a>
	    </li>
	    <li>
	        <a href="{{ ('comming-soon') }}">{{ __('label.soon') }}</a>
	    </li>
	</ul>
    <div class="col-sm-12">
    	<div class="cinema-wrap">
            <div class="row">
                @foreach ($movie as $data)
                	<div class="col-xs-6 col-sm-3 cinema-item">
                		<div class="cinema">
	                        <a href='{{ route('movie-detail.show', ['id' => $data->id]) }}' class="cinema__images">
	                            <img alt='' src="{{ asset(config('app.image_url') . '406x600.jpg') }}">
	                            <span class="cinema-rating">{{ __('label.rate', ['data' => round($data->votes->avg('point'), 1)]) }}</span>
	                        </a>
	                        <a class="cinema-title">{{ $data->name }}</a>
	                    </div>
	                </div>
                @endforeach
            </div>
        </div>
	</div>
</section>
@endsection
