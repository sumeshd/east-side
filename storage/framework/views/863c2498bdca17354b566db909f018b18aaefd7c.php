

<?php $__env->startSection('content'); ?>


<h2> <span> View Customer Details </span> <a href="<?php echo e(route('Customer.index')); ?>" class="combtnDiv"> Back Customer List </a> </h2>

    <div class="table-responsive" id="color_black" >
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> Customer </th>
                      <th> Address </th>
                      <th> Phone Number </th>
                      <th> Email </th>
                      <th> Project </th>
                      <th> </th>
                     
                    </tr>
                  </thead>

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                    <tr>
                      <td class="py-1"><img src="<?php echo e(url('assets/images/round-img.jpg')); ?>" alt="img"> <span><?php echo e($data->customer_first_name); ?> </span></td>
                      <td> <?php echo e($data->billing_address_street_1); ?> </td>
                      <td> <?php echo e($data->customer_phone); ?> </td>
                      <td> <?php echo e($data->customer_email); ?> </td>
                      <td> <?php echo e($data->customer_department); ?></td>
                      <td> <?php echo e($data->customer_website); ?></td>
                    </tr>
                              
              

                    <tr>
                        <td><a class="btn btn-warning btn-lg" href="<?php echo e(url('customer_edit/'.$data->customer_id)); ?>"> Edit</a></td>
                        <td><a class="btn btn-danger btn-lg" href="<?php echo e(url('customer_delete/'.$data->customer_id)); ?>">Delete</a></td>
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
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side\east-side\resources\views/customer/details_customer.blade.php ENDPATH**/ ?>