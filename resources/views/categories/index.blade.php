@extends('main')

@section('title', '| All Categories')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>

			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>

		<div class="col-md-3">
			<div class="well">
				<form method="POST" action="{{ route('categories.store') }}">
					{{ csrf_field() }}
					<h2>New Category</h2>
					<label name="name">Name:</label>
					<input type="text" name="name" class="form-control">
					<input type="submit" value="New Category" class="btn btn-primary btn-block btn-h1-spacing" style="margin-top: 20px;">
				</form>
			</div>
		</div>

	</div>

@endsection