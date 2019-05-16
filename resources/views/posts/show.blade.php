@extends('main')

@section('title', '| View post')

@section('content')
	<div class="row">
			<div class="col-md-8">
				<img src="{{ asset('images/'. $post->image) }}" alt="This is a Photo" />
		<h1>{{ $post->title }}</h1>

		<p class="lead">{!! $post->body !!}</p>
		<hr>
		<div class="tags">
		@foreach($post->tags as $tag)

		<span class="label label-default">{{ $tag->name }}</span>

		@endforeach
		</div>

			<div id="backend-comments" style="margin-top: 50px;"></div>

			<h3>Comments<small>{{ $post->comments()->count() }} totle</small></h3>

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($post->comments as $comment)
					<tr>
						<td>{{ $comment->name }}</td>
						<td>{{ $comment->email }}</td>
						<td>{{ $comment->comment }}</td>
						<td>
							<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			</div>
			<div class="col-md-4">
				<div class="well">

					<dl class="dl-horizontal">
						<label>Url:</label>
						<p><a href="{{ route('blog.single', $post->slug) }}">{{route('blog.single', $post->slug)}}</a></p>
					</dl>

					<dl class="dl-horizontal">
						<label>Category:</label>
						<p>{{ $post->category->name }}</p>
					</dl>

					<dl class="dl-horizontal">
						<label>Created At:</label>
						<p>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</p>
					</dl>

					<dl class="dl-horizontal">
						<label>Last Updated:</label>
						<p>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</p>
					</dl>
					<hr>

					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
						</div>
						<div class="col-sm-6">
							<form method="POST" action="{{ route('posts.destroy', $post->id) }}">

								{{ csrf_field() }}

								{{ method_field('DELETE') }}

							<input type="submit" value="Delete" class="btn btn-danger btn-block">

							</form>
						</div>
					</div>
					<a href="{{ route('posts.index') }}" class="btn btn-default btn-block btn-h1-spacing" style="margin-top: 20px;">See All Posts</a>
				</div>
			</div>
	</div>
@endsection