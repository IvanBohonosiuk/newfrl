@extends('layouts.app')
@section('title') {{$cat->title}} @stop
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
			
		</div>
	</div>
@stop