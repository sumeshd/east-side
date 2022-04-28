


<?php $__env->startSection('content'); ?>

<form class="row g-5 " action="" method="POST">
    <?php echo csrf_field(); ?>
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Email Address</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Email Address" id="usr" name="email" value="<?php echo e($user->email); ?>">
                                    <div id="color_red"> <?php $__errorArgs = ['email'];
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
                        <input type="hidden" name="role_id" value=0>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Password</label>
                                <div class="form-group">                          
                                    <input type="password" class="form-control color_black" placeholder="Enter Password" id="usr" name="password" >
                                    <div id="color_red"> <?php $__errorArgs = ['password'];
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
                                <label for="usr">Confirm Password</label>
                                <div class="form-group">                          
                                    <input type="password" class="form-control color_black" placeholder="Confirm Password" id="usr" name="password_confirmation" value="">
                                                                                
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
</form>












<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side 27.04.2022\east-side\resources\views/user_master/edit_password.blade.php ENDPATH**/ ?>