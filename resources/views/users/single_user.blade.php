@extends('layouts.app')
@section('title') {{ $user->first_name }} {{ $user->last_name }} @stop
@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<img src="/uploads/avatars/{{ $user->image }}" class="avatar">
			<h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Информация</a>
					</li>
					@if ($user->hasRole('Customer'))
						<li role="presentation">
							<a href="#project" aria-controls="project" role="tab" data-toggle="tab">Проекты</a>
						</li>
					@endif
					@if ($user->hasRole('Freelancer'))
						<li role="presentation">
							<a href="#resume" aria-controls="resume" role="tab" data-toggle="tab">Резюме</a>
						</li>
						<li role="presentation">
							<a href="#portfolio" aria-controls="portfolio" role="tab" data-toggle="tab">Портфолио</a>
						</li>
					@endif
					<li role="presentation">
						<a href="#review" aria-controls="review" role="tab" data-toggle="tab">Отзивы</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<h2>Информация</h2>
						@if (Auth::user())
							@if (Auth::user()->id == $user->id)
								<a href="{{ route('dashboard') }}" class="btn btn-primary pull-right">Редактировать</a>
							@endif
						@endif
						<div class="basic">
							@if ($user->birthday != '')
								<p>
									<span class="title" style="font-weight: bold; ">Дата рождения:</span>
									<span class="desc">{{ $user->birthday }}</span>
								</p>
							@endif
							@if ($user->phone != '')
								<p>
									<span class="title">Телефон:</span>
									<span class="desc">{{ $user->phone }}</span>
								</p>
							@endif
						</div>
					</div>
					@if ($user->hasRole('Customer'))
						<div role="tabpanel" class="tab-pane" id="project">
							<h2>Проекты</h2>
							@foreach ($user->projects as $project)
								<div class="prj">
									<a href="{{ route('projects.show', ['id' => $project->id]) }}">{{ $project->title }}</a>
									<div class="meta">
										<p class="price">{{ $project->price }}</p>
										@if ($project->remote == 1)
											<p class="remote">Удаленная</p>
										@endif
									</div>
								</div>
							@endforeach
						</div>
					@endif
					@if ($user->hasRole('Freelancer'))
						<div role="tabpanel" class="tab-pane" id="resume">
							<h2>Резюме</h2>
							<div class="resume">
								{!! $user->resume !!}
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="portfolio">
							<h2>Портфолио</h2>
							@if (Auth::user())
								@if (Auth::user()->id == $user->id)
									<a href="{{ route('portfolio.add') }}" class="add_work btn btn-primary pull-right">Добавить работу</a>
								@endif
							@endif
							<div class="portfolios">
								@foreach ($user->portfolios as $portfolio)
										<div class="portfolio col-md-3">
											<a href="{{ $portfolio->url }}" target="_blank" class="pull-left"><h2>{{ $portfolio->name }}</h2></a>
											@if ($portfolio->price)
												<p class="price pull-right btn btn-primary">
													${{ $portfolio->price }}
												</p>
											@endif
											@if ($portfolio->image != '')
												<a href="{{ $portfolio->url }}" target="_blank"><img src="/uploads/portfolio/full/{{ $portfolio->image }}" width="100%"></a>
											@endif
											<div class="portfolio_desc">
												{!! $portfolio->description !!}
											</div>

										</div>
								@endforeach
							</div>
						</div>
					@endif
					<div role="tabpanel" class="tab-pane" id="review">
						<h2>Отзивы</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop