@extends('layouts.app')

@section('title') Реєстрація @stop

@section('content')
    <form action="{{ route('register') }}" method="post" role="form">
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">Register</button>
    </form>
@endsection
