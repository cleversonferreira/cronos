@extends('layouts.theme')

@section('content')
    @section('page_title')My Projects @endsection

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Deadline</th>
            <th scope="col">Progress</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cronos as $cron)
            <tr>
                <th>{{$cron->id}}</th>
                <th>{{$cron->name}}</th>
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
@endsection