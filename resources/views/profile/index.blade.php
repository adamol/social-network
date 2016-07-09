@extends('templates.default')

@section('content')
	<div class="col-sm-5">
		@include('user.partials.userblock')
		<hr>
	</div>
	<div class="col-sm-4 col-sm-offset-3">
		friends and friend requests
	</div>
@stop