

<?php $__env->startSection('content'); ?>


<h2> <span> Project List </span> <a href="<?php echo e(route('Project.create')); ?>" class="combtnDiv"> New Project </a> <a href="#" class="combtnDiv"> Export Data </a> </h2>


<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12">
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success" role="alert">
            <p><?php echo e($message); ?></p>

        </div>
        <?php endif; ?>
  </div>
</div>


            <div class="table-responsive">
                <div id="no-more-tables">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> Project </th>
                        <th> Created At </th>
                        <th> Status </th>
                        <th> Budget </th>
                        <th> Team </th>
                        <th> Completion </th>
                        <th> </th>
                      </tr>
                    </thead>

                    <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                      <tr>
                        <td class="py-1"><?php echo e($pro->image); ?> <span> <?php echo e($pro->projectname); ?> </span></td>
                        <td> <?php echo e($pro->created_at); ?> </td>
                        <td> <?php echo e($pro->status); ?> </td>
                        <td> <?php echo e($pro->budject); ?> </td>
                        <td><ul>
                            <li> <img src="assets/images/round-img.jpg" alt="img"> </li>
                            <li> <img src="assets/images/round-img.jpg" alt="img"> </li>
                            <li> <img src="assets/images/round-img.jpg" alt="img"> </li>
                          </ul></td>
                        <td><div class="percent"> 20%
                            <div class="progressDiv"></div>
                          </div></td>
                        <td><span> <i class="fa fa-gear"></i> <a href="#"> Settings </a> </span> <span> <i class="fa fa-eye"></i> <a href="<?php echo e(url('show/'.$pro->id)); ?>"> View </a> </span></td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>







<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<script type="text/javascript">
   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('project.index_project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side\east-side\resources\views/project/show_project.blade.php ENDPATH**/ ?>