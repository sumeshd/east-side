

<?php $__env->startSection('content'); ?>

				<div class="row" style="margin-top: 20px;">
                  <div class="col-lg-12">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <p><?php echo e($message); ?></p>

                        </div>
                        <?php endif; ?>
                  </div>
                </div>


			<div class="mt-4">
                <div class="card card-body">
                  <h6>Leav A Comment</h6>

                  <form action="<?php echo e(url('comment')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="settings_name" value="<?php echo e($presales->settings_name); ?>">
                    <input type="hidden" name="settings_id" value="<?php echo e($presales->id); ?>">
                    <div class="form-group">
                      <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                    </div>
                      <button type="submit" class="btn btn-primary"> Submit</button>
                  </form>

                </div>
            </div>

         



<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('settings_master.index_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 29.05.2022\east-side\resources\views/comment_master/comment.blade.php ENDPATH**/ ?>