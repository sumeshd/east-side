

<?php $__env->startSection('content'); ?>


<div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Project <span> <i class="fa fa-file"></i> </span> <small>Project - Documnts </small> </h1>
        <div class="card">
          <div class="card-body">



          <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if( $setting['type'] == 'presales'): ?>
            <h2><span> Gallery </span>
            <a href="<?php echo e(url('/adddocument/'.$setting['id'].'/'.$setting['project_id'].'/'.$setting['type'])); ?>" class="combtnDiv"> Create New Image </a>
            </h2>
            <div class="boxthree">
                          <ul>
                            <li class="active"> <a href="#"> Presales </a> </li>
                            <li> <a href="#"> Postsales </a> </li>
                            <li> <a href="#"> Execution </a> </li>
                          </ul>
                      </div>
            <?php elseif( $setting['type'] == 'postsales'): ?>
            <h2><span> Gallery </span>
            <a href="<?php echo e(url('/adddocument/'.$setting['id'].'/'.$setting['project_id'].'/'.$setting['type'])); ?>" class="combtnDiv"> Create New Image </a>
            </h2>
                <div class="boxthree">
                  <ul>
                    <li> <a href="#"> Presales </a> </li>
                    <li  class="active"> <a href="#"> Postsales </a> </li>
                    <li> <a href="#"> Execution </a> </li>
                  </ul>
                </div>
            <?php elseif( $setting['settings_name'] == 'execution'): ?>
            <h2><span> Gallery </span>
            <a href="<?php echo e(url('/adddocument/'.$setting['id'].'/'.$setting['project_id'].'/'.$setting['type'])); ?>" class="combtnDiv"> Create New Image </a>
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


  			<div> class="uplode-imgSec mt-2">

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
                	<?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<div class="col-xl-2 col-lg-3 col-md-6 col-md-6 col-xs-12">
                		<div class="card mb-3">
                			<!-- <img src="<?php echo e(asset('images/'.$document->document_name)); ?>" class="card-img-top" alt="Broken" height="280" > -->
                			<iframe src="<?php echo e(url('/images/'.$document->document_name )); ?>" class="card-img-top" alt="Broken" height="280"></iframe>
                      <div class="card-body">
                				<p class="card-text" style="color:black;"><?php echo e($document->created_at->diffForHumans()); ?> </p>
                				
                					<a href="/images/<?php echo e($document->document_name); ?>" download="<?php echo e($document->document_name); ?>"> <button class="btn btn-success"> Download </button> </a>
                					<!-- <a href="<?php echo e(url('/image/download/'.$document->id)); ?>" class="btn btn-success"> Download</a> -->
                          <a href="<?php echo e(url('/image/delete/'.$document->id.'/'.$document->project_settings_id.'/'.$document->project_id)); ?>" class="btn btn-danger"> Delete</a>
                					<!-- <input type="submit" name="" class="btn btn-danger" value="Delete"> -->

                			</div>
                		</div>
                	</div>
                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="col-lg-12">
                    <?php echo e($documents->onEachSide(1)->links()); ?>

                </div>
            </div>




          </div>
        </div>
      </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('project.index_projectsettings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/project/projectdoc.blade.php ENDPATH**/ ?>