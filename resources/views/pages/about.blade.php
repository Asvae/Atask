@extends('app')


@section('content')
   <h1>About me: {{ $name." ".$second_name }}</h1>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores blanditiis consectetur cumque deserunt dignissimos enim exercitationem, fugiat magni maiores necessitatibus nemo porro quo repellendus sapiente sit suscipit voluptate? Repellat.</p>

@if(isset($additional_info))
<p>I also have a third name</p>
@else
<p>No third name, sorry</p>

@endif

@stop

