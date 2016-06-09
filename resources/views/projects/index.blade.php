@extends('layouts.app')
@section('title') Проекты @stop
@section('content')
	<div class="row">
		<div class="col-md-3">
			<h2>Специальность</h2>
			<ul>
				@foreach ($cats as $cat)
					<li><a href="/project/category/{{$cat->slug}}"><img src="/uploads/projects_cat/small/{{$cat->img}}"> {{$cat->title}}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="col-md-9">
			<h2>Список проектов</h2>
			@foreach ($projects as $project)
				<div class="prj">
					<a href="{{ route('projects.show', ['id' => $project->id]) }}">{{ $project->title }}</a>
					<div class="meta">
						<p class="price">{{ $project->price }}</p>
						@if ($project->remote == 1)
							<p class="remote">Удаленная</p>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	</div>
@stop