

<?php $__env->startSection('content'); ?>

<h2> <span>Edit Role  </span>
 <a href="<?php echo e(route('roles.index')); ?>" class="combtnDiv"> Back Role List </a>
</h2>




<div class="table-responsive">
            <div id="no-more-tables">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Permission</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                    <td><?php echo e($role->name); ?></td>
                    <td><?php if(!empty($rolePermissions)): ?>
                            <?php $__currentLoopData = $rolePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($v->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </td>
                    </tr>
                              
                  </tbody>
                  
                </table>
            </div>
          </div>
         



<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side 27.04.2022\east-side\resources\views/role_master/details_role.blade.php ENDPATH**/ ?>