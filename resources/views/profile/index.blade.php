@extends('templates.default')

@section('content')
	<div class="col-sm-5">
		@include('user.partials.userblock')
		<hr>
	</div>
	<div class="col-sm-4 col-sm-offset-3">
		<h4>{{ $user->getFirstNameOrUsername() }}'s friends</h4>
		@if (!$user->friends()->count())
			<p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
		@else
			@foreach ($user->friends() as $user)
				@include('user/partials/userblock')
			@endforeach
		@endif
	</div>
@stop