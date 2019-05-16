@extends('main')

@section('title', '| Edit Comment')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h2>Edit Comment</h2>
			<form method="POST" action="{{ route('comments.update', $comment->id) }}">
				@csrf
				{{ method_field('PUT') }}
				<label name="name">Name:</label>
				<input type="text" name="name" class="form-control" value="{{ $comment->name }}" disabled>
				<label name="email">Email:</label>
				<input type="text" name="email" class="form-control" value="{{ $comment->email }}" disabled>
				<label name="comment">Comment:</label>
				<textarea name="comment" class="form-control">{{ $comment->comment }}</textarea>
				<input type="submit" value="Update Comment" name="submit" class="btn btn-block btn-success" style="margin-top: 15px;">
			</form>
		</div>
	</div>
@endsection