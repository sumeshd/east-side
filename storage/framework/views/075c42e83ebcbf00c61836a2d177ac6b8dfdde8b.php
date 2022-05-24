


<?php $__env->startSection('content'); ?>
You have been invited to join team <?php echo e($team->name); ?>.<br>
Click here to join: <a href="<?php echo e(route('teams.accept_invite', $invite->accept_token)); ?>"><?php echo e(route('teams.accept_invite', $invite->accept_token)); ?></a>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 17.05.2022\east-side\resources\views/teamwork_master/emails/invite.blade.php ENDPATH**/ ?>