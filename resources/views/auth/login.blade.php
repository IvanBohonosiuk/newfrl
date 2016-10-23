@extends('layouts.app')
@section('title') Вход @stop

@section('content')
    @include('partials.error-messages')
    {{-- <form action="{{ route('login') }}" method="post">
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">Войти</button>
    </form> --}}

    <form action="{{ route('login') }}" method="post" class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="email" name="email" type="email" class="validate">
                <label for="email">E-Mail</label>
            </div>
            <div class="input-field col s6">
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Пароль</label>
            </div>
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">Войти</button>
    </form>
@endsection