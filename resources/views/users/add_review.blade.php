@extends('layouts.app')
@section('title') Добавить отзыв @stop
@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1>Оставить отзыв</h1>
			<div class="messages">
				@include('partials.error-messages')
			</div>
			<form action="{{ route('user.review.save') }}" method="POST" role="form">

				<div class="form-group">
					<textarea name="content" id="content" class="form-control editor" rows="3"></textarea>
				</div>
			
				<div class="form-group">
					<label for="type_review">Тип отзыва</label>
					<div class="radio">
						<label>
							<input type="radio" name="type_review" id="type_review" value="1" checked="checked">
							Положительный отзыв
						</label>
						<label>
							<input type="radio" name="type_review" id="type_review" value="2">
							Отрицательный отзыв
						</label>
					</div>
				</div>

				@if ($user->hasRole('Freelancer'))
					<input type="hidden" name="freelancer_id" id="freelancer_id" class="form-control" value="{{ $user->id }}">
					<input type="hidden" name="customer_id" id="customer_id" class="form-control" value="{{Auth::user()->id}}">
				@else
					<input type="hidden" name="freelancer_id" id="freelancer_id" class="form-control" value="{{Auth::user()->id}}">
					<input type="hidden" name="customer_id" id="customer_id" class="form-control" value="{{ $user->id }}">
				@endif

				<input type="hidden" name="_token" id="token" class="form-control" value="{{ Session::token() }}">

				<button type="submit" class="btn btn-success">Оставыть отзыв</button>

			</form>
		</div>
	</div>

	@include('tinymce::tpl')

@stop