<?php $__env->startSection('content'); ?>
<?php echo $__env->make("Admin/partials/page-header", ["title"=> "Roles", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                            <form method="POST" action="<?php echo e(route('admin.roles.store')); ?>">
                                                <?php echo csrf_field(); ?>

                                                <div class="mb-3">
                                                    <label for="form-text" class="form-label fs-14 text-dark">Role name</label>
                                                    <input type="text" name="name" class="form-control" id="form-text" placeholder="Enter role name">
                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0"><?php echo e($message); ?></label>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="mb-3 mt-4">
                                                    <h5 class=" text-dark d-block">Permissions</h5>
                                                    <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0"><?php echo e($message); ?></label>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <div class="mb-4">
                                                        <input type="checkbox" id="checkAll" class="form-check-input">
                                                        <label for="checkAll" class="fw-semibold">Check All</label>
                                                    </div>

                                                    <?php $__currentLoopData = App\Models\Permission_Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <h6><?php echo e($category->name); ?></h6>

                                                    <?php $__currentLoopData = $category->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="d-inline-block mb-4">
                                                        <input class="form-check-input permission-checkbox" type="checkbox" value="<?php echo e($permission->name); ?>" name="permissions[]" id="permission<?php echo e($loop->index); ?>" aria-label="...">
                                                        <label for="permission<?php echo e($loop->index); ?>" class="fw-semibold"><?php echo e($permission->name); ?></label>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>

                                                <button class="btn btn-primary" type="submit">Submit</button>
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
<?php $__env->startSection('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkAllBox = document.getElementById('checkAll');
        const checkboxes = document.querySelectorAll('.permission-checkbox');

        checkAllBox.addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = checkAllBox.checked;
            });
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (!this.checked) {
                    checkAllBox.checked = false;
                } else {
                    const allChecked = Array.from(checkboxes).every(chk => chk.checked);
                    checkAllBox.checked = allChecked;
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin/partials/master',['title'=>'Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/admin/role/add-role.blade.php ENDPATH**/ ?>