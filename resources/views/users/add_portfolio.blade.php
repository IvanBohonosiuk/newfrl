@extends('layouts.app')
@section('title') Добавить работу @stop
@section('content')
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			@include('partials.error-messages')
			<form action="{{ route('portfolio.save') }}" method="POST" role="form" enctype="multipart/form-data">
				<h1>Добавить работу</h1>
			
				<div class="form-group">
					<label for="name">Название работы</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Название работы">
				</div>
			
				<div class="form-group">
					<label for="url">Ссылка</label>
					<input type="text" class="form-control" name="url" id="url" placeholder="Ссылка">
				</div>

				<div class="form-group">
					<label for="price">Стоимость</label>
					<input type="text" class="form-control" name="price" id="price" placeholder="Стоимость">
				</div>

				<div class="form-group">
					<label for="image">Скриншот</label>
					<input type="file" class="form-control" id="image" name="image">
				</div>

				<div class="form-group">
					<label for="description">Описание</label>
					<textarea name="description" id="description" class="form-control editor" rows="3"></textarea>
				</div>

				<input type="hidden" name="_token" id="token" class="form-control" value="{{ Session::token() }}">
			
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</form>
		</div>
	</div>

	@include('tinymce::tpl')

@stop