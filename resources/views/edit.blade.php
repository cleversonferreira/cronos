@extends('layouts.theme')

@section('content')
@section('page_title')Edit Project @endsection

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

@endsection