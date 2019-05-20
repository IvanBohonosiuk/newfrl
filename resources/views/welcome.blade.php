@extends('layouts.app')
@section('title') Головна сторінка @stop
@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
			<h2>Фрилансеры</h2>
			<div class="freelancers">
				@foreach ($freelancers as $freelancer)
					@if ($freelancer->hasRole('Freelancer'))
						<div class="freelancer col m3">
							<div class="card hoverable">
								<div class="card-image waves-effect waves-block waves-light">
									<a href="/users/{{ $freelancer->id }}"><img src="/uploads/avatars/{{ $freelancer->image }}" class="avatar freelancer_avartar activator"></a>
								</div>
								<div class="card-content">
									<a href="/users/{{ $freelancer->id }}"><h3><span class="card-title activator grey-text text-darken-4">{{ $freelancer->first_name }} {{ $freelancer->last_name }}</span></h3></a>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
    </div>
    <div class="row">
    	<div class="col s12 m12 l12">
			<h2>Заказчики</h2>
			<div class="freelancers">
				@foreach ($freelancers as $freelancer)
					@if ($freelancer->hasRole('Customer'))
						<div class="freelancer col m3">
							<div class="card hoverable">
								<div class="card-image waves-effect waves-block waves-light">
									<a href="/users/{{ $freelancer->id }}"><img src="/uploads/avatars/{{ $freelancer->image }}" class="avatar freelancer_avartar activator"></a>
								</div>
								<div class="card-content">
									<a href="/users/{{ $freelancer->id }}"><h3><span class="card-title activator grey-text text-darken-4">{{ $freelancer->first_name }} {{ $freelancer->last_name }}</span></h3></a>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
    </div>
@stop
