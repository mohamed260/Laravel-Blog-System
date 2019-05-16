@extends('main')

@section('title', '| DLELTE COMMENT?')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>DELETE 	THE COMMENT?</h1>
			<p>
				<strong>Name:</strong>{{ $comment->name }}<br>
				<strong>Email:</strong>{{ $comment->email }}<br>
				<strong>Comment:</strong>{{ $comment->comment }}
			</p>
			<form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
				@csrf
				{{ method_field('DELETE') }}
				<input type="submit" name="submit" value="YES DELETE THIS COMMENT" class="btn btn-lg btn-block btn-danger">
			</form>
		</div>
	</div>

@endsection