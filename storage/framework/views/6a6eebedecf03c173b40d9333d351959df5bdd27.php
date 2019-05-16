<?php $__env->startSection('title', '| create new post'); ?>

<?php $__env->startSection('stylesheets'); ?>

    <link rel="stylesheet" href="<?php echo e(URL::asset('css/parsley.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/select2.min.css')); ?>">
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
    	tinymce.init({
    		selector: 'textarea',
    		plugins: 'link code',
    		menubar: false
    		
    	})
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			<form method="POST" action="<?php echo e(route('posts.store')); ?>" enctype="multipart/form-data">

					<?php echo csrf_field(); ?>

				<label>Title:</label>
				<input type="text" name="title" class="form-control">
				<label name="slug">Slug:</label>
				<input type="text" name="slug" class="form-control">
				<label>Category_id:</label>
				<select class="form-control" name="category_id">
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<label>Tags:</label>
				<select class="form-control select2-multi" name="tags" multiple="multiple">
					<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value='<?php echo e($tag->id); ?>''><?php echo e($tag->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<label>Upload Featured Image:</label>
				<input type="file" name="featured_image">

				<label>Post Body:</label>
				<textarea name="body" class="form-control" style="height: 150px;"></textarea>
				<input type="submit" value="Create Post" class="btn btn-success btn-biock" style="margin-top: 20px; width: 750px;">
			</form>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


    <script src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/select2.min.js')); ?>"></script>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/posts/create.blade.php ENDPATH**/ ?>