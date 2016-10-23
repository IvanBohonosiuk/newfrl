@extends('layouts.app')
@section('title') {{ $user->first_name }} {{ $user->last_name }} @stop
@section('content')
	<div class="row">
		<div class="col s12 m12 l12">
			<img src="/uploads/avatars/{{ $user->image }}" class="avatar">
			<h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="tabs">
					<li class="tab col s3">
						<a href="#home" class="active">Информация</a>
					</li>
					@if ($user->hasRole('Customer'))
						<li class="tab col s3">
							<a href="#project">Проекты</a>
						</li>
					@endif
					@if ($user->hasRole('Freelancer'))
						<li class="tab col s3">
							<a href="#resume">Резюме</a>
						</li>
						<li class="tab col s3">
							<a href="#portfolio">Портфолио</a>
						</li>
					@endif
					<li class="tab col s3">
						<a href="#review">Отзивы</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="col s12" id="home">
					<h2>Информация</h2>
					@if (Auth::user())
						@if (Auth::user()->id == $user->id)
							<a href="{{ route('dashboard') }}" class="btn right" style="top: -60px; position: relative;">Редактировать</a>
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
					<div class="col s12" id="project">
						<h2>Проекты</h2>
						@if (Auth::user())
							@if (Auth::user()->id == $user->id)
								<a href="{{ route('project.create') }}" class="btn right" style="top: -60px; position: relative;">Добавить проект</a>
							@endif
						@endif
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
					<div class="col s12" id="resume">
						<h2>Резюме</h2>
						<div class="resume">
							{!! $user->resume !!}
						</div>
					</div>
					<div class="col s12" id="portfolio">
						<h2>Портфолио</h2>
						@if (Auth::user())
							@if (Auth::user()->id == $user->id)
								<a href="{{ route('portfolio.add') }}" class="add_work btn right" style="top: -60px; position: relative;">Добавить работу</a>
							@endif
						@endif
						<div class="portfolios">
							@foreach ($user->portfolios as $portfolio)
									<div class="portfolio col m3">
										<a href="{{ $portfolio->url }}" target="_blank" class="left"><h2>{{ $portfolio->name }}</h2></a>
										@if ($portfolio->price)
											<p class="price right btn">
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
				<div class="col s12" id="review">
					<h2>Отзивы</h2>
					<div class="row">
						<div class="col s12 m12 l12">
							@foreach ($reviews as $review)
								@if ($review->rateable_id == $user->id)
									<div class="review">
										<div class="content">
											{!! $review->content !!}
										</div>
										<div class="meta">
										</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop