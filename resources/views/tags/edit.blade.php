@extends('main')

@section('title', '| Edit Tag')

@section('content')

	<form method="POST" action="{{ route('tags.update', $tag->id) }}">
		
		{{ csrf_field() }}

		{{ method_field('PUT') }}

		<label name="name">Title:</label>
		<input type="text" name="name" class="form-control">

		<input type="submit" name="submit" value="Save Change" class="btn btn-success" style="margin-top: 20px;">
	</form>

@endsection