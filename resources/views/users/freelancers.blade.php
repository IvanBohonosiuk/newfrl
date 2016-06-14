@extends('layouts.app')
@section('title') Фрилансеры @stop
@section('content')
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<h2>Специальность</h2>
			<ul>
				@foreach ($cats as $cat)
					<li>
						<a href="/project/category/{{ $cat->slug }}">
							<img src="/uploads/projects_cat/small/{{ $cat->img }}"> {{ $cat->title }}
						</a>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<h1>Фрилансеры</h1>
			<div class="freelancers">
				@foreach ($users as $freelancer)
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
@stop