
<?php $__env->startSection('content'); ?>

<div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Project <span> <i class="fa fa-file"></i> </span> <small>Project - Add Documents </small> </h1>
        <div class="card">
          <div class="card-body">





            <div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>


            div class="uplode-imgSec">
              <form method="POST" action="/document/upload" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <h3> Add New Image </h3>
                <div class="row">
                  <div class="col-md-5">
                      <div class="uplode-imgSec-in">
                        <!--<div class="upDiv">  <input type="file" class="fa fa-upload" name="image[]" multiple > --> <!-- <button type="file"><i class="fa fa-upload"></i> Uplode image</button>  accept="image/*"  </div>-->
                        <div class="upDiv"> <input type="file" class="fa fa-upload" name="document" > </div>                     
                      </div>
                      <div id="color_red"> <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                  </div>
                  <div class="col-md-7">
                      <div class="uplode-imgSec-in">
                        <div class="form-group">
                          <input type="text" class="form-control" name="document_name" placeholder="Add image Name" id="usr">
                          <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($setting['type'] == 'presales'): ?>
                            <input type="hidden" name="project_id" value="<?php echo e($setting['project_id']); ?>">
                            <input type="hidden" name="type" value="<?php echo e($setting['type']); ?>">
                            <input type="hidden" name="project_settings_id" value="<?php echo e($setting['id']); ?>">
                            
                            <?php elseif($setting['type'] == 'postsales'): ?>
                            <input type="hidden" name="project_id" value="<?php echo e($setting['project_id']); ?>">
                            <input type="hidden" name="type" value="<?php echo e($setting['type']); ?>">
                            <input type="hidden" name="project_settings_id" value="<?php echo e($setting['id']); ?>">

                            <?php elseif($setting['type'] == 'execution'): ?>
                            <input type="hidden" name="project_id" value="<?php echo e($setting['project_id']); ?>">
                            <input type="hidden" name="type" value="<?php echo e($setting['type']); ?>">
                            <input type="hidden" name="project_settings_id" value="<?php echo e($setting['id']); ?>">
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- <a href="#" class="savbtn"> Save </a> -->
                        <button type="submit" class="savbtn"> Save </button> 
                      </div> 
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
<?php echo $__env->make('project.index_projectsettings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/project/adddocument.blade.php ENDPATH**/ ?>