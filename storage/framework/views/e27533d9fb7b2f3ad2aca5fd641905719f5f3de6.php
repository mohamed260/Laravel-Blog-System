<?php $__env->startSection('title', '| All Categories'); ?>

<?php $__env->startSection('content'); ?>

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
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<th><?php echo e($category->id); ?></th>
						<td><?php echo e($category->name); ?></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>

		</div>

		<div class="col-md-3">
			<div class="well">
				<form method="POST" action="<?php echo e(route('categories.store')); ?>">
					<?php echo e(csrf_field()); ?>

					<h2>New Category</h2>
					<label name="name">Name:</label>
					<input type="text" name="name" class="form-control">
					<input type="submit" value="New Category" class="btn btn-primary btn-block btn-h1-spacing" style="margin-top: 20px;">
				</form>
			</div>
		</div>

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/categories/index.blade.php ENDPATH**/ ?>