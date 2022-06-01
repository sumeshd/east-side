

<?php $__env->startSection('content'); ?>

<h2>
  <a href="<?php echo e(url('gallery')); ?>" class="combtnDiv">Gallery </a>
</h2>

			<div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>

            <div class="uplode-imgSec">
            	<form method="post" action="/image/upload" enctype="multipart/form-data">
            		<?php echo csrf_field(); ?>
                <h3> Add New Image </h3>
                <div class="row">
	                <div class="col-md-5">
	                    <div class="uplode-imgSec-in">
	                    	<div class="upDiv"> <input type="file" class="fa fa-upload" name="image[]" multiple accept="image/*"> <!-- <button type="file"><i class="fa fa-upload"></i> Uplode image</button> --> </div>
	                    </div>
	                </div>
	                <div class="col-md-7">
	                    <div class="uplode-imgSec-in">
	                      <div class="form-group">
	                        <input type="text" class="form-control" name="image_name" placeholder="Add image Name" id="usr">
	                      </div>
	                      <!-- <a href="#" class="savbtn"> Save </a> -->
	                      <button type="submit" class="savbtn"> Save </button> 
	                  	</div> 
	                </div> 
                </div>
                </form>
            </div>




<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('settings_master.index_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 29.05.2022\east-side\resources\views/settings_master/image_settings.blade.php ENDPATH**/ ?>