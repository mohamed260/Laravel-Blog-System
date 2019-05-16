<?php if(Session::has('success')): ?>

	<div class="alert alert-success" role="alert">
		<strong>Success:</strong><?php echo e(Session::get('success')); ?>

	</div>

<?php endif; ?>

<?php if(count($errors) > 0): ?>

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<li><?php echo e($error); ?></li>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>

<?php endif; ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/partials/_messeges.blade.php ENDPATH**/ ?>