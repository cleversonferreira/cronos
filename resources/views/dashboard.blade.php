<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cronos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
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
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <a href="{{route('create')}}">New Cronos</a>
                <hr>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Início</th>
                        <th scope="col">Fim</th>
                        <th scope="col">Progresso</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cronos as $cron)
                        <tr>
                            <th>{{$cron->id}}</th>
                            <th>{{$cron->name}}</th>
                            <th>{{$cron->deadline_start}}</th>
                            <th>{{$cron->deadline_end}}</th>
                            <th>{{$cron->progress}}</th>
                            <th>
                                <a href="{{"/cronos/{$cron->id}/"}}">view</a> |
                                <a href="{{"/cronos/edit/{$cron->id}"}}">edit</a> |
                                <a href="{{"/cronos/delete/{$cron->id}"}}">delete</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
