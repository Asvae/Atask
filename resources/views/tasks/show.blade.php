@extends('app')

@section('content')
    <h1><a href="{{action('TasksController@index')}}">Tasks</a></h1>
    <hr/>
    <h3>{{ $task->title }}</h3>
    <div class="body">{{ $task->body }}</div>
@stop