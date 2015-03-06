@extends('...app')

@section('content')
    <h1>Database overview</h1>
    @foreach($data as $key => $dbs)
        <hr/>
        <h3>{{ $key }}</h3>
        <table class="table table-condensed table-bordered">
            <tr>
                @foreach($dbs[0]->toArray() as $field_key=>$field)
                <th>{{ucfirst($field_key)}}</th>
                @endforeach
            </tr>
            @foreach($dbs as $row)
            <tr>
                @foreach($row->toArray() as $field)
                <td>{{$field}}</td>
                @endforeach
                <td>
                    {!! Form::model($row, ['action' => ['TasksController@destroy', $row['id']], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'form-control']) !!}
                    {!! Form::close() !!}
                </td>

            </tr>
            @endforeach
        </table>
    @endforeach

@stop