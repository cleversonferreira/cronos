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
                <form method="post" action="{{route('update', ['id' => $cronos->id])}}">
                    {{method_field('PUT')}}
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="name">Nome</label><br>
                        <input type="text" placeholder="Nome" name="name" value="{{$cronos->name}}">
                    </div>
                    <div class="form-group">
                        <label for="sku">Deadline Start</label><br>
                        <input type="text" placeholder="Deadline Start" name="deadline_start" value="{{$cronos->deadline_start}}">
                    </div>
                    <div class="form-group">
                        <label for="sku">Deadline End</label><br>
                        <input type="text" placeholder="Deadline End" name="deadline_end" value="{{$cronos->deadline_end}}">
                    </div>
                    <div class="form-group">
                        <label for="sku">Progress</label><br>
                        <input type="text" placeholder="Progress" name="progress" value="{{$cronos->progress}}">
                    </div>
                    <button class="btn btn-dark" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </body>
</html>
