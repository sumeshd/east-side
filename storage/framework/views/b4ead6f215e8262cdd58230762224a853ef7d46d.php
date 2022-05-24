

<?php $__env->startSection('content'); ?>

    <h2> <span> Member Of Team  </span><span class="tracking-wide"><?php echo e($team->name); ?></span> 

        <span><a href="<?php echo e(route('teams.index')); ?>" class="combtnDiv"> Team </a></span>
    </h2>

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

            <div class="table-responsive">
                <div id="no-more-tables">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                        <?php $__currentLoopData = $team->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->name); ?></td>
                                <td>
                                    <?php if(auth()->user()->isOwnerOfTeam($team)): ?>
                                        <?php if(auth()->user()->getKey() !== $user->getKey()): ?>
                                            <form class="inline-block" action="<?php echo e(route('teams.members.destroy', [$team, $user])); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            
                <form class="row g-5" method="post" action="<?php echo e(route('teams.adduser', [ $team ] )); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="table-responsive">
                        <div class="customDiv">
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="usr">Existing User</label>
                                            <div class="form-group">                          
                                                    <select id="" class="form-control" id="sel1" name="id">
                                                        <option value="null" selected="" disabled=""> -- Select Users -- </option>
                                                        <?php $__currentLoopData = $xusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xuser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($xuser->id); ?>"><?php echo e($xuser->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                <div id="color_red"> <?php $__errorArgs = ['id'];
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
                            <button type="submit" class="savDiv">Add To Team</button>
                        </div> 
                    </div>
                </form>
            

            <?php if(auth()->user()->isOwnerOfTeam($team)): ?>
            <h2> <span> Pending invitations  </span></h2>
            <div class="table-responsive">
                <div id="no-more-tables">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> E-Mail </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                        <?php $__currentLoopData = $team->invites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($invite->email); ?></td>
                            <td>
                            <a href="<?php echo e(route('teams.members.resend_invite', $invite)); ?>" class="btn btn-success">
                                Resend invite
                            </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <h2> <span>Invite to team "<?php echo e($team->name); ?>"</span></h2>
            <div>
                <form class="row g-5" method="post" action="<?php echo e(route('teams.members.invite', $team)); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="table-responsive">
                        <div class="customDiv">
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="usr">Email</label>
                                            <div class="form-group">                          
                                                <input type="text" class="form-control color_black" placeholder="Enter Email" id="usr" name="email" value="<?php echo e(old('email')); ?>" required>
                                                <div id="color_red"> <?php $__errorArgs = ['email'];
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
                            <button type="submit" class="savDiv">Invite to Team</button>
                        </div> 

                    </div>
                </form>
            </div>
            <?php endif; ?>



            







<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
<script>

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 13.05.2022\east-side\resources\views/teamwork_master/members/member_list.blade.php ENDPATH**/ ?>