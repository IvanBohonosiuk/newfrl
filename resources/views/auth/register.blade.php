@extends('layouts.app')

@section('title') Реєстрація @stop

@section('content')
    @include('partials.error-messages')
    {{-- <form action="{{ route('register') }}" method="post" role="form">
        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="form-group">
            <label for="first_name">Имя</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="form-group">
            <label for="last_name">Фамилия</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="roles" id="roles" value="Freelancer" checked="checked">
                Фрилансер
            </label>
            <label>
                <input type="radio" name="roles" id="roles" value="Customer">
                Заказчик
            </label>
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success">Зарегистрироватся</button>
    </form> --}}

    <form action="{{ route('register') }}" method="post" class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="first_name" name="first_name" type="text" class="validate">
                <label for="first_name">Имя</label>
            </div>
            <div class="input-field col s6">
                <input id="last_name" name="last_name" type="text" class="validate">
                <label for="last_name">Фамилия</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="login" name="login" type="text" class="validate">
                <label for="login">Логин</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
        </div>
        <p>
            <input name="roles" type="radio" id="test1" checked />
            <label for="test1">Фрилансер</label>
        </p>
        <p>
            <input name="roles" type="radio" id="test2" />
            <label for="test2">Заказчик</label>
        </p>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">Зарегистрироватся</button>
    </form>
@endsection
