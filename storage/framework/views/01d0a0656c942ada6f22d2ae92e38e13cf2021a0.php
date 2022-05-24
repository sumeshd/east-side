
<?php $__env->startSection('content'); ?>

<h2> <span> Team List  </span>
    <a href="<?php echo e(route('teams.create')); ?>" class="combtnDiv"> New Team </a>
    <a href="#" class="combtnDiv"> Export Data </a>
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
                <div id="no-more-tables">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> Name </th>
                        <th> Status </th>
                        <th> </th>
                        <th width="200px"> Action </th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y">
                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($team->name); ?></td>
                                <td>
                                    <?php if(auth()->user()->isOwnerOfTeam($team)): ?>
                                        <span class="">Owner</span>
                                    <?php else: ?>
                                        <span class="text-indigo-700 bg-indigo-200 rounded-xl">Member</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey()): ?>
                                        <a href="<?php echo e(route('teams.switch', $team)); ?>" class="btn btn-info">
                                            Switch
                                        </a>
                                    <?php else: ?>
                                        <lavel class="btn btn-success">Current team</lavel>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('teams.members.show', $team)); ?>" class="btn btn-primary">
                                        Members
                                    </a>

                                    <?php if(auth()->user()->isOwnerOfTeam($team)): ?>
                                        
                                        <a href="<?php echo e(route('teams.edit', $team)); ?>" class="btn btn-warning">
                                            Edit
                                        </a>
                                        
                                        <div style="margin-top:10px ;">
                                        <form class="inline-block" action="<?php echo e(route('teams.destroy', $team)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                        </div>
                                        
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 13.05.2022\east-side\resources\views/teamwork_master/show_teamwork.blade.php ENDPATH**/ ?>