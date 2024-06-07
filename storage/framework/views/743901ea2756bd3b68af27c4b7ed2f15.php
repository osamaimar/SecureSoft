<?php $__env->startSection('content'); ?>
<?php echo $__env->make("Admin/partials/page-header", ["title"=> "Settings", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Settings'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="row">
    <div class="card col-xl-12">
        <form method="POST" action="<?php echo e(route('admin.settings.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card-body col-xl-4">
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Light logo</label>
                        <?php if(App\Models\Settings::first()->light_logo): ?>
                        <img src="<?php echo e(asset(App\Models\Settings::first()->light_logo)); ?>" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        <?php else: ?>
                        <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        <?php endif; ?>
                        <input class="form-control form-control-sm" name="light_logo" id="formFileSm" type="file">
                        <?php $__errorArgs = ['light_logo'];
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
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Dark logo</label>
                        <?php if(App\Models\Settings::first()->dark_logo): ?>
                            <img src="<?php echo e(asset(App\Models\Settings::first()->dark_logo)); ?>" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        <?php else: ?>
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        <?php endif; ?>
                            <input class="form-control form-control-sm" name="dark_logo" id="formFileSm" type="file">
                        <?php $__errorArgs = ['dark_logo'];
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
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Light icon</label>
                        <?php if(App\Models\Settings::first()->light_icon): ?>
                            <img src="<?php echo e(asset(App\Models\Settings::first()->light_icon)); ?>" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        <?php else: ?>
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        <?php endif; ?>
                        <input class="form-control form-control-sm" name="light_icon" id="formFileSm" type="file">
                        <?php $__errorArgs = ['light_icon'];
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
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Dark icon</label>
                        <?php if(App\Models\Settings::first()->dark_icon): ?>
                            <img src="<?php echo e(asset(App\Models\Settings::first()->dark_icon)); ?>" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        <?php else: ?>
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        <?php endif; ?>
                        <input class="form-control form-control-sm" name="dark_icon" id="formFileSm" type="file">
                        <?php $__errorArgs = ['dark_icon'];
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
                </div>

            </div>
            <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                <button type="submit" class="btn btn-primary-light m-1">Update</button>
            </div>
        </form>
    </div>
</div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin/partials/master',['title'=>'Settings'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Admin/settings/index.blade.php ENDPATH**/ ?>