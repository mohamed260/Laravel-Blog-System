@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}"> --}}
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

		<form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
			
		{{ csrf_field() }}

		{{ method_field('PUT') }}

		<div class="col-md-6">
			<label name="title">Title</label>
			<input type="text" name="title" class="form-control input-lg" value="{{ $post->title }}">
			<label name="slug" class="form-spacing-top" style="margin-top: 20px;">Slug</label>
			<input type="text" name="slug" class="form-control input-lg" value="{{ $post->slug }}">
			<label name="category_id" class="form-spacing-top" style="margin-top: 20px;">Category</label>
			 <select name="category_id" class="form-control" required>
			 	@foreach($categories as $cate)
				<option value="{{ $cate->id }}" {{ $cate->id == $post->category_id ? "selected" : "" }}>{{ $cate->name }}</option>
				@endforeach
			</select>

			<label name="tags" class="form-spacing-top" style="margin-top: 20px;">Tags:</label>
			 <select name="tags" class="form-control select2-multi" multiple="multiple">
			 	@foreach($tags as $tag)
				<option value="{{ $cate->id }}" {{ $tag->id == $post->tag ? "selected" : "" }}>{{ $tag->name }}</option>
				@endforeach
			</select>

			<label class="form-spacing-top">Update Featured Image:</label>
			<input type="file" name="featured_image">

			<label name="body" class="form-spacing-top" style="margin-top: 20px;">Body</label>
			<textarea name="body" class="form-control input-lg">{{ $post->body }}</textarea>
		</div>
		<div class="col-md-6">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>

				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
					</div>
					<div class="col-sm-6">
						<input type="submit" value="Save Change" class="btn btn-success btn-block">
					</div>
				</div>

			</div>
		</div>
		</form>
	</div>

@endsection

@section('scripts')

    {{-- <script src="{{ URL::asset('js/parsley.min.js') }}"></script> --}}
    <script src="{{ URL::asset('js/select2.min.js') }}"></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:"textarea",
            plugins: "link code wordcount image",
            menubar: false,

        });
    </script>

   <script type="text/javascript">
      $("#tags").select2();
      $("#tags").select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>

@endsection