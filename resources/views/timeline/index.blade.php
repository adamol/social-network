@extends('templates.default')

@section('content')
	<div class="row">
		<div class="col-sm-6">
			<form role="form" action="{{ route('status.post') }}" method="post">

				<div class="form-group{{ $errors->has('status') ? ' has-error' : ''}}">

					<textarea placeholder="What is up {{ Auth::user()->getFirstNameOrUsername() }}?" name="status" class="form-control" rows="2"></textarea><br>
					@if ($errors->has('status'))
						<span class="help-block">{{ $errors->first('status') }}</span>
					@endif

					<button type="submit" class="btn btn-default">Update status</button>

					<input type="hidden" name="_token" value="{{ Session::token() }}">

				</div>

			</form>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			@if (!$statuses->count())
				<p>There is not yet anything in your timeline.</p>
			@else
				@foreach ($statuses as $status)
					<div class="media">
						<a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
							<img src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->getNameOrUsername() }}" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading"><a href="">Dayle</a></h4>
							<p>{{ $status->body }}</p>
							<ul class="list-inline">
								<li>{{ $status->created_at->diffForHumans() }}</li>
								<li><a href="#">Like</a></li>
								<li>10 likes</li>
							</ul>

							<!-- <div class="media">
								<a href="#" class="pull-left">
									<img src="" alt="" class="media-object">
								</a>
								<div class="media-body">
									<h5 class="media-heading"><a href="#">Billy</a></h5>
									<p>Indubidably</p>
									<ul class="list-inline">
										<li>8 minutes ago</li>
										<li><a href="#">Like</a></li>
										<li>10 likes</li>
									</ul>
								</div>
							</div> -->

							<form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
								<div class="form-group{{ $errors->has("reply-{$status->id}") ? ' has-error' : ''}}">
									<textarea name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="Reply to status"></textarea>
									@if ($errors->has("reply-{$status->id}"))
										<span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
									@endif
								</div>
								<input type="submit" value="Reply" class="btn btn-default">
								<input type="hidden" name="_token" value="{{ Session::token() }}">
							</form>

						</div>
					</div>
				@endforeach
				{!! $statuses->render() !!}
			@endif
		</div>
	</div>
@stop