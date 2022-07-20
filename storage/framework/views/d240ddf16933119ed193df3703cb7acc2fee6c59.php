
<?php $__env->startSection('content'); ?>

<div class="main-panel">
    <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
            <h1> Role <span> <i class="fa fa-registered"></i> </span> <small>Role - Create </small> </h1>
            <div class="card">
                <div class="card-body">

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
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Permission</label>
                                <div class="form-group">                          
                                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
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
                        </div> -->
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                            <h2 class="center"><span>Permissions</span></h2>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="usr">Role</label>
                                <ul>
                                <?php $role = 1;  ?>
                                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $role < 5 ): ?>
                                        <li><label><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                        <?php echo e($value->name); ?></label></li>
                                    <?php endif; ?>
                                    <?php $role ++ ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                            <div class="col-md-3">
                                <label for="usr">User</label>
                                <ul>
                                <?php $user = 1;  ?>
                                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $user > 4 &&  $user < 9 ): ?> 
                                        <li> <label><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                        <?php echo e($value->name); ?></label></li>
                                    <?php endif; ?>
                                    <?php $user ++ ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                            <div class="col-md-3">
                                <label for="usr">Project</label>
                                <ul>
                                <?php $project = 1;  ?>
                                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $project > 8 && $project < 13 ): ?>
                                            <li><label><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                    <?php echo e($value->name); ?></label></li> 
                                    <?php endif; ?>
                                    <?php $project ++ ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                            <div class="col-md-3">
                                <label for="usr">Customer</label>
                                <ul>
                                <?php $customer = 1;  ?>
                                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $customer > 12 ): ?>
                                        <li> <label><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                    <?php echo e($value->name); ?></label></li>
                                        
                                    <?php endif; ?>
                                    <?php $customer ++ ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            
                <div id="no-more-tables">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>Role</th>
                            <th>User</th>
                            <th>Project</th>
                            <th>Customer</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                                <td>
                                    <ul>
                                    <?php $role = 1;  ?>
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if( $role < 5 ): ?>
                                            <li><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                            <?php echo e($value->name); ?></li><br>
                                        <?php endif; ?>
                                        <?php $role ++ ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                    <?php $user = 1;  ?>
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if( $user > 4 &&  $user < 9 ): ?> 
                                            <li><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                            <?php echo e($value->name); ?></li><br>
                                        <?php endif; ?>
                                        <?php $user ++ ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                    <?php $project = 1;  ?>
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if( $project > 8 && $project < 13 ): ?>
                                                <li><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                        <?php echo e($value->name); ?></li><br> 
                                        <?php endif; ?>
                                        <?php $project ++ ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                    <?php $customer = 1;  ?>
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if( $customer > 12 ): ?>
                                            <li><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                        <?php echo e($value->name); ?></li><br>
                                            
                                        <?php endif; ?>
                                        <?php $customer ++ ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            <div class="full">                
                <button type="submit" class="savDiv">Save</button>
                <a href="#" class="candiv"> Cancel </a>         
            </div> 

        </div>
        <?php echo Form::close(); ?>



                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/role_master/create_role.blade.php ENDPATH**/ ?>