
<?php $__env->startSection('content'); ?>

<div class="main-panel">
    <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
            <h1> Team <span> <i class="fa fa-users"></i> </span> <small> Team - Edit </small> </h1>
            <div class="card">
                <div class="card-body">

                    <h2> <span>Edit Team  </span><span class="italic"><?php echo e($team->name); ?></span>
                     <a href="<?php echo e(route('teams.index')); ?>" class="combtnDiv"> Back Team List </a>
                    </h2>


                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <form class="form-horizontal" method="post" action="<?php echo e(route('teams.update', $team)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="table-responsive">
                                <div class="customDiv">
                                    <div class="row">

                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="usr">Team Name</label>
                                                    <div class="form-group">                          
                                                        <input type="text" class="form-control color_black" placeholder="Team Name" id="usr" name="name" value="<?php echo e(old('name', $team->name)); ?>" required>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="full">                
                                    <button class="savDiv">Save</button>
                                    <a href="#" class="candiv"> Cancel </a>
                                            
                                </div> 
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>





<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/teamwork_master/edit_teamwork.blade.php ENDPATH**/ ?>