@extends('layouts.app')
@section('title') Создать проект @stop
@section('content')

	@include('partials.error-messages')

	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('projects.create') }}" method="POST" role="form">
				<legend>Создать проект</legend>
			
				<div class="form-group">
					<label for="title">Название проекта</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Название проекта">
				</div>
				
				<div class="form-group">
					<label for="description">Описание проекта</label>
					<textarea name="description" id="description" name="description" class="form-control" rows="5" required="required"></textarea>
				</div>
				
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

				<input type="hidden" name="_token" id="token" class="form-control" value="{{ Session::token() }}">

				<button type="submit" class="btn btn-primary">Опубликовать проект</button>

			</form>
		</div>
	</div>

@stop
