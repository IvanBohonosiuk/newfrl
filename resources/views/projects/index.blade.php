@extends('layouts.app')
@section('title') Проекты @stop
@section('content')
	<div class="row">
		<div class="col s12 m3 l3">
			<h2>Специальность</h2>
			<ul class="cats">
				@foreach ($cats as $cat)
					<li><a href="/project/category/{{$cat->slug}}"><img src="/uploads/projects_cat/small/{{$cat->img}}"> {{$cat->title}}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="col s12 m9 l9">
			<h2>Список проектов</h2>
			@if (Auth::user())
				@if (Auth::user()->hasRole('Customer'))
					<a href="{{ route('project.create') }}" class="right btn btn-primary prj_create_proect">Создать проект</a>
				@endif
			@endif
			@foreach ($projects as $project)
				<div class="prj card-panel hoverable">
					<a href="{{ route('projects.show', ['id' => $project->id]) }}" class="title">{{ $project->title }}</a>
					<p class="price right">${{ $project->price }}</p>
					<div class="meta">
						<p class="status left">{{ $project->status }}</p>
						@if ($project->remote == 1)
							<p class="remote right">Удаленная</p>
						@endif
						<div class="user">
							<a href="{{ route('user.show', $project->user->id) }}"><img src="/uploads/avatars/{{ $project->user->image }}" class="avatar project_avatar"></a>
							<a href="{{ route('user.show', $project->user->id) }}" class="name">{{ $project->user->first_name }} {{ $project->user->last_name }}</a>
							<p><span class="rating">{{ $project->user->rating }}</span></p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@stop