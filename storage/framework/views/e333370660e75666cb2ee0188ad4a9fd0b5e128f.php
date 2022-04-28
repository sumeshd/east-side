

<?php $__env->startSection('content'); ?>

<h2> <span>Add Role  </span>
 <a href="<?php echo e(route('roles.index')); ?>" class="combtnDiv"> Back Role List </a>
</h2>




<?php echo Form::open(array('route' => 'roles.store','method'=>'POST')); ?>

        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Role Name</label>
                                <div class="form-group">                          
                                <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                                    <div id="color_red"> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Permission</label>
                                <div class="form-group">                          
                                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                    <?php echo e($value->name); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div id="color_red"> <?php $__errorArgs = ['permission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>                                            
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="full">                
                <button type="submit" class="savDiv">Save</button>
                <a href="#" class="candiv"> Cancel </a>
                        
            </div> 

        </div>
        <?php echo Form::close(); ?>







<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side 27.04.2022\east-side\resources\views/role_master/create_role.blade.php ENDPATH**/ ?>