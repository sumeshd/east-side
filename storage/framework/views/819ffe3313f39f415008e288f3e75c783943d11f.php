

<?php $__env->startSection('content'); ?>




<h2> <span> View Project Details </span> <a href="<?php echo e(route('Project.index')); ?>" class="combtnDiv"> Back Project List </a> </h2>

    <div class="table-responsive" id="color_black" >
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> Project Name </th>
                      <th> Project Status </th>
                      <th> Phone Number </th>
                      <th> Email </th>
                      <th> Project </th>
                      <th> </th>                 
                    </tr>
                  </thead>

                  <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                   
                    <tr>
                      <td class="py-1"><img src="<?php echo e(url('assets/images/round-img.jpg')); ?>" alt="img"> <span><?php echo e($project->projectname); ?> </span></td>
                      <td> <?php echo e($project->status); ?> </td>
                      <td> <?php echo e($project['budject']); ?> </td>
                      <td> <?php echo e($project['team']); ?> </td>
                      <td> <?php echo e($project['image']); ?></td>
                      <td> <?php echo e($project['id']); ?></td>
                    </tr>
                              
              

                    <tr>
                        <td><a class="btn btn-warning btn-lg" href="<?php echo e(url('edit_project/'.$project->id)); ?>"> Edit</a></td>
                        <td><a class="btn btn-danger btn-lg" href="<?php echo e(url('delete_project/'.$project->id)); ?>">Delete</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  </tbody>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </table>
              </div>





<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('project.index_project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side 27.04.2022\east-side\resources\views/project/details_project.blade.php ENDPATH**/ ?>