

<?php $__env->startSection('content'); ?>

<div class="main-panel">
      <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
          <h1> Customer <span> <i class="fa fa-address-card-o"></i> </span> <small> Customer - View </small> </h1>
          <div class="card">
            <div class="card-body">


            <h2> <span> Customer List </span>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-create')): ?>
             <a href="<?php echo e(route('Customer.create')); ?>" class="combtnDiv"> Add Customer </a>
            <?php endif; ?>
            </h2>
            
            
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
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> Customer </th>
                      <th> Address </th>
                      <th> Phone Number </th>
                      <th> Email </th>
                      <th> Project </th>
                      <th>  </th>
                      <th> </th>
                    </tr>
                  </thead>

                  <?php $__currentLoopData = $customerdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                    <tr>
                      <td class="py-1"><img src="assets/images/round-img.jpg" alt="img"> <span><?php echo e($cus->customer_first_name); ?> </span></td>
                      <td> <?php echo e($cus->billing_address_street_1); ?> <br> Town School  </td>
                      <td> <?php echo e($cus->customer_phone); ?> </td>
                      <td> <?php echo e($cus->customer_email); ?> </td>
                      <td> <?php echo e(!empty($cus->projects)? $cus->projects->name : ""); ?> </td>
                      <td><div class="percent"> 20%
                          <div class="progressDiv"></div>
                        </div></td>
                      <td>
                        <span> <i class="fa fa-gear"></i> <a href="#"> Settings </a> </span>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-list')): ?>
                        <span> <i class="fa fa-eye"></i> <a href="<?php echo e(url('customer_show/'.$cus->id)); ?>"> View </a> </span>
                        <?php endif; ?>
                      </td>
                    </tr>          
                  </tbody>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>


                <div class="col-lg-12">
                    <?php echo e($customerdata->onEachSide(1)->links()); ?>

                </div>
          </div>

            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 16.06.2022\east-side\resources\views/customer/show_customer.blade.php ENDPATH**/ ?>