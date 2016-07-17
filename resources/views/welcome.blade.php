@extends('layouts.app')
@section('title') Головна сторінка @stop
@section('content')
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h2>Фрилансеры</h2>
			<div class="freelancers">
				@foreach ($freelancers as $freelancer)
					@if ($freelancer->hasRole('Freelancer'))
						<div class="freelancer col-md-3">
							<a href="/users/{{ $freelancer->id }}"><img src="/uploads/avatars/{{ $freelancer->image }}" class="avatar freelancer_avartar"></a>
							<a href="/users/{{ $freelancer->id }}"><h3>{{ $freelancer->first_name }} {{ $freelancer->last_name }}</h3></a>
						</div>
					@endif
				@endforeach
			</div>
		</div>
    </div>
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h2>Заказчики</h2>
			<div class="freelancers">
				@foreach ($freelancers as $freelancer)
					@if ($freelancer->hasRole('Customer'))
						<div class="freelancer col-md-3">
							<a href="/users/{{ $freelancer->id }}"><img src="/uploads/avatars/{{ $freelancer->image }}" class="avatar freelancer_avartar"></a>
							<a href="/users/{{ $freelancer->id }}"><h3>{{ $freelancer->first_name }} {{ $freelancer->last_name }}</h3></a>
						</div>
					@endif
				@endforeach
			</div>
		</div>
    </div>
@stop
