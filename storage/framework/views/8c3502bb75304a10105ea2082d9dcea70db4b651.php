

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">~Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
                </li>

                
          </ul>
      </div>
    <?php if(auth()->guard()->guest()): ?>
    <div class=" my-2 my-lg-0">
        <ul class="navbar-nav mr-auto" >
            <li class="nav-item dropdown" style="padding-right: 39px;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    REG OR LOG
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/register">Register</a>
                <a class="dropdown-item" href="/login">Login</a>
            </div>

        </ul>
    </div>
    <?php else: ?>
        <div class=" my-2 my-lg-0">
            <ul class="navbar-nav mr-auto" >
                <li class="nav-item dropdown" style="padding-right: 39px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hello <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/posts">Posts</a>
                    <a class="dropdown-item" href="<?php echo e(route('posts.create')); ?>">New Post</a>
                    <a class="dropdown-item" href="<?php echo e(route('categories.index')); ?>">Categories</a>
                    <a class="dropdown-item" href="<?php echo e(route('tags.index')); ?>">Tags</a>
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                </div>

            </ul>
        </div>
    <?php endif; ?>
</nav>
<?php /**PATH C:\xampp\htdocs\fox\resources\views/partials/_nav.blade.php ENDPATH**/ ?>