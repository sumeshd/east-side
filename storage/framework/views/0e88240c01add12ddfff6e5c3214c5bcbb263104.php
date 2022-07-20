

<?php $__env->startSection('content'); ?>

<div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Comments <span> <i class="fa fa-commenting"></i> </span> <small>Comments </small> </h1>
        <div class="card">
          <div class="card-body">

				  <div class="row" style="margin-top: 20px;">
                  <div class="col-lg-12">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <p><?php echo e($message); ?></p>

                        </div>
                        <?php endif; ?>
                  </div>
                </div>

              <?php if( $settings->type == 'presales'): ?> 
  			       <div class="mt-4 ">
                <div > <h2 class="center">Presales</h2> </div>
                  <div class="card card-body commentsDiv">
                    <h2>Leav A Comment <?php echo e($settings->type); ?></h2>

                    <form action="<?php echo e(url('comment')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="project_id" value="<?php echo e($settings->project_id); ?>">
                      <input type="hidden" name="project_settings_id" value="<?php echo e($settings->id); ?>">
                      <div class="form-group">
                        <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                      </div>
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </form>
                  </div>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $settings->getComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="commentsDiv">
                  <div class="row">
                  <div class="col-md-2">
                  <div class="commentsDiv-lft">
                  <span> <img src="assets/images/profile-img1.jpg" alt="img"> </span>
                  <h3> <?php if($comment->user): ?>
                      <?php echo e($comment->user->name); ?> 
                      <?php endif; ?> </h3><h4 style="color:black;"><small>comment on : <?php echo e($comment->created_at->format('d-m-y')); ?></small></h4>
                  </div>
                  </div>
                       <div class="col-md-10">
                  <div class="commentsDiv-rht">
                  <p> <?php echo e($comment->comment_body); ?> </p>
                  </div>
                  </div>
                  </div>
                  
                   <?php if(Auth::check() && Auth::id() == $comment->user_id ): ?>
                    <div>
                      <a href="" class="btn btn-primary btn-sm">Edit</a>
                      <a href="<?php echo e(url('/comment/'.$comment->id)); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    <?php endif; ?>
                  
                   </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h6>no comment yet</h6>
                <?php endif; ?>

              <?php elseif( $settings->settings_name == 'postsales'): ?>
                <div class="mt-4 ">
                  <div > <h2 class="center">Postsales</h2> </div>
                  <div class="card card-body commentsDiv">
                    <h2>Leav A Comment <?php echo e($settings->postsales_name); ?></h2>

                    <form action="<?php echo e(url('comment')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="settings_name" value="<?php echo e($settings->settings_name); ?>">
                      <input type="hidden" name="settings_id" value="<?php echo e($settings->id); ?>">
                      <div class="form-group">
                        <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                      </div>
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </form>
                  </div>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $settings->postcomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="commentsDiv">
                  <div class="row">
                  <div class="col-md-2">
                  <div class="commentsDiv-lft">
                  <span> <img src="assets/images/profile-img1.jpg" alt="img"> </span>
                  <h3> <?php if($comment->user): ?>
                      <?php echo e($comment->user->name); ?> 
                      <?php endif; ?> </h3><h4 style="color:black;"><small>comment on : <?php echo e($comment->created_at->format('d-m-y')); ?></small></h4>
                  </div>
                  </div>
                       <div class="col-md-10">
                  <div class="commentsDiv-rht">
                  <p> <?php echo e($comment->comment_body); ?> </p>
                  </div>
                  </div>
                  </div>
                  
                   <?php if(Auth::check() && Auth::id() == $comment->user_id ): ?>
                    <div>
                      <a href="" class="btn btn-primary btn-sm">Edit</a>
                      <a href="<?php echo e(url('/comment/'.$comment->id)); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    <?php endif; ?>
                  
                   </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h6>no comment yet</h6>
                <?php endif; ?>
              <?php else: ?>
                <div class="mt-4 ">
                  <div> <h2 class="center"> Execution </h2> </div>
                  <div class="card card-body commentsDiv">
                    <h2>Leav A Comment <?php echo e($settings->execution_name); ?></h2>

                    <form action="<?php echo e(url('comment')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="settings_name" value="<?php echo e($settings->settings_name); ?>">
                      <input type="hidden" name="settings_id" value="<?php echo e($settings->id); ?>">
                      <div class="form-group">
                        <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                      </div>
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </form>
                  </div>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $settings->execomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="commentsDiv">
                  <div class="row">
                  <div class="col-md-2">
                  <div class="commentsDiv-lft">
                  <span> <img src="assets/images/profile-img1.jpg" alt="img"> </span>
                  <h3> <?php if($comment->user): ?>
                      <?php echo e($comment->user->name); ?> 
                      <?php endif; ?> </h3><h4 style="color:black;"><small>comment on : <?php echo e($comment->created_at->format('d-m-y')); ?></small></h4>
                  </div>
                  </div>
                       <div class="col-md-10">
                  <div class="commentsDiv-rht">
                  <p> <?php echo e($comment->comment_body); ?> </p>
                  </div>
                  </div>
                  </div>
                  
                   <?php if(Auth::check() && Auth::id() == $comment->user_id ): ?>
                    <div>
                      <a href="" class="btn btn-primary btn-sm">Edit</a>
                      <a href="<?php echo e(url('/comment/'.$comment->id)); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    <?php endif; ?>
                  
                   </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h6>no comment yet</h6>
                <?php endif; ?>
              <?php endif; ?>



</div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('project.index_projectsettings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/comment_master/comment.blade.php ENDPATH**/ ?>