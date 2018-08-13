<!doctype html>
<html lang="{{ app()->getLocale() }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cronos</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/cover.css">

</head>
<body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Cronos</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="{{route('dashboard')}}">Dashboard</a>
                    <a class="nav-link" href="{{route('create')}}">Add new</a>
                </nav>
            </div>
        </header>