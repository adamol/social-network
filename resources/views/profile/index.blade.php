@extends('templates.default')

@section('content')
	<div class="col-sm-5">
		@include('user.partials.userblock')
		<hr>
	</div>
	<div class="col-sm-4 col-sm-offset-3">
		@if (Auth::user()->hasFriendRequestPending($user))
			<p>Waiting for {{ $user->getNameOrUsername() }} to accept your request.</p>
		@elseif (Auth::user()->hasReceivedFriendRequest($user))
			<a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary">Accept friend request</a>
		@elseif (Auth::user()->isFriendsWith($user))
			<p>You and {{ $user->getNameOrUsername() }} are friends</p>
		@elseif (Auth::user() != $user) 
			<a href="{{ route('friends.add', ['username' => $user->username]) }}" class="btn btn-primary">Add as friend</a>
		@endif
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