<?php $__env->startSection('title', '| All Tags'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>

			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<th><?php echo e($tag->id); ?></th>
						<td><a href=" <?php echo e(route('tags.show', $tag->id )); ?> "><?php echo e($tag->name); ?></a></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>

		</div>

		<div class="col-md-3">
			<div class="well">
				<form method="POST" action="<?php echo e(route('tags.store')); ?>">
					<?php echo e(csrf_field()); ?>

					<h2>New Tag</h2>
					<label name="name">Name:</label>
					<input type="text" name="name" class="form-control">
					<input type="submit" value="New Tag" class="btn btn-primary btn-block btn-h1-spacing" style="margin-top: 20px;">
				</form>
			</div>
		</div>

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/tags/index.blade.php ENDPATH**/ ?>