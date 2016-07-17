@extends('layouts.app')
@section('title') Заказчики @stop
@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1>Заказчики</h1>
			<div class="customers">
				@foreach ($users as $customer)
					@if ($customer->hasRole('Customer'))
						<div class="customer col-md-3">
							<a href="/users/{{ $customer->id }}"><img src="/uploads/avatars/{{ $customer->image }}" class="avatar freelancer_avartar"></a>
							<a href="/users/{{ $customer->id }}"><h3>{{ $customer->first_name }} {{ $customer->last_name }}</h3></a>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
@stop