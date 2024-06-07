<?php $__env->startSection('content'); ?>
<?php echo $__env->make("Merchant/partials/page-header", ["title"=> "Favorite", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Favorite'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-xxl-12">
        <div class="card custom-card" id="cart-container-delete">
            <div class="card-header">
                <div class="card-title">
                    Favorite Items
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>
                                    Product Name
                                </th>
                                <th>
                                    Partner Price
                                </th>
                                <th>
                                    End User Price
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <span class="avatar avatar-xxl bg-light">
                                                <img src="<?php echo e(asset($product->default_image)); ?>" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            <div class="mb-1 fs-14 fw-semibold">
                                                <a href="javascript:void(0);"><?php echo e($product->name); ?> (ID:<?php echo e($product->id); ?>)</a>
                                            </div>
                                            <div class="mb-1">
                                                <span class="me-1">Region:</span>
                                                <?php $__currentLoopData = $product->regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="fw-semibold text-muted"><?php echo e($region->name); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-quantity-container">
                                    <div class="fw-semibold fs-14">
                                        $<?php echo e($product->min_partner_price); ?>

                                    </div>
                                </td>
                                <td class="product-quantity-container">
                                    <div class="fw-semibold fs-14">
                                        $<?php echo e($product->end_user_price); ?>

                                    </div>
                                </td>

                                <td class="product-quantity-container text-center">
                                    <form method="POST" class="d-inline-block p-0 m-0" action="<?php echo e(route('merchant.favorite.delete',$product)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove From favorite">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php if($products->isEmpty()): ?>
                    <div class="text-center mt-5" style="height: 30vh; align-items: center;">
                        <h1>Empty!</h1>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <!-- Custom Pagination -->

                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0 float-end">
                        
                        <?php if($products->onFirstPage()): ?>
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($products->previousPageUrl()); ?>">Previous</a></li>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = $products->getUrlRange(1, $products->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $products->currentPage()): ?>
                        <li class="page-item active"><span class="page-link"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($products->hasMorePages()): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($products->nextPageUrl()); ?>">Next</a></li>
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
<?php echo $__env->make('Merchant/partials/master',['title'=>'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/merchant/favorite/index.blade.php ENDPATH**/ ?>