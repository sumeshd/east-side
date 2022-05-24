

<?php $__env->startSection('content'); ?>


<h2> <span>All User  </span>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-create')): ?>
  <a href="<?php echo e(route('User.create')); ?>" class="combtnDiv"> Create User </a>
  <?php endif; ?>
</h2>


          <div class="row" style="margin-top: 20px;">
            <div class="col-lg-12">
              <?php if($message = Session::get('success')): ?>
                  <div class="alert alert-success" role="alert">
                      <p><?php echo e($message); ?></p>
                  </div>
              <?php endif; ?>
            </div>
          </div>


            <div class="table-responsive">
              <div id="no-more-tables">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> User Name </th>
                      <th> Email Address </th>
                      <th> Role </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <?php $__currentLoopData = $userdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                    <tr>
                      <td class="py-1"><img src="assets/images/round-img.jpg" alt="img"> <span><?php echo e($user->name); ?> </span></td>
                      <td> <?php echo e($user->email); ?> </td>
                      <td>
                        <?php if(!empty($user->getRoleNames())): ?>
                          <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="badge badge-success"><?php echo e($v); ?></label>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </td>
                     
                      <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-edit')): ?>
                        <span> <i class="fa fa-edit"></i> <a href=" user/<?php echo e($user->id); ?>/edit"> Edit </a> </span>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-delete')): ?>
                        <span>  <?php echo Form::open(['method' => 'DELETE','route' => ['User.destroy', $user->id]]); ?>

                                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                                <?php echo Form::close(); ?>

                        </span>
                        <?php endif; ?>
                      </td>
                    </tr>        
                  </tbody>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                
              </div>
              <div class="col-lg-12">
                      <?php echo e($userdata->onEachSide(1)->links()); ?>

              </div>
            </div>









<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 13.05.2022\east-side\resources\views/user_master/show_user.blade.php ENDPATH**/ ?>