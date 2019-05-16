<?php $__env->startSection('title', '| View post'); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
			<div class="col-md-8">
				<img src="<?php echo e(asset('images/'. $post->image)); ?>" alt="This is a Photo" />
		<h1><?php echo e($post->title); ?></h1>

		<p class="lead"><?php echo $post->body; ?></p>
		<hr>
		<div class="tags">
		<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<span class="label label-default"><?php echo e($tag->name); ?></span>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

			<div id="backend-comments" style="margin-top: 50px;"></div>

			<h3>Comments<small><?php echo e($post->comments()->count()); ?> totle</small></h3>

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($comment->name); ?></td>
						<td><?php echo e($comment->email); ?></td>
						<td><?php echo e($comment->comment); ?></td>
						<td>
							<a href="<?php echo e(route('comments.edit', $comment->id)); ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="<?php echo e(route('comments.delete', $comment->id)); ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>

			</div>
			<div class="col-md-4">
				<div class="well">

					<dl class="dl-horizontal">
						<label>Url:</label>
						<p><a href="<?php echo e(route('blog.single', $post->slug)); ?>"><?php echo e(route('blog.single', $post->slug)); ?></a></p>
					</dl>

					<dl class="dl-horizontal">
						<label>Category:</label>
						<p><?php echo e($post->category->name); ?></p>
					</dl>

					<dl class="dl-horizontal">
						<label>Created At:</label>
						<p><?php echo e(date('M j, Y h:ia',strtotime($post->created_at))); ?></p>
					</dl>

					<dl class="dl-horizontal">
						<label>Last Updated:</label>
						<p><?php echo e(date('M j, Y h:ia',strtotime($post->updated_at))); ?></p>
					</dl>
					<hr>

					<div class="row">
						<div class="col-sm-6">
							<a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-primary btn-block">Edit</a>
						</div>
						<div class="col-sm-6">
							<form method="POST" action="<?php echo e(route('posts.destroy', $post->id)); ?>">

								<?php echo e(csrf_field()); ?>


								<?php echo e(method_field('DELETE')); ?>


							<input type="submit" value="Delete" class="btn btn-danger btn-block">

							</form>
						</div>
					</div>
					<a href="<?php echo e(route('posts.index')); ?>" class="btn btn-default btn-block btn-h1-spacing" style="margin-top: 20px;">See All Posts</a>
				</div>
			</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/posts/show.blade.php ENDPATH**/ ?>