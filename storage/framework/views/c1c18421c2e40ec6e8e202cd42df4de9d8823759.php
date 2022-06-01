

<?php $__env->startSection('content'); ?>




<h2> <span> View Project Details </span> <a href="<?php echo e(route('Project.index')); ?>" class="combtnDiv"> Back Project List </a> </h2>

            <div class="table-responsive" id="color_black" >
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th> Project Type </th>
                    <th> Name </th>
                    <th> Projectnumber </th>
                    <th> project Name </th>
                    <th> Address </th>
                    <th> </th>                 
                  </tr>
                </thead>
                
                <tbody>
                 
                  <tr>
                    <td class="py-1"><img src="<?php echo e(url('assets/images/round-img.jpg')); ?>" alt="img"> <span><?php echo e($project-> project_type); ?> </span></td>
                    <td> <?php echo e($project->name); ?> </td>
                    <td>  <?php echo e($project->projectnumber); ?></td>
                    <td>  <?php echo e($project->projectname); ?></td>
                    <td> <?php echo e($project->address_1); ?><?php echo e($project->address_2); ?><?php echo e($project->address_3); ?></td>
                    <td> </td>
                  </tr>

                  <tr>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project-edit')): ?>
                    <td><a class="btn btn-warning btn-lg" href="<?php echo e(url('edit_project/'.$project->id)); ?>"> Edit</a></td>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project-delete')): ?>
                    <td><a class="btn btn-danger btn-lg" href="<?php echo e(url('delete_project/'.$project->id)); ?>">Delete</a></td>
                      <?php endif; ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      
                    </td>
                  </tr>
                </tbody>
                 
              </table>
              <div class="mt-4">
                <div class="card card-body">
                  <h6>Leav A Comment</h6>

                  <form action="<?php echo e(url('comment')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="project_slug" value="<?php echo e($project->slug); ?>">
                    <input type="hidden" name="project_id" value="<?php echo e($project->id); ?>">
                    <div class="form-group">
                      <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                    </div>
                      <button type="submit" class="btn btn-primary"> Submit</button>
                  </form>

                </div>
              </div>
              <?php $__empty_1 = true; $__currentLoopData = $project->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="card card-body mt-3" >
                <h6><?php if($comment->user): ?>
                  <?php echo e($comment->user->name); ?>

                  <?php endif; ?>
                  
                <small>comment on : 3-8-2022</small></h6>

                <p class="mb-1"><?php echo e($comment->comment_body); ?></p>
                <?php if(Auth::check() && Auth::id() == $comment->user_id ): ?>
                <div>
                  <a href="" class="btn btn-primary btn-sm">Edit</a>
                  <a href="" class="btn btn-danger btn-sm">Delete</a>
                </div>
                <?php endif; ?>
                
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <h6>no comment yet</h6>
              <?php endif; ?>
            </div>







<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('project.index_project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 29.05.2022\east-side\resources\views/project/details_project.blade.php ENDPATH**/ ?>