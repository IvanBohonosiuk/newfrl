@extends('layouts.app')
@section('title') Вход @stop

@section('content')
    <form action="{{ route('login') }}" method="post">
        <div class="input-group">
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="input-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password">
        </div>
        {{ csrf_field() }}
        <button type="submit">Ввойти</button>
    </form>
@endsection