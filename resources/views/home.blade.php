@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
                    <ul>
                        <li><a href="tasks">Tables</a></li>
                        <li><a href="tasks/db">DB</a></li>
                    </ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
