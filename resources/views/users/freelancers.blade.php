@extends('layouts.app')
@section('title') Фрилансеры @stop
@section('content')
	<div class="row">
		<div class="col s3 m3 l3">
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
		<div class="col s9 m9 9 l9">
			<h2>Фрилансеры</h2>
			<div class="freelancers">
				@foreach ($users as $freelancer)
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
@stop