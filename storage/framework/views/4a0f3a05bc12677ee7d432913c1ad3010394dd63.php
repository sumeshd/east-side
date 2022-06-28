

<?php $__env->startSection('content'); ?>


<h2> <span> Edit Project</span> <a href="<?php echo e(route('Project.index')); ?>" class="combtnDiv"> Back Project List </a> </h2>



<!-- <div class="row">
    <?php if( $errors -> any() ): ?>
    <div class="alert alert-danger" role="alert">
       There Were Some Problem With Your Input.<br><br>
       <ul> <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <li> <?php echo e($error); ?> </li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </ul>
    </div>
    <?php endif; ?>
</div> -->


    
    
    

<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $type = explode(",", $data['project_type'] ); ?>
<?php $settings_name = explode(",", $data['settings_name'] ); ?>
<form class="row g-5 " action="<?php echo e(url('updete_project/'.$data['id'])); ?>" >
    <?php echo method_field('PATCH'); ?> 
    <?php echo csrf_field(); ?>
        
        <div class="main_project">          
            <div class="row">
                <!-- <div class="col-md-4"> 
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
                </div> -->
                <div class="col-md-12"> 
                    <div class="projectDiv_lft">
                        <!-- <h3> Add Project </h3>  -->
                        <div class="new-form-check">
                            <label> Type of Project </label>
                            <div class="form-group2">
                                <input type="checkbox" id="html" name="project_type[]" value="Residential" <?php echo e(in_array('Residential',$type )? 'checked' : ''); ?>>
                                <label for="html">Residential</label>
                            </div>
            
                            <div class="form-group2">
                                <input type="checkbox" id="css" name="project_type[]" value="Commercial" <?php echo e(in_array('Commercial',$type )? 'checked' : ''); ?>>
                                <label for="css">Commercial</label>
                            </div>
            
                            <div class="form-group2">
                                <input type="checkbox" id="javascript" name="project_type[]" value="Furniture" <?php echo e(in_array('Furniture',$type )? 'checked' : ''); ?>>
                                <label for="javascript">Furniture</label>
                            </div>
                        </div>


                        <div class="new-form-check">
                            <label> Project Settings Name</label>
                            <div class="">
                                <input type="checkbox" id="html" name="settings_name[]" value="Presales" <?php echo e(in_array('Presales',$settings_name )? 'checked' : ''); ?>>
                                <label for="html">Presales</label>
                            </div>
            
                            <div class="">
                                <input type="checkbox" id="css" name="settings_name[]" value="Postsales" <?php echo e(in_array('Postsales',$settings_name )? 'checked' : ''); ?>>
                                <label for="css">Postsales</label>
                            </div>
            
                            <div class="">
                                <input type="checkbox" id="javascript" name="settings_name[]" value="Execution" <?php echo e(in_array('Execution',$settings_name )? 'checked' : ''); ?>>
                                <label for="javascript">Execution</label>
                            </div>
                        </div>



                        <div class="form-group">
                            <input type="text" class="form-control userDiv1" placeholder="Name" id="usr" name="name" value="<?php echo e(old('name',$data['name'] )); ?>">
                            <div id="color_red"> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv1" placeholder="Project Name" id="usr" name="projectname" value="<?php echo e($data['projectname']); ?>">
                            <div id="color_red"> <?php $__errorArgs = ['projectname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control userDiv2" placeholder="Project Number" id="usr" name="projectnumber" value="<?php echo e($data['projectnumber']); ?>">
                            <div id="color_red"> <?php $__errorArgs = ['projectnumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 01" id="usr" name="address_1" value="<?php echo e($data['address_1']); ?>">
                            <div id="color_red"> <?php $__errorArgs = ['address_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 02" id="usr" name="address_2" value="<?php echo e($data['address_2']); ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 03" id="usr" name="address_3" value="<?php echo e($data['address_3']); ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv4" placeholder="Pin" id="usr" name="pin" value="<?php echo e($data['pin']); ?>">
                            <div id="color_red"> <?php $__errorArgs = ['pin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="form-group">
                            <input list="magicHouses" multiple="multiple" class="form-control" id="myHouse" name="customer" placeholder="-- Choose Customer --" />
                            <datalist id="magicHouses">
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->customer_first_name); ?> <?php echo e($customer->customer_last_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                            <div id="color_red"> <?php $__errorArgs = ['customer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>


                        <!-- <a href="#" class="submitbtn"> Submit </a> -->
                        <div class="full">                
                            <button type="submit" class="savDiv">Save</button>
                            <!-- <a href="#" class="candiv"> Cancel </a> -->
                                    
                        </div>
                    </div> 
                </div>
            </div>
        </div>
</form>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<script type="text/javascript">
   
</script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('project.index_project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/project/edit_project.blade.php ENDPATH**/ ?>