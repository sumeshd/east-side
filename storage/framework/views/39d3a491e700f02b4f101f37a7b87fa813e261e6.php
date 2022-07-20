

<?php $__env->startSection('content'); ?>

  <div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Task <span> <i class="fa fa-tasks"></i> </span> <small>Task Assigned To Me</small> </h1>
        <div class="card">
          <div class="card-body">

            <div class="container" style="margin-top: 20px;">
              <div class="row">
                  <div class="col-lg-12">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <p><?php echo e($message); ?></p>

                        </div>
                    <?php endif; ?>
                  </div>
              </div>
            </div>




              <h2> <span>Task</span>
                	<!-- <a href="<?php echo e(route('Project.create')); ?>" class="combtnDiv"> New Project </a> -->
              	<a href="#" class="combtnDiv"> Export Data </a> 
              </h2>

              <div class="table-responsive">
                <div id="no-more-tables">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> Project </th>
                        <th> Task </th>
                        <th> Assigned On</th>
                        <th> Due Date </th>
                        
                        <th> status  </th>
                        <th> Completed On </th>
                        <th> Completion </th>

                        <th> </th>
                      </tr>
                    </thead>

                    
                    <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td class="py-1"> <span><?php echo e($task->projectname); ?>  </span></td>
                        <td>  <?php echo e($task->task_name); ?> </td>
                        <td> <?php echo e(\Carbon\Carbon::parse($task->task_assing_on)->format('d/m/Y')); ?>  </td>
                        <td> <?php echo e(\Carbon\Carbon::parse($task->task_duedate)->format('d/m/Y')); ?></td>
                        <td><?php if( $task['status'] == 'Assigned'): ?>
                        		<span class="alert alert-danger" id="statusalert<?php echo e($task->project_settings_id); ?>">
                        			<span id="span<?php echo e($task->project_settings_id); ?>"><input type="checkbox" name="status" class="status" data-project-settings-id="<?php echo e($task->project_settings_id); ?>"> Incomplete </span>
                        		</span>

                        	<?php elseif( $task['status'] == 'Completed' ): ?>
                        		<span class="alert alert-success" id="statusalert<?php echo e($task->project_settings_id); ?>">
                        			<span id="span<?php echo e($task->project_settings_id); ?>"><input type="checkbox" name="status" class="status" data-project-settings-id="<?php echo e($task->project_settings_id); ?>" checked> Complete</span>
                        		</span>
                        	<?php endif; ?>


                        </td>
                        <td> <span id="completedate<?php echo e($task->project_settings_id); ?>"><?php echo e(\Carbon\Carbon::parse($task->completed_on )->format('d/m/Y')); ?></span> </td>
                        <td><div class="percent"> 20%
                            <div class="progressDiv"></div>
                          </div>
                        </td>
                        <td>
                          
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>

<script type="text/javascript">
	
	$(document).on('click','.status',function(){
      if(this.checked) {
        // $('#output').html('Checkbox is checked');
        var project_settings_id=$(this).attr('data-project-settings-id');
        $("#statusalert"+project_settings_id).removeClass("alert alert-success");
        $("#statusalert"+project_settings_id).removeClass("alert alert-danger");
        $("#statusalert"+project_settings_id).addClass("alert alert-success");
        $("#span"+project_settings_id).remove();
        var spanadd = '<span id="span'+project_settings_id+'"><input type="checkbox" name="status" class="status" data-project-settings-id="'+project_settings_id+'" checked> Complete </span>'
        $("#statusalert"+project_settings_id).append(spanadd);

        
        var completed = 'Completed';
        $.ajax({
          url: "<?php echo e(url('/task/status')); ?>",
          method: "GET",
          data: { project_settings_id:project_settings_id, completed:completed },
          success:function(data){
            alert(data);
            completed = "";
          }
        });
      }else{
      	var project_settings_id = $(this).attr('data-project-settings-id');
        $("#statusalert"+project_settings_id).removeClass("alert alert-success");
        $("#statusalert"+project_settings_id).removeClass("alert alert-danger");
        $("#statusalert"+project_settings_id).addClass("alert alert-danger");
        $("#span"+project_settings_id).remove();
        var spanadd = '<span id="span'+project_settings_id+'"><input type="checkbox" name="status" class="status" data-project-settings-id="'+project_settings_id+'"> Incomplete </span>'
        $("#statusalert"+project_settings_id).append(spanadd);
        
        var completed = 'Incomplete';
        $.ajax({
          url: "<?php echo e(url('/task/status')); ?>",
          method: "GET",
          data: { project_settings_id:project_settings_id, completed:completed },
          success:function(data){
            alert(data);
            completed = "";
          }
        });
      }


    })
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('project.index_projectsettings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\Work File\East Side 16.06.2022\east-side\resources\views/project/task.blade.php ENDPATH**/ ?>