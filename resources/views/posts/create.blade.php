@extends('main')

@section('title', '| create new post')

@section('stylesheets')

    <link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
    	tinymce.init({
    		selector: 'textarea',
    		plugins: 'link code',
    		menubar: false
    		
    	})
    </script>

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

					@csrf

				<label>Title:</label>
				<input type="text" name="title" class="form-control">
				<label name="slug">Slug:</label>
				<input type="text" name="slug" class="form-control">
				<label>Category_id:</label>
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				<label>Tags:</label>
				<select class="form-control select2-multi" name="tags" multiple="multiple">
					@foreach($tags as $tag)
					<option value='{{ $tag->id }}''>{{ $tag->name }}</option>
					@endforeach
				</select>

				<label>Upload Featured Image:</label>
				<input type="file" name="featured_image">

				<label>Post Body:</label>
				<textarea name="body" class="form-control" style="height: 150px;"></textarea>
				<input type="submit" value="Create Post" class="btn btn-success btn-biock" style="margin-top: 20px; width: 750px;">
			</form>
		</div>
	</div>

@endsection

@section('scripts')


    <script src="{{ URL::asset('js/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('js/select2.min.js') }}"></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: "link code wordcount image",
            menubar: false,
        });
    </script>

   <script type="text/javascript">
      $("#tags").select2({
    placeholder: "Select Tags"
            });
    </script>

@endsection