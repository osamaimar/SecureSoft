<?php $__env->startSection('content'); ?>
<?php echo $__env->make("Admin/partials/page-header", ["title"=> "Add Roles", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Add Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body p-0">
                <div class="card-body p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xl-12 ">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <form method="POST" action="<?php echo e(route('admin.roles.addRole',$admin)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-3 mt-4">
                                                    <h5 class=" text-dark d-block mb-3">Add Roles</h5>
                                                    <?php $__errorArgs = ['roles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0"><?php echo e($message); ?></label>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    
                                                    <?php $__currentLoopData = App\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="d-inline-block mb-4">
                                                        <input class="form-check-input" <?php if($admin->hasRole($role->name)): echo 'checked'; endif; ?> type="checkbox" value="<?php echo e($role->name); ?>" name="roles[]" id="product1" aria-label="...">
                                                        <h9 class="me-3 fw-semibold"><?php echo e($role->name); ?></h9>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>

                                                <button class="btn btn-primary" type="submit">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin/partials/master',['title'=>'Add Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Admin/admins/admin-role.blade.php ENDPATH**/ ?>