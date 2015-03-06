@extends('app')

@section('content')
    <h1><a href="{{action('TasksController@index')}}">Tasks</a></h1>
    <hr/>

    @foreach($tasks as $task)
        <h3><a href="{{action('TasksController@show', [$task->id])}}">{{ $task->title }}</a></h3>
        <div class="body">{{$task->id}}. {{ $task->body }}</div>
    @endforeach
@stop