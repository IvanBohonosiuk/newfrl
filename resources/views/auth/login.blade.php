@extends('layouts.app')
@section('title') Вход @stop

@section('content')
    <form action="{{ route('login') }}" method="post">
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">Ввойти</button>
    </form>
@endsection