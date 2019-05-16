<?php $titleTag = htmlspecialchars($post->title); ?>

<?php $__env->startSection('title', "| $titleTag"); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<img src="<?php echo e(asset('images/' . $post->image)); ?>" height="400" width="800" />

			<h1><?php echo e($post->title); ?></h1>
			
			<p><?php echo $post->body; ?></p>

			<hr>

			<p>Posted In: <?php echo e($post->category->name); ?></p>

		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span><?php echo e($post->comments()->count()); ?> Comments:</h3>
			<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<div class="comment">
				<div class="auther-info">
					<img src="" class="auther-image">
					<div class="auther-name">
					<h4><?php echo e($comment->name); ?></h4>
					<p class="auther-time"><?php echo e(date('F nS, Y - g:iA' ,strtotime($comment->created_at))); ?></p>
					</div>
				</div>
				<div class="comment-content" style="margin-left: 15px;">
					<?php echo e($comment->comment); ?>

				</div>
			</div>
			<br>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			<form method="POST" action="<?php echo e(route('comments.store', $post->id)); ?>">
				<?php echo csrf_field(); ?>
				
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/blog/single.blade.php ENDPATH**/ ?>