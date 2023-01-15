<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GML - Usuarios</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="//fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons"/>


    <title>{{ config('app.name', 'GML') }}</title>
    <link href="{{ asset('img/ICON.png') }}" type="image/x-icon" rel="icon"/>
    <link href="{{ asset('img/ICON.png') }}" type="image/x-icon" rel="shortcut icon"/>

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body class="has-fixed-sidena">

<div id="app">
    <header>
        <div class="navbar-fixed_">
            <nav class="navbar white">
                <div class="nav-wrapper blue-grey darken-4">
                    <ul id="nav-mobile" class="right">

                        <li class="divider"></li>
                        <li class="">
                            <a class="dropdown-trigger dropdown-menus" href="#" data-target="dropdown-perfil">
                                <i class="material-icons left">
                                    person_pin
                                </i>
                                JulianN
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    </ul>
                    <a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons white-text">menu</i></a>

                </div>
            </nav>
        </div>
        <ul id="sidenav-left" class="sidenav sidenav-fixed">
            <li>
                <div class="user-view center-align">

                    <i class="large material-icons ">assignment_ind</i>

                    <label>
                        <span class="name center">Gestión de usuarios</span>
                    </label>
                    <!-- <a href="#email"><span class=" email">jdandturk@gmail.com</span></a> -->
                </div>
            </li>
            <li>
                <a href="/" class="waves-effect active">
                    <i class="material-icons">web</i>
                    Inicio
                </a>
            </li>
            <li>
                <a href="/users" class="waves-effect active">
                    <i class="material-icons">people</i>
                    Usuarios
                </a>
            </li>

        </ul>

    </header>
    <main>
        @yield('content')
    </main>

</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('js/materialize.js') }}" defer></script>
<script src="{{ asset('js/init.js') }}" defer></script>

<!-- Sweet alert -->
<script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

<!--  Scripts especificos -->
@yield('myscripts')
</body>
</html>
