

<?php $__env->startSection('content'); ?>


<h2> <span> Add New Project</span> <a href="<?php echo e(route('Project.index')); ?>" class="combtnDiv"> Back Project List </a> </h2>



<div class="row">
    <div class="col-lg-12">
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
</div>


    
    
    




    <div class="col-lg-12 file-field">
        <label for="complecation" class="form-label">Upload Image</label>
            <div class="float-left">
                <input type="file" class="from-control" multiple id="image" name="image">
                <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
    </div>

    




<form class="row g-5 " action="<?php echo e(route('Project.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Project Name</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="projectname">
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
                                    <input type="text" class="form-control color_black" placeholder="Enter Status" id="usr" name="status">
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
                                    <input type="text" class="form-control color_black" placeholder="Enter Budject" id="usr" name="budject">
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
                                    <input type="text" class="form-control color_black" placeholder="Team Name" id="usr" name="team">
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
                                    <input type="text" class="form-control color_black" placeholder="Complecation" id="usr" name="complecation">
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
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="image">
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
<!--------------------------------------------------------------------->

<div class="main_project">          
    <div class="row">
        <div class="col-md-4"> 
            <div class="projectDiv_lft">
                <h3> Project </h3>
                <ul>
                    <li> Post Sales E </li>
                    <li> Post Sales D </li>
                    <li> Post Sales F </li>
                    <li> Post Sales G </li>
                    <li> Post Sales H </li>
                    <li> Post Sales J </li>
              </ul>
            </div>
        </div>
        <div class="col-md-8"> 
            <div class="projectDiv_lft">
                <h3> Add Project </h3> 
                <div class="new-form-check">
                    <label> Type of Project</label>
                    <div class="form-group2">
                        <input type="checkbox" id="html">
                        <label for="html">Residential</label>
                    </div>
    
                    <div class="form-group2">
                        <input type="checkbox" id="css">
                        <label for="css">Commercial</label>
                    </div>
    
                    <div class="form-group2">
                        <input type="checkbox" id="javascript">
                        <label for="javascript">Furniture</label>
                    </div>
                </div>





<div class="form-group">
  <input type="text" class="form-control userDiv1" placeholder="Name" id="usr">
</div>

<div class="form-group">
  <input type="text" class="form-control userDiv1" placeholder="Project Name" id="usr">
</div>

<div class="form-group">
  <input type="text" class="form-control userDiv2" placeholder="Project Number" id="usr">
</div>

<div class="form-group">
  <input type="text" class="form-control userDiv3" placeholder="Address 01" id="usr">
</div>

<div class="form-group">
  <input type="text" class="form-control userDiv3" placeholder="Address 02" id="usr">
</div>

<div class="form-group">
  <input type="text" class="form-control userDiv3" placeholder="Address 03" id="usr">
</div>

<div class="form-group">
  <input type="text" class="form-control userDiv4" placeholder="Pin" id="usr">
</div>


<a href="#" class="submitbtn"> Submit </a>



</div>
              
              </div>
              </div>
              </div>





</form>








<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<script type="text/javascript">
   
</script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('project.index_project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side Project\LaravelStater\resources\views/project/create_project.blade.php ENDPATH**/ ?>