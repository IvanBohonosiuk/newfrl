@extends('layouts.app')
@section('title') Личный кабинет @stop
@section('content')
	
	<div class="row">
		<div class="col s12 m12 l12">
			<h1 style="text-align: center; ">Личный кабинет</h1>
		</div>
	</div>

	<div class="row">
		<div class="col s3 m3 l3">
			<img src="/uploads/avatars/{{ $user->image }}" style="width: 200px; height: 200px; border-radius: 50%; margin: 0 auto; display: block; ">
			<h2 style="clear: both; text-align: center; font-style: 35px; ">{{ $user->first_name }} {{ $user->last_name }}</h2>
		</div>
		<div class="col s9 m9 l9">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="tabs">
					<li class="tab col s3">
						<a href="#home" class="active">Основная информация</a>
					</li>
					<li class="tab col s3">
						<a href="#image">Изображение</a>
					</li>
					<li class="tab col s3">
						<a href="#contacts">Контактные данные</a>
					</li>
					<li class="tab col s3">
						<a href="#paymentdetails">Платежные данные</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="col s12" id="home">
					<h2>Основная информация</h2>
       				@include('partials.error-messages')
					<form action="{{ route('account.save.basic') }}" method="POST" role="form">
						<div class="form-group">
							<label for="login">Логин</label>
							<input type="text" class="form-control" id="login" placeholder="Логин" name="login" value="{{ $user->login }}" disabled>
						</div>
						<div class="form-group">
							<label for="first_name">Имя</label>
							<input type="text" class="form-control" id="first_name" placeholder="Имя" name="first_name" value="{{ $user->first_name }}">
						</div>
					
						<div class="form-group">
							<label for="last_name">Фамилия</label>
							<input type="text" class="form-control" id="last_name" placeholder="Фамилия" name="last_name" value="{{ $user->last_name }}">
						</div>

						<div class="form-group">
							<label for="birthday">Дата рождения</label>
							<input type="date" name="birthday" id="birthday" class="form-control" value="{{ $user->birthday }}">
						</div>

						<div class="form-group">
							<label for="resume">Резюме</label>
							<textarea name="resume" id="resume" class="form-control editor" rows="5">{!! $user->resume !!}</textarea>
						</div>

						<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">
						
						<button type="submit" class="btn waves-effect waves-light">Сохранить</button>
					</form>
				</div>
				<div class="col s12" id="image">
					<h2>Изображение</h2>
        			@include('partials.error-messages')
					<form action="{{ route('account.save.image') }}" method="POST" role="form" enctype="multipart/form-data">
						
						<div class="file-field input-field">
							<div class="btn">
								<span>Аватар</span>
								<input type="file" id="image" name="image">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						
						<input type="hidden" name="_token" value="{{ Session::token() }}">
						
						<button type="submit" class="btn waves-effect waves-light">Сохранить</button>
					</form>
				</div>
				<div class="col s12" id="contacts">
					<h2>Контактные данные</h2>
					<form action="{{ route('account.save.contacts') }}" method="POST" role="form">
						
						<div class="form-group">
							<label for="phone">Телефон</label>
							<input type="tel" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
						</div>

						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
						</div>

						<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">
						
						<button type="submit" class="btn waves-effect waves-light">Сохранить</button>
					</form>
				</div>
				<div class="col s12" id="paymentdetails">
					<h2>Платежные данные</h2>
					<form action="{{ route('account.save.pay') }}" method="POST" role="form">
						
						<div class="form-group">
							<label for="pay_card_pb">Карта ПриватБанка</label>
							<input type="text" name="pay_card_pb" id="pay_card_pb" class="form-control" value="{{ $user->pay_card_pb }}">
						</div>

						<div class="form-group">
							<label for="pay_card_2">Платежная карта #2</label>
							<input type="text" name="pay_card_2" id="pay_card_2" class="form-control" value="{{ $user->pay_card_2 }}">
						</div>

						<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">
						
						<button type="submit" class="btn waves-effect waves-light">Сохранить</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>
@include('tinymce::tpl')

@stop