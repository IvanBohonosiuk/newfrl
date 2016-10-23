@extends('layouts.app')
@section('title') {{$project->title}} @stop
@section('content')
	<div class="row">
		<div class="project col s12 m9 l9">
			<h2>{{$project->title}}</h2>
			<p class="price pull-right">${{$project->price}}</p>
			<p class="categories">
				@foreach ($project->categories as $category)
		            <a href="/project/category/{{$category->slug}}">{{$category->title}}</a>&nbsp;
		        @endforeach
	        </p>
	        <div class="description">
	        	{!! $project->description !!}
	        </div>
	        <div class="includes">
	        	@if ($project->image != '')
	        		<a href="/uploads/projects/full/{{ $project->image }}">
		        		<img src="/uploads/projects/medium/{{ $project->image }}" />
		        	</a>
	        	@endif
	        </div>
	        @if ($project->freelancer_id != 0)
	        	<h3 style="text-align: center; ">Выбранный исполнитель</h3>
	        	<div class="ispolnitel">
	        		<a href="{{ route('user.show', $project->freelancer->id) }}"><img src="/uploads/avatars/{{ $project->freelancer->image }}" class="avatar bid_avatar"></a>
					<a href="{{ route('user.show', $project->freelancer->id) }}" class="user">{{ $project->freelancer->first_name }} {{ $project->freelancer->last_name }}</a>
					<div class="meta">
						<p class="rating">{{ $project->freelancer->rating }}</p>
					</div>
	        	</div>
	        @endif
	        <h3 style="text-align: center; ">Ставки</h3>
			<div class="bids">
		        <div class="messages">
		        	@include('partials.error-messages')
		        </div>
		        @if (Auth::user())
			        @if (Auth::user()->hasRole('Freelancer') && $project->status == 'Open')
			        	<div class="form-bid">
							<form role='form' action="{{ route('bid.create') }}" method="post">
								<div class="form-group col s12 m6 l6">
									<label for="price">Стоимость</label>
									<input type="text" name="price" id="price" class="form-control" required="required">
								</div>
								<div class="form-group col s12 m6 l6">
									<label for="termin">Срок выполнения</label>
									<input type="text" name="termin" id="termin" class="form-control" required="required">
								</div>
								<div class="form-group col m12">
									<label for="description">Комментарий</label>
									<textarea class="form-control" name="description" id="description" rows="5" required="required"></textarea>
								</div>
								<div class="checkbox col m12">
									<label>
										<input type="checkbox" name="private" value="1"> Скрыть заявку от других?
									</label>
								</div>
								<input type="hidden" name="project_id" value="{{ $project->id }}">
								<input type="hidden" name="_token" value="{{ Session::token() }}">
								<button class="btn" type="submit">Добавить</button>
							</form>
						</div>
			        @endif
				@endif
				@foreach ($bids as $bid)
					@if ($project->id == $bid->project->id)
						@if ($bid->private == 0 || Auth::user() == $project->user || Auth::user() == $bid->user)
							<div class="bid" >
								<a href="{{ route('user.show', $bid->user->id) }}"><img src="/uploads/avatars/{{ $bid->user->image }}" class="avatar bid_avatar"></a>
								<a href="{{ route('user.show', $bid->user->id) }}" class="user"><span class="first_name">{{ $bid->user->first_name }}</span> {{ $bid->user->last_name }}</a>
								<p class="price pull-right"> ${{ $bid->price }}</p>
								<p class="termin pull-right"> {{ $bid->termin }} дня</p>
								<div class="meta">
									<p class="rating">{{ $bid->user->rating }}</p>
									<p class="date">{{ $bid->created_at }}</p>
								</div>
								<p class="description">{{ $bid->description }}</p>
								<div class="control">
									@if (Auth::user() == $project->user && $project->status == 'Open')
										<form role="form" action="{{ route('project.use_freelancer', $project->id) }}" method="post">
                                            <input type="hidden" name="freelancer_id" value="{{ $bid->user->id }}">
                                            <input type="hidden" name="status" value="In work">
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            <button type="submit" class="btn btn-primary pull-right ispolnitel">Выбрать исполнителем</button>
                                        </form>
									@endif
									@if (Auth::user() == $project->user && $project->status == 'In work' && $project->freelancer->id == $bid->user->id)
										<form role="form" action="{{ route('project.completed', $project->id) }}" method="post">
                                            <input type="hidden" name="freelancer_id" value="{{ $bid->user->id }}">
                                            <input type="hidden" name="status" value="Completed">
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            <button type="submit" class="btn btn-success pull-right completed">Выполнено</button>
                                        </form>
										<form role="form" action="{{ route('project.canceled', $project->id) }}" method="post">
                                            <input type="hidden" name="freelancer_id" value="{{ $bid->user->id }}">
                                            <input type="hidden" name="status" value="Canceled">
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            <button type="submit" class="btn btn-danger pull-right canceled">Не выполнено</button>
                                        </form>
									@endif
									@if (Auth::user() == $project->user && $project->status == 'Completed' && $project->freelancer->id == $bid->user->id)
										<a href="{{ route('user.review', $bid->user->id) }}" class="btn btn-success pull-right completed">Оставить отзыв о фрилансере</a>
									@endif
									@if (Auth::user() == $bid->user && $project->status == 'Completed')
										<a href="{{ route('user.review', $project->user->id) }}" class="btn btn-success pull-right completed">Оставить отзыв о заказчике</a>
									@endif
									@if (Auth::user() == $bid->user)
										{{-- <a href="#" class="btn-edit">Редактировать ставку</a> --}}
										<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Редактировать ставку</a>
										<a href="{{ route('bid.delete', ['bid_id' => $bid->id]) }}">Удалить ставку</a>
									@endif
								</div>
							</div>
						@else
							<div class="bid" >
								<div class="private_bid">
									<span style="line-height: 75px; ">
										<i class="fa fa-lock" title="Фрилансер отключил публичный показ своей ставки на этот проект"></i> 
										ставка скрыта фрилансером
									</span>
								</div>
							</div>
						@endif
					@endif
				@endforeach
			</div>
       </div>
		<div class="col s12 m3 l3">
			<h2>Заказчик</h2>
			<a href="{{ route('user.show', $project->user->id) }}"><img src="/uploads/avatars/{{ $project->user->image }}" class="avatar"></a>
			<a href="{{ route('user.show', $project->user->id) }}"><p>{{ $project->user->first_name }} {{ $project->user->last_name }}</p></a>
			<div class="meta">
				<p class="rating">{{ $project->user->rating }}</p>
			</div>
		</div>
	</div>

	<!-- Modal Trigger -->
	{{-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> --}}

	<!-- Modal Structure -->
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4>Редактирование ставки</h4>
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
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Закрыть</a>
			<a href="#!" class=" modal-action waves-effect waves-green btn-flat">Сохранить изменения</a>
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

	<script type="text/javascript">
		
		// if (Auth::user()->first_name == ) {}
	</script>

@stop