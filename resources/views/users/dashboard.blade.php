@extends('layouts.app')
@section('title') Личный кабинет @stop
@section('content')
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 style="text-align: center; ">Личный кабинет</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<img src="/uploads/avatars/{{ $user->image }}" style="width: 200px; height: 200px; border-radius: 50%; margin: 0 auto; display: block; ">
			<h2 style="clear: both; text-align: center; font-style: 35px; ">{{ $user->first_name }} {{ $user->last_name }}</h2>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Основная информация</a>
					</li>
					<li role="presentation">
						<a href="#image" aria-controls="image" role="tab" data-toggle="tab">Изображение</a>
					</li>
					<li role="presentation">
						<a href="#contacts" aria-controls="contacts" role="tab" data-toggle="tab">Контактные данные</a>
					</li>
					<li role="presentation">
						<a href="#paymentdetails" aria-controls="paymentdetails" role="tab" data-toggle="tab">Платежные данные</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
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
							
							<button type="submit" class="btn btn-primary">Сохранить</button>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane" id="image">
						<h2>Изображение</h2>
	        			@include('partials.error-messages')
						<form action="{{ route('account.save.image') }}" method="POST" role="form" enctype="multipart/form-data">
							
							<div class="form-group">
								<label for="image">Аватар</label>
								<input type="file" class="form-control" id="image" name="image">
							</div>
							
							<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">
							
							<button type="submit" class="btn btn-primary">Сохранить</button>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane" id="contacts">
						<h2>Контактные данные</h2>
						<form action="{{ route('account.save.contacts') }}" method="POST" role="form">
							
							<div class="form-group">
								<label for="phone">Телефон</label>
								<input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
							</div>

							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
							</div>

							<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">
							
							<button type="submit" class="btn btn-primary">Сохранить</button>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane" id="paymentdetails">
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
							
							<button type="submit" class="btn btn-primary">Сохранить</button>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
@include('tinymce::tpl')

@stop