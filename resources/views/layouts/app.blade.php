<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bolsa De Pulpos</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            display: block;
            padding: 20px;
        }
        .links{
            padding-top: 70px;
            position: fixed;
            background-color: #fff;
            left: 0;
            height: 100vh;
            z-index: -3;
            border-right: 1px solid #d3e0e9;
            min-width: 270px;
        }
        .navbar-brand{
            color: #1a1a20;
            font-weight: bold;
            position: fixed;
            left: 15px;
            margin-top: 15px;
            font-size: 30px !important;
        }
        .modal-body{
            padding: 15px !important;
            text-align: center;
        }
    </style>

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Bolsa De Pulpos
                    </a>
                    <!-- Authentication Links -->
                    @if (!Auth::guest())
                        @if (Route::has('login'))
                            <div class="links">
                                @if (Auth::check())

                                    @if(Auth::user()->hasRole('deblock'))
                                        <a href="{{ url('/deblock') }}">Desbloquear Administración</a>

                                        <a href="{{ url('/whitelist') }}">whitelist</a>
                                    @endif
                                    @if(Auth::user()->hasRole('remito'))
                                        <a href="{{ url('/administraciones') }}">Administraciones</a>
                                    @endif
                                    @if(Auth::user()->hasRole('superAdmin'))
                                        <a href="{{ url('/register') }}">Registrar</a>
                                    @endif
                                    @if(Auth::user()->hasRole('report'))
                                        <a href="{{ url('/report') }}">Reporte</a>
                                        <a href="{{ url('/busqueda') }}">Busqueda</a>
                                    @endif

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endif
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </nav>
         @if(Auth::guest())
            @yield('content')
         @else
            <div style="margin-left: 200px; margin-top: 0">
                @yield('content')
            </div>
         @endif


    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
