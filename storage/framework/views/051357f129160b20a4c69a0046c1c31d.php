<?php $__env->startSection('content'); ?>



<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card mt-4">
            <div class="card-body">
                <div class="contact-header">
                    <div class="d-sm-flex d-block align-items-center justify-content-between">
                        <div class="h5 fw-semibold mb-0">Selelct Roles</div>
                        <div class="d-flex mt-sm-0 mt-2 align-items-center">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0" placeholder="Search Contact" aria-describedby="search-contact-member">
                                <button class="btn btn-light" type="button" id="search-contact-member"><i class="ri-search-line text-muted"></i></button>
                            </div>
                            <div class="dropdown ms-2">
                                <button class="btn btn-icon btn-primary-light btn-wave" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">Delete All</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Copy All</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Move To</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-icon btn-secondary-light ms-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add Contact"><i class="ri-add-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="card custom-card">
            <div class="card-body contact-action">
                <div class="contact-overlay"></div>
                <div class="d-flex align-items-top">
                    <div class="d-flex flex-fill flex-wrap gap-3">
                        <div class="avatar avatar-xl avatar-rounded">
                            <img src="<?php echo e(asset('/assets')); ?>/images/faces/22.png" alt="">
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">
                                <?php echo e($admin->first_name); ?> <?php echo e($admin->last_name); ?>

                            </h6>
                            <p class="mb-1 text-muted  text-truncate"><?php echo e($admin->email); ?></p>
                            <p class="fw-semibold fs-11 mb-0 text-primary">
                                <?php echo e($admin->phone_number); ?>

                            </p>

                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-2 contact-hover-buttons">
                    <form method="GET" class="contact-hover-btn" action="<?php echo e(route('admin.admins.edit',$admin)); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-sm btn-light contact-hover-btn">
                            Edit Admin
                        </button>
                    </form>
                    <div class="dropdown contact-hover-dropdown">
                        <button class="btn btn-sm btn-icon btn-light btn-wave" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <?php if($admin->is_active): ?>
                            <form method="POST" action="<?php echo e(route('admin.admins.block',$admin)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-sm text-danger dropdown-item"><i class="bx bx-error-circle me-2 align-middle d-inline-block"></i>Block</button>
                            </form>
                            <?php else: ?>
                            <form method="POST" action="<?php echo e(route('admin.admins.activate',$admin)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-sm dropdown-item">Activate</button>
                            </form>
                            <?php endif; ?>
                            
                            <form method="get" action="<?php echo e(route('admin.roles.editRole',$admin)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm dropdown-item" ><i class="ri-group-line me-2 align-middle d-inline-block"></i>Edit Role</button>
                            </form>
                            
                            <form method="get" action="<?php echo e(route('admin.permisisons.editPermission',$admin)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm dropdown-item" ><i class="ri-group-line me-2 align-middle d-inline-block"></i>Edit Permission</button>
                            </form>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <ul class="pagination justify-content-end">
        <!-- Previous Page Link -->
        <?php if($admins->onFirstPage()): ?>
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>
        <?php else: ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo e($admins->previousPageUrl()); ?>" rel="prev">Previous</a>
        </li>
        <?php endif; ?>

        <!-- Pagination Elements -->
        <?php $__currentLoopData = $admins->links()->elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- "Three Dots" Separator -->
        <?php if(is_string($element)): ?>
        <li class="page-item disabled"><span class="page-link"><?php echo e($element); ?></span></li>
        <?php endif; ?>

        <!-- Array Of Links -->
        <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $admins->currentPage()): ?>
        <li class="page-item active" aria-current="page"><span class="page-link"><?php echo e($page); ?></span></li>
        <?php else: ?>
        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Next Page Link -->
        <?php if($admins->hasMorePages()): ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo e($admins->nextPageUrl()); ?>" rel="next">Next</a>
        </li>
        <?php else: ?>
        <li class="page-item disabled">
            <span class="page-link">Next</span>
        </li>
        <?php endif; ?>
    </ul>
    </nav>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin/partials/master',['title'=>'Admins List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/admin/admins/admins-list.blade.php ENDPATH**/ ?>