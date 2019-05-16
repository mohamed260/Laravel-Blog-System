<?php $__env->startSection('title', '| Edit Blog Post'); ?>

<?php $__env->startSection('stylesheets'); ?>
    
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

		<form method="POST" action="<?php echo e(route('posts.update', $post->id)); ?>" enctype="multipart/form-data">
			
		<?php echo e(csrf_field()); ?>


		<?php echo e(method_field('PUT')); ?>


		<div class="col-md-6">
			<label name="title">Title</label>
			<input type="text" name="title" class="form-control input-lg" value="<?php echo e($post->title); ?>">
			<label name="slug" class="form-spacing-top" style="margin-top: 20px;">Slug</label>
			<input type="text" name="slug" class="form-control input-lg" value="<?php echo e($post->slug); ?>">
			<label name="category_id" class="form-spacing-top" style="margin-top: 20px;">Category</label>
			 <select name="category_id" class="form-control" required>
			 	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($cate->id); ?>" <?php echo e($cate->id == $post->category_id ? "selected" : ""); ?>><?php echo e($cate->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>

			<label name="tags" class="form-spacing-top" style="margin-top: 20px;">Tags:</label>
			 <select name="tags" class="form-control select2-multi" multiple="multiple">
			 	<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($cate->id); ?>" <?php echo e($tag->id == $post->tag ? "selected" : ""); ?>><?php echo e($tag->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>

			<label class="form-spacing-top">Update Featured Image:</label>
			<input type="file" name="featured_image">

			<label name="body" class="form-spacing-top" style="margin-top: 20px;">Body</label>
			<textarea name="body" class="form-control input-lg"><?php echo e($post->body); ?></textarea>
		</div>
		<div class="col-md-6">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd><?php echo e(date('M j, Y h:ia',strtotime($post->created_at))); ?></dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd><?php echo e(date('M j, Y h:ia',strtotime($post->updated_at))); ?></dd>
				</dl>
				<hr>

				<div class="row">
					<div class="col-sm-6">
						<a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-danger btn-block">Cancel</a>
					</div>
					<div class="col-sm-6">
						<input type="submit" value="Save Change" class="btn btn-success btn-block">
					</div>
				</div>

			</div>
		</div>
		</form>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    
    <script src="<?php echo e(URL::asset('js/select2.min.js')); ?>"></script>

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
      $("#tags").select2().val(<?php echo json_encode($post->tags()->allRelatedIds()); ?>).trigger('change');
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/posts/edit.blade.php ENDPATH**/ ?>