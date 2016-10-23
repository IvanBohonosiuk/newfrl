<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("description")
    @yield("keywords")

    <title>@yield("title")</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/main.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    @yield("styles")

    <style>
        body {
            font-family: 'Comfortaa';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="nav-wrapper">
        <div class="container">
            <a href="#" data-activates="slide-out" class="button-collapse left hide-on-large-only"><i class="material-icons">menu</i></a>
            <a href="{{ url('/') }}" class="brand-logo center">ОРГАНАЙЗЕР</a>
            <a href="#" data-activates="slide-out2" class="button-collapse right hide-on-large-only"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
                <li><a href="{{ url('/') }}">Главная</a></li>
                <li><a href="/projects">Проекты</a></li>
                <li><a href="{{ route('freelancers') }}">Фрилансеры</a></li>
                <li><a href="#">Магазин</a></li>
                @if (Auth::user())
                    @if (Auth::user()->hasRole('Freelancer'))
                        <li><a href="#">Чат фрилансеров</a></li>
                    @endif
                @endif
            </ul>
            <ul class="right hide-on-med-and-down">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Вход</a></li>
                    <li><a href="{{ url('/register') }}">Регистрация</a></li>
                @else
                    <ul id="dropdown1" class="dropdown-content">
                        @if (Auth::user()->hasRole('Admin'))
                            <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-sign-in"></i>Админка</a></li>
                            <li class="divider"></li>
                        @endif
                        <li><a href="{{ route('dashboard') }}"><i class="fa fa-btn fa-tachometer"></i>Личный кабинет</a></li>
                        <li><a href="{{ url('/users/') }}/{{ Auth::user()->id }}"><i class="fa fa-btn fa-user"></i>Мой профиль</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выход</a></li>
                    </ul>
                    <li class="dropdown">
                        <a href="#!" class="dropdown-button" data-activates="dropdown1">
                            <img class="circle responsive-img" src="/uploads/avatars/{{ Auth::user()->image }}" style="width: 40px; float: left; margin: 12px 10px; ">
                            <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <ul id="slide-out" class="side-nav">
        <li><a href="{{ url('/') }}">Главная</a></li>
        <li><a href="/projects">Проекты</a></li>
        <li><a href="{{ route('freelancers') }}">Фрилансеры</a></li>
        <li><a href="#">Магазин</a></li>
        @if (Auth::user())
            @if (Auth::user()->hasRole('Freelancer'))
                <li><a href="#">Чат фрилансеров</a></li>
            @endif
        @endif
    </ul>
    <ul id="slide-out2" class="side-nav">
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Вход</a></li>
            <li><a href="{{ url('/register') }}">Регистрация</a></li>
        @else
            <li>
                <div class="userView">
                    <img class="background" src="/img/office.jpg">
                    <a href="{{ route('dashboard') }}">
                        <img class="circle responsive-img" src="/uploads/avatars/{{ Auth::user()->image }}" >
                    </a>
                    <a href="#!name"><span class="white-text name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></a>
                </div>
            </li>
            @if (Auth::user()->hasRole('Admin'))
                <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-sign-in"></i>Админка</a></li>
                <li class="divider"></li>
            @endif
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-btn fa-tachometer"></i>Личный кабинет</a></li>
            <li><a href="{{ url('/users/') }}/{{ Auth::user()->id }}"><i class="fa fa-btn fa-user"></i>Мой профиль</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выход</a></li>
        @endif
    </ul>
    {{-- <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                
            </div>
            <div class="col-xs-12 header" id="app-navbar-collapse">
                <div class="logo text-center">
                    <!-- <a href="/"><img width="100px" src="/img/logo.png"></a> -->
                    <h1><a href="/">ОРГАНАЙЗЕР</a></h1>
                </div>
                <div class="menu">
                    <ul class="left-menu nav navbar-nav">
                        <li><a href="{{ url('/') }}">Главная</a></li>
                        <li><a href="/projects">Проекты</a></li>
                        <li><a href="{{ route('freelancers') }}">Фрилансеры</a></li>
                        <li><a href="#">Магазин</a></li>
                        @if (Auth::user())
                            @if (Auth::user()->hasRole('Freelancer'))
                                <li><a href="#">Чат фрилансеров</a></li>
                            @endif
                        @endif    
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Вход</a></li>
                            <li><a href="{{ url('/register') }}">Регистрация</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="/uploads/avatars/{{ Auth::user()->image }}" style="width: 25px; height: 25px; float: left; border-radius: 50%; margin: -3px 5px 0; ">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @if (Auth::user()->hasRole('Admin'))
                                        <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-sign-in"></i>Админка</a></li>
                                    @endif
                                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-btn fa-tachometer"></i>Личный кабинет</a></li>
                                    <li><a href="{{ url('/users/') }}/{{ Auth::user()->id }}"><i class="fa fa-btn fa-user"></i>Мой профиль</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выход</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            
        </div>
    </nav> --}}

    <div class="container">
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::to('js/jquery.maskedinput.min.js') }}"></script>
    @yield("scripts")
    <script type="text/javascript" src="{{ URL::to('js/app.js') }}"></script>

</body>
</html>
