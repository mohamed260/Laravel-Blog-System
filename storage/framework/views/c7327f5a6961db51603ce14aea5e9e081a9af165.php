<?php $__env->startSection('title', '| Contact'); ?>

<?php $__env->startSection('content'); ?>

       <div class="row">
           <div class="col-md-12">
               <h1>Contact Me</h1>
                
               <hr>

               <form method="POST" action="<?php echo e(url('contact')); ?>">
                <?php echo csrf_field(); ?>
                   <div class="form-group">
                       <label name="email">Email:</label>
                       <input type="" id="email" name="email" class="form-control">
                   </div>

                   <div class="form-group">
                       <label name="subject">Subject:</label>
                       <input type="" id="subject" name="subject" class="form-control">
                   </div>

                    <div class="form-group">
                       <label name="message">Message:</label>
                       <textarea type="" id="message" name="message" class="form-control"></textarea>
                   </div>

                   <input type="submit" value="Send Message" class="btn btn-success">
               </form>

           </div>
       </div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fox\resources\views/pages/contact.blade.php ENDPATH**/ ?>