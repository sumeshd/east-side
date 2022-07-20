

<?php $__env->startSection('content'); ?>

<div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Project  <span> <i class="fa fa-file-text"></i> </span> <small>Projact - Details </small> </h1>
        <div class="card">
          <div class="card-body">




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
                    <th> Team </th>
                    <th> Customer</th>
                
                  </tr>
                </thead>
                
                <tbody>
                 
                  <tr>
                    <td class="py-1"><img src="<?php echo e(url('assets/images/round-img.jpg')); ?>" alt="img"> <span><?php echo e($project-> project_type); ?> </span></td>
                    <td> <?php echo e($project->name); ?> </td>
                    <td>  <?php echo e($project->projectnumber); ?></td>
                    <td>  <?php echo e($project->projectname); ?></td>
                    <td> <?php echo e($project->address_1); ?><?php echo e($project->address_2); ?><?php echo e($project->address_3); ?></td>
                    <td>  <?php $__currentLoopData = $project->getTeam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($team->name); ?>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                    <td>  <?php echo e($project->getCustomers); ?>      </td>
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


            </div>





          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('project.index_projectsettings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/project/details_project.blade.php ENDPATH**/ ?>