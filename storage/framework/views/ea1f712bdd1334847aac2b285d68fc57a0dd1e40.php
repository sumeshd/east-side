

<?php $__env->startSection('content'); ?>
<h2><span> Gallery </span>
  <a href="<?php echo e(url('settings/imageadd')); ?>" class="combtnDiv">Create New Image </a>
</h2>

						<div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>

            <div class="uplode-imgSec mt-2">
            	
                <h3>  </h3>


                <div class="row" style="margin-top: 20px;">
								  <div class="col-lg-12">
								    <?php if($message = Session::get('success')): ?>
								        <div class="alert alert-success" role="alert">
								            <p><?php echo e($message); ?></p>

								        </div>
								        <?php endif; ?>
								  </div>
								</div>


                <div class="row">
                	<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<div class="col-xl-2 col-lg-3 col-md-6 col-md-6 col-xs-12">
                		<div class="card mb-3">
                			<img src="<?php echo e(url($image->image)); ?>" class="card-img-top" alt="Broken" height="280" >
                			<div class="card-body">
                				<p class="card-text" style="color:black;"><?php echo e($image->created_at->diffForHumans()); ?> </p>
                				<form action="image/delete/<?php echo e($image->id); ?>" method="POST" >
                					<?php echo method_field('DELETE'); ?>
                					<?php echo csrf_field(); ?>
                					<a href="<?php echo e(url('image/download', $image->id)); ?>" class="btn btn-success"> Download</a>
                					<input type="submit" name="" class="btn btn-danger" value="Delete">

                				</form>
                				
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