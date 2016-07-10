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
			<!-- Timeline statuses and replies -->
		</div>
	</div>
@stop