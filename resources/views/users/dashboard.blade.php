@extends('layouts.app')
@section('title') Личный кабинет @stop
@section('content')
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1>Личный кабинет</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<form action="{{ route('account.save') }}" method="POST" role="form" enctype="multipart/form-data">
			
				<div class="form-group">
					<label for="first_name">Имя</label>
					<input type="text" class="form-control" id="first_name" placeholder="Имя" name="first_name" value="{{ $user->first_name }}">
				</div>
			
				<div class="form-group">
					<label for="last_name">Фамилия</label>
					<input type="text" class="form-control" id="last_name" placeholder="Фамилия" name="last_name" value="{{ $user->last_name }}">
				</div>

				<div class="form-group">
					<label for="image">Аватар</label>
					<input type="file" class="form-control" id="image" name="image">
				</div>
				
				<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">
				
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</form>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<img src="/uploads/avatars/{{ $user->image }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin: 0 25px; ">
		</div>
	</div>

@stop