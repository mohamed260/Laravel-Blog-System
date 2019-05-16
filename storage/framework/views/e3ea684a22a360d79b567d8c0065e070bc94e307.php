<?php $__env->startSection('titl', "| $tag->name Tag"); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-6">
			<h1><?php echo e($tag->name); ?> Tag<small><?php echo e($tag->posts()->count()); ?> Posts</small></h1>
		</div>
		<div class="col-md-4 col-offset-2">
			<a href="<?php echo e(route('tags.edit', $tag->id)); ?>" class="btn btn-primary pull-right btn-block" style="margin-top: 20px;">Edit</a>
		</div>

		<div class="col-md-2">
			<form method="POST" action="<?php echo e(route('tags.destroy', $tag->id)); ?>">
				<?php echo csrf_field(); ?>

				<?php echo e(method_field('DELETE')); ?>


				<input type="submit" class="btn btn-danger btn-block" name="submit" style="margin-top: 20px;" value="Delete">

			</form>
		</div>

	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $tag->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<th><?php echo e($post->id); ?></th>
							<td><?php echo e($post->title); ?></td>
							<td><?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<span class="label label-default"><?php echo e($tag->name); ?></span>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</td>
							<td><a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-default btn-xs">View</a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/tags/show.blade.php ENDPATH**/ ?>