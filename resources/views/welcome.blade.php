<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bolsa De Pulpos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("img/octopus.jpg");
                background-size: cover;
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                display: flex;
                align-items: start;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-top: 170px;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
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
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bolsa De Pulpos
                </div>
            </div>
        </div>
    </body>
</html>
