

<?php $__env->startSection('content'); ?>







<form class="row g-5 " action="<?php echo e(route('Execution.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Checklist</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="checklist">
                                    <div id="color_red"> <?php $__errorArgs = ['checklist'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Status</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Status" id="usr" name="tablist">
                                    <div id="color_red"> <?php $__errorArgs = ['tablist'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Budject</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Budject" id="usr" name="tasklist">
                                    <div id="color_red"> <?php $__errorArgs = ['tasklist'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>                                            
                                </div>
                            </div>
                        </div>
                       
                    </div>

                





                </div>
                

            </div>
            <div class="full">                
                <button type="submit" class="savDiv">Save</button>
                <a href="#" class="candiv"> Cancel </a>
                        
            </div> 
        </div>
</form>







<!--------------------------------test------------------- -->




















<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>


<script src="<?php echo e(url('assets/custom_create_js/execution/execution.js')); ?>"></script>
<!-- <script type="text/javascript">
   $("execution").submit(function(e){
       e.preventDefault();
       let checklist = $("").val();
       let tablist = $("#tablist").val();
       let tasklist =$("#tasklist").val();
       let _token =$("input[name=_token]").val();
       $.ajax({
           url: "<?php echo e(route ('Execution.store')); ?>",
           type: "POST",
           data:{
            checklist:checklist,
            tablist:tablist,
            tasklist:tasklist,
            _token:_token

           },
           success:function(response)
           {
               if(response)
               {
                   $("#table tbody").prepend('<tr><td>'+response.checklist+'</td><td>'+response.tablist+'</td><td>'+response.tasklist+'</td></tr>');
               }
           }
       });
   });
  
</script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('execution.index_execution', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side Project\LaravelStater\resources\views/execution/create_execution.blade.php ENDPATH**/ ?>