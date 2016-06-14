@extends('layouts.app')
@section('title') Создать проект @stop
@section('content')

	@include('partials.error-messages')

	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center; ">Создать проект</h1>
			<form action="{{ route('project.create.save') }}" method="POST" role="form">
				<div class="form-group">
					<label for="title">Название проекта</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Название проекта">
				</div>
				
				<div class="form-group">
					<label for="description">Описание проекта</label>
					<textarea name="description" id="description" class="form-control editor" rows="5"></textarea>
				</div>

				<select name="cat_id" id="cat_id" class="form-control">
					<option value="">Выберите категорию</option>
					@foreach ($cats as $cat)
						<option value="{{ $cat->id }}">{{ $cat->title }}</option>
					@endforeach
				</select>
				
				<div class="form-group">
					<label for="end_date">Актуален до</label>
					<input type="date" name="end_date" id="end_date" class="form-control" required="required">
				</div>

				<div class="form-group">
					<label for="price">Бюджет проекта</label>
					<input type="number" name="price" id="price" class="form-control" step="1" required="required">
				</div>

				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" value="1" name="remote" id="remote">
							Удаленная работа
						</label>
					</div>
				</div>

				<input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

				<input type="hidden" name="_token" id="token" class="form-control" value="{{ Session::token() }}">
				<button type="submit" class="btn btn-primary">Опубликовать проект</button>
			</form>
		</div>
	</div>
	

@include('tinymce::tpl')
@stop
