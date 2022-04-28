

<?php $__env->startSection('content'); ?>


<h2> <span> Add New Project</span> <a href="<?php echo e(route('Project.index')); ?>" class="combtnDiv"> Back Project List </a> </h2>



<div class="row">
    <?php if( $errors -> any() ): ?>
    <div class="alert alert-danger" role="alert">
       There Were Some Problem With Your Input.<br><br>
       <ul> <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <li> <?php echo e($error); ?> </li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </ul>
    </div>
    <?php endif; ?>
</div>


    
    
    




    <div class="col-lg-12 file-field">
        <label for="complecation" class="form-label">Upload Image</label>
            <div class="float-left">
                <input type="file" class="from-control" multiple id="image" name="image">
                <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
    </div>

    



<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form class="row g-5 " action="<?php echo e(url('updete_project/'.$data->id)); ?>" >
    <?php echo method_field('PATCH'); ?> 
    <?php echo csrf_field(); ?>
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Project Name</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="projectname" value="<?php echo e($data->projectname); ?>">
                                    <div id="color_red"> <?php $__errorArgs = ['projectname'];
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
                                <label for="usr">Enter Status</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Status" id="usr" name="status" value="<?php echo e($data->status); ?>">
                                    <div id="color_red"> <?php $__errorArgs = ['status'];
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
                                <label for="usr">Enter Budject</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Budject" id="usr" name="budject" value="<?php echo e($data->budject); ?>">
                                    <div id="color_red"> <?php $__errorArgs = ['budject'];
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
                                <label for="usr">Enter Team Name</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Team Name" id="usr" name="team" value="<?php echo e($data->team); ?>">
                                    <div id="color_red"> <?php $__errorArgs = ['team'];
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

                
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Complecation</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Complecation" id="usr" name="complecation" value="<?php echo e($data->complecation); ?>">
                                    <div id="color_red"> <?php $__errorArgs = ['complecation'];
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
                                <label for="usr">Image</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="image" value="<?php echo e($data->image); ?>">
                                    <div id="color_red"> <?php $__errorArgs = ['image'];
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
                                <label for="usr">Enter Project Name</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="">
                                                                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Project Name</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="">
                                                                                
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

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<script type="text/javascript">
   
</script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('project.index_project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side 27.04.2022\east-side\resources\views/project/edit_project.blade.php ENDPATH**/ ?>