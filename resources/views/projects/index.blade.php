@extends('layouts.app')
@section('title') Проекты @stop
@section('content')
	<div class="row">
		<div class="col-md-3">
			<h2>Специальность</h2>
		</div>
		<div class="col-md-9">
			<h2>Список проектов</h2>
			@foreach ($projects as $project)
				<div class="prj">
					<a href="{{ $project->id }}">{{ $project->title }}</a>
					<div class="meta">
						<p class="price">{{ $project->price }}</p>
						<p class="remote">{{ $project->remote }}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@stop