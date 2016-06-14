@extends('layouts.app')
@section('title') {{$project->title}} @stop
@section('content')
	<div class="row">
		<div class="col-md-9">
			<h2>{{$project->title}}</h2>
			<p class="price">{{$project->price}} грн.</p>
			<p>
				@foreach ($project->categories as $category)
		            <a href="/project/category/{{$category->slug}}">{{$category->title}}</a>&nbsp;
		        @endforeach
	        </p>
	        <div>
	        	{!! $project->description !!}
	        </div>
	        <div class="includes">
	        	@if ($project->image != '')
	        		<a href="/uploads/projects/full/{{ $project->image }}">
		        		<img src="/uploads/projects/medium/{{ $project->image }}" />
		        	</a>
	        	@endif
	        </div>
	        @include('partials.error-messages')
	        @if (Auth::user())
		        @if (Auth::user()->hasRole('Freelancer'))
		        	<div class="form-bid">
						<form role='form' action="{{ route('bid.create') }}" method="post">
							<div class="form-group">
								<label for="price">Стоимость</label>
								<input type="text" name="price" id="price" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label for="termin">Срок выполнения</label>
								<input type="text" name="termin" id="termin" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label for="description">Комментарий</label>
								<textarea class="form-control" name="description" id="description" rows="5" required="required"></textarea>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="private" value="1"> Скрыть заявку от других?
								</label>
							</div>
							<input type="hidden" name="project_id" value="{{ $project->id }}">
							<input type="hidden" name="_token" value="{{ Session::token() }}">
							<button class="btn btn-primary" type="submit">Добавить</button>
						</form>
					</div>
		        @endif
			@endif
			<div class="bids">
				@foreach ($bids as $bid)
					@if ($project->id == $bid->project->id)
						@if ($bid->private == 0 || Auth::user() == $project->user || Auth::user() == $bid->user)
							<div class="bid" >
								<p class="price pull-right"> {{ $bid->price }} грн.</p>
								<p class="termin pull-right"> {{ $bid->termin }} дня</p>
								<div class="meta">
									<a href="/users/{{ $bid->user->id }}"><img src="/uploads/avatars/{{ $bid->user->image }}" class="avatar bid_avatar"></a>
									<a href="/users/{{ $bid->user->id }}" class="user">{{ $bid->user->first_name }} {{ $bid->user->last_name }}</a>
									<p class="date">{{ $bid->created_at }}</p>
								</div>
								<p class="description">{{ $bid->description }}</p>
								<div class="control">
									@if (Auth::user() == $project->user)
										<a href="{{ route('project.use_freelancer') }}">Выбрать исполнителем</a>
									@endif
									@if (Auth::user() == $bid->user)
										<a href="#" class="btn-edit">Редактировать ставку</a>
										<a href="{{ route('bid.delete', ['bid_id' => $bid->id]) }}">Удалить ставку</a>
									@endif
								</div>
							</div>
						@else
							<div class="bid" >
								<div class="private_bid">
									<span style="line-height: 75px; ">
										<i class="fa fa-lock with-tooltip" title="" data-original-title="Фрилансер отключил публичный показ своей ставки на этот проект"></i> 
										ставка скрыта фрилансером
									</span>
								</div>
							</div>
						@endif
					@endif
				@endforeach
			</div>
       </div>
		<div class="col-md-3">
			<h2>Заказчик</h2>
			<a href="/users/{{ $project->user->id }}"><img src="/uploads/avatars/{{ $project->user->image }}" class="avatar"></a>
			<a href="/users/{{ $project->user->id }}"><p>{{ $project->user->first_name }} {{ $project->user->last_name }}</p></a>
			
		</div>
	</div>
	<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Редактирование ставки</h4>
				</div>
				<div class="modal-body">
					<form role='form' action="" method="post">
						<div class="form-group">
							<label for="price">Стоимость</label>
							<input type="text" name="price" id="price-edit" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label for="termin">Срок выполнения</label>
							<input type="text" name="termin" id="termin" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label for="description">Комментарий</label>
							<textarea class="form-control" name="description" id="description" rows="5" required="required"></textarea>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="private" value="1"> Скрыть заявку от других?
							</label>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
					<button type="button" class="btn btn-primary">Сохранить изменения</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop