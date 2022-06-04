

<?php $__env->startSection('content'); ?>


<h2> <span>All Roles </span>
 <a href="<?php echo e(route('roles.create')); ?>" class="combtnDiv"> Create Role </a>
</h2>


<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
<?php endif; ?>



        <div class="table-responsive">
            <div id="no-more-tables">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                    <tr>
                    <td><?php echo e(++$i); ?></td>
                    <td><?php echo e($role->name); ?></td>
                    <td>
                        <a class="btn btn-info" href="<?php echo e(route('roles.show',$role->id)); ?>">Show</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                            <a class="btn btn-primary" href="<?php echo e(route('roles.edit',$role->id)); ?>">Edit</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>
                            <?php echo Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']); ?>

                                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                            <?php echo Form::close(); ?>

                        <?php endif; ?>
                    </td>
                    </tr>
                              
                  </tbody>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
          </div>
          <?php echo $roles->render(); ?>

















<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 29.05.2022\east-side\resources\views/role_master/show_role.blade.php ENDPATH**/ ?>