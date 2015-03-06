@extends('app')

@section('content')
    <h1>Make a New Task</h1>
    <hr/>

    {!! Form::open(['action' => 'TasksController@store']) !!}
        @include('tasks._form',['submitButtonText' => 'Add task'])
    {!! Form::close() !!}

    @include('errors.list')

@stop