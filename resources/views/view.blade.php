@extends('layouts.view')

@section('content')

    <div class="flex-center position-ref full-height">
        <div class="content">
            <h1 class="view-title">{{$cronos->name}}</h1>
            <div class="clock"></div>
        </div>
    </div>

@endsection