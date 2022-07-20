

<?php $__env->startSection('content'); ?>


<h2> <span> Project List </span> 
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project-create')): ?>
  <a href="<?php echo e(route('Project.create')); ?>" class="combtnDiv"> New Project </a>
<?php endif; ?>

<a href="#" class="combtnDiv"> Export Data </a> </h2>


<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12">
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success" role="alert">
            <p><?php echo e($message); ?></p>

        </div>
        <?php endif; ?>
  </div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12">
    <?php if($message = Session::get('error')): ?>
        <div class="alert alert-danger" role="alert">
            <p><?php echo e($message); ?></p>

        </div>
        <?php endif; ?>
  </div>
</div>


            <div class="table-responsive">
                <div id="no-more-tables">
                  <table class="table table-striped" id="table_id">
                    <thead>
                      <tr>
                        <th> Project </th>
                        <th> Created At </th>
                        <th> Project Type </th>
                        <th> Address</th>
                        <th> Customer </th>
                        <th> Team </th>
                        <th> Completion </th>

                        <th> </th>
                      </tr>
                    </thead>

                    
                    <tbody>
                    <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td class="py-1"> <span> <?php echo e($pro->projectname); ?> </span></td>
                        <td>  <?php echo e(\Carbon\Carbon::parse($pro->created_at)->format('d/m/Y')); ?> </td>
                        <td> <?php echo e($pro->project_type); ?> </td>
                        <td>  <?php echo e($pro->address_1); ?><?php echo e($pro->address_2); ?><?php echo e($pro->address_3); ?> </td>
                        <td>  <?php echo e($pro->getCustomer); ?> </td>
                        <td>
                          <?php $__currentLoopData = $pro->getTeam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($team->name); ?>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><div class="percent"> 20%
                            <div class="progressDiv"></div>
                          </div>
                        </td>
                        <td>
                          <?php $settings_name = explode(",", $pro->settings_name ); ?>
                          <?php in_array('Presales',$settings_name)? $presales ='presales' :  $presales =''  ?>
                          <?php in_array('Postsales',$settings_name)? $postsales='postsales':$postsales='' ?>
                          <?php in_array('Execution',$settings_name)? $execution='execution':$execution='' ?>
                          <?php if(!empty($presales)): ?>
                            <span> <i class="fa fa-gear"></i> <a href="<?php echo e(url('projectsettings/'.$presales.'/'.$pro->id)); ?>"> Settings </a> </span>
                          <?php elseif( !empty($postsales)): ?>
                            <span> <i class="fa fa-gear"></i> <a href="<?php echo e(url('projectsettings/'.$postsales.'/'.$pro->id)); ?>"> Settings </a> </span>
                          <?php elseif( !empty($execution)): ?>
                            <span> <i class="fa fa-gear"></i> <a href="<?php echo e(url('projectsettings/'.$execution.'/'.$pro->id)); ?>"> Settings </a> </span>
                          <?php endif; ?>

                            <span> <i class="fa fa-gear"></i> <a href="<?php echo e(url('projectVS/'.$pro->id)); ?>"> Settings View </a> </span>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project-list')): ?>
                            <span> <i class="fa fa-eye"></i> <a href="<?php echo e(url('show/'.$pro->id)); ?>"> View </a> </span>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>







<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
});
   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('project.index_project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/project/show_project.blade.php ENDPATH**/ ?>