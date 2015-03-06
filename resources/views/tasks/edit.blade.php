@extends('app')

@section('content')
    <h1>Edit: {!! $task->title !!}</h1>
    <hr/>

    {!! Form::model($task, ['action' => ['TasksController@update', $task->id], 'method' => 'patch']) !!}
        @include('tasks._form',['submitButtonText' => 'Update task'])
    {!! Form::close() !!}

    @include('errors.list')

@stop