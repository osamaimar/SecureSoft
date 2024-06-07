<?php $__env->startSection('content'); ?>
<?php echo $__env->make("Admin/partials/page-header", ["title"=> "Roles", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Manage Roles
                </div>
                <div class="d-flex">
                    <form method="GET" action="<?php echo e(route('admin.roles.create')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-sm btn-primary btn-wave waves-light"><i class="ri-add-line fw-semibold align-middle me-1"></i> Create Role</button>
                    </form>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Guard Name</th>
                                <th scope="col">Users</th>
                                <th scope="col">Permissions</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = App\Models\Role::paginate(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr class="invoice-list">
                                <td>
                                    <span class="badge bg-success"><?php echo e($role->id); ?></span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 fw-semibold"><?php echo e($role->name); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success"><?php echo e($role->guard_name); ?></span>
                                </td>
                                <td>
                                    <p class="fw-semibold text-primary">
                                        <?php echo e($role->users()->count()); ?>

                                    </p>
                                </td>
                                <td>
                                    <?php echo e($role->permissions()->count()); ?>

                                </td>

                                <td class='hstack gap-2 fs-15'>
                                    <form method="GET" action="<?php echo e(route('admin.roles.edit',$role)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-primary-light btn-icon btn-sm"><i class="ri-edit-line"></i></button>
                                    </form>
                                    <form method="POST" action="<?php echo e(route('admin.roles.destroy',$role)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger-light btn-icon btn-sm"><i class="ri-delete-bin-5-line"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <!-- Custom Pagination -->
                <?php

                use App\Models\Role;

                $roles = Role::paginate(10) ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0 float-end">
                        
                        <?php if($roles->onFirstPage()): ?>
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($roles->previousPageUrl()); ?>">Previous</a></li>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = $roles->getUrlRange(1, $roles->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $roles->currentPage()): ?>
                        <li class="page-item active"><span class="page-link"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($roles->hasMorePages()): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($roles->nextPageUrl()); ?>">Next</a></li>
                        <?php else: ?>
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin/partials/master',['title'=>'Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/admin/role/roles-list.blade.php ENDPATH**/ ?>