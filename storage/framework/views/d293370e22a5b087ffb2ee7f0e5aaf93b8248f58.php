

<?php $__env->startSection('content'); ?>


<h2> <span>All User  </span>
 <a href="<?php echo e(route('User.create')); ?>" class="combtnDiv"> Create User </a>
</h2>


            <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> User Name </th>
                      <th> Email Address </th>
                      <th> Role </th>
                      <th> Permission </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <?php $__currentLoopData = $userdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                    <tr>
                      <td class="py-1"><img src="assets/images/round-img.jpg" alt="img"> <span><?php echo e($user->name); ?> </span></td>
                      <td> <?php echo e($user->email); ?> </td>
                      <td> <?php echo e($user->role->name); ?> </td>
                      <td> <?php $__currentLoopData = $user->role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><?php echo e($permission -> name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td>
                        <span> <i class="fa fa-gear"></i> <a href="#"> Settings </a> </span> 
                        <span> <i class="fa fa-eye"></i> <a href=" user/<?php echo e($user->id); ?>/edit"> Edit </a> </span>
                        <span> <i class="fa fa-edit"></i> <a href="<?php echo e(url('changepass/'.$user->id)); ?>"> Change Password </a> </span>
                      </td>
                    </tr>
                              
                  </tbody>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>









<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side\east-side\resources\views/user_master/show_user.blade.php ENDPATH**/ ?>