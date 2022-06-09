

<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if( $setting['settings_name'] == 'presales'): ?>
  <h2><span> Gallery </span>
  <a href="<?php echo e(url('/addimage/'.$setting['presales_name'].'/'.$setting['settings_name'])); ?>" class="combtnDiv"> Create New Image </a>
  </h2>
  <div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>
  <?php endif; ?>
  <?php if( $setting['settings_name'] == 'postsales'): ?>
  <!-- <form action="" >
    <?php echo csrf_field(); ?>
    <input type="hidden" name="postsales_name" value="<?php echo e($setting['postsales_name']); ?>">
    <input type="hidden" name="settings_name" value="<?php echo e($setting['settings_name']); ?>">
    <button type="submit" class="combtnDiv">Create New Image </button> 
  </form> -->
  <h2><span> Gallery </span>
  <a href="<?php echo e(url('/addimage/'.$setting['postsales_name'].'/'.$setting['settings_name'])); ?>" class="combtnDiv"> Create New Image </a>
  </h2>
      <div class="boxthree">
        <ul>
          <li> <a href="#"> Presales </a> </li>
          <li  class="active"> <a href="#"> Postsales </a> </li>
          <li> <a href="#"> Execution </a> </li>
        </ul>
      </div>
  <?php endif; ?>
  <?php if( $setting['settings_name'] == 'execution'): ?>
  <h2><span> Gallery </span>
  <a href="<?php echo e(url('/addimage/'.$setting['execution_name'].'/'.$setting['settings_name'])); ?>" class="combtnDiv"> Create New Image </a>
  </h2>
    <div class="boxthree">
      <ul>
        <li> <a href="#"> Presales </a> </li>
        <li> <a href="#"> Postsales </a> </li>
        <li class="active"> <a href="#"> Execution </a> </li>
      </ul>
    </div>
  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  


						
                <div class="row" style="margin-top: 20px;">
                  <div class="col-lg-12">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <p><?php echo e($message); ?></p>

                        </div>
                        <?php endif; ?>
                  </div>
                </div>

            <div class="uplode-imgSec mt-2">

                <div class="row" style="margin-top: 20px;">
                  <div class="col-lg-12">
                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <p><?php echo e(Session::get('success')); ?></p>

                        </div>
                    <?php endif; ?>
                  </div>
                </div>


                <div class="row">
                	<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<div class="col-xl-2 col-lg-3 col-md-6 col-md-6 col-xs-12">
                		<div class="card mb-3">
                			<img src="<?php echo e(asset('images/'.$image->image)); ?>" class="card-img-top" alt="Broken" height="280" >
                			<div class="card-body">
                				<p class="card-text" style="color:black;"><?php echo e($image->created_at->diffForHumans()); ?> </p>
                				
                					
                					<a href="<?php echo e(url('image/download/'.$image->id.'/'.$image->task_name.'/'.$image->settings_name)); ?>" class="btn btn-success"> Download</a>
                          <a href="<?php echo e(url('/image/delete/'.$image->id.'/'.$image->task_name.'/'.$image->settings_name)); ?>" class="btn btn-danger"> Delete</a>
                					<!-- <input type="submit" name="" class="btn btn-danger" value="Delete"> -->

                				
                				
                			</div>
                		</div>
                	</div>
                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>



                
                <div class="col-lg-12">
                    <?php echo e($images->onEachSide(1)->links()); ?>

                </div>
               
            </div>




<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('settings_master.index_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 29.05.2022\east-side\resources\views/settings_master/gallery.blade.php ENDPATH**/ ?>