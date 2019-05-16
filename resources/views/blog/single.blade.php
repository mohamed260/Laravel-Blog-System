@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<img src="{{ asset('images/' . $post->image) }}" height="400" width="800" />

			<h1>{{ $post->title }}</h1>
			
			<p>{!! $post->body !!}</p>

			<hr>

			<p>Posted In: {{ $post->category->name }}</p>

		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments:</h3>
			@foreach($post->comments as $comment)

			<div class="comment">
				<div class="auther-info">
					<img src="" class="auther-image">
					<div class="auther-name">
					<h4>{{ $comment->name }}</h4>
					<p class="auther-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
					</div>
				</div>
				<div class="comment-content" style="margin-left: 15px;">
					{{ $comment->comment }}
				</div>
			</div>
			<br>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			<form method="POST" action="{{ route('comments.store', $post->id) }}">
				@csrf
				
				<div class="row">
					<div class="col-md-6">
						<label>Name:</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="col-md-6">
					<label>Email:</label>
					<input type="text" name="email" class="form-control">
					</div>
					<div class="col-md-12">
					<label>Comment:</label>
					<textarea name="comment" class="form-control btn-block btn-lg" style="height: 130px;"></textarea>
					<input type="submit" name="submit" value="Add Comment" class="btn btn-success btn-block" style="margin-top: 15px;">
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection