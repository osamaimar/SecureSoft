<?php $__env->startSection('content'); ?>


<div class="my-4">
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body p-0">
                    <nav class="navbar navbar-expand-xxl bg-white rounded-0">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="javascript:void(0);">

                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse navbar-justified flex-wrap gap-2" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-xxl-center">


                                    <?php $__currentLoopData = App\Models\Top_Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item mb-xxl-0 mb-2 ms-xxl-0 ms-3">
                                        <div class="btn-group d-xxl-flex d-block">
                                            <button class="btn btn-sm dropdown-toggle rounded-0 <?php echo e($category->color); ?>" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo e($category->name); ?>

                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Featured</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Price: High to Low</a></li>
                                                <li><a class="dropdown-item active" href="javascript:void(0);">Price: Low to High</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Newest</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Ratings</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </ul>
                                <div>
                                    <div class="d-flex">
                                        <form method="get" action="<?php echo e(route('merchant.products.merchantSearch')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="d-flex" role="search">
                                                <input class="form-control me-2 rounded-0" name="search" type="search" placeholder="Search" aria-label="Search">
                                                <!-- <button class="btn btn-light"
                                                            type="submit">Search</button> -->
                                            </div>
                                        </form>

                                        <div class="d-flex">
                                            <div class="collapse navbar-collapse navbar-justified flex-wrap gap-2" id="navbarSupportedContent">
                                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-xxl-center">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Export
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end rounded-0" aria-labelledby="navbarDropdown">
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Export as PDF</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Something else
                                                                    here</a></li>
                                                        </ul>
                                                    </li>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-8 col-lg-8 col-md-12">
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card custom-card product-card rounded-0">
                        <div class="card-body d-flex">
                            <a href="<?php echo e(route('merchant.products.productDetails', $product)); ?>" class="product-image me-2" style="width:30%;">
                                <img src="<?php echo e(asset($product->default_image)); ?>" class="img-fluid bg-transparent" alt="...">
                            </a>
                            <div>
                                <a href="<?php echo e(route('merchant.products.productDetails', $product)); ?>">
                                    <h6 class="product-name fw-semibold mb-0 mt-1 d-flex align-items-center "><?php echo e($product->name); ?> (ID:<?php echo e($product->id); ?>)</h6>
                                </a>
                                <?php if($product->stock <= 0): ?> <label class="text-danger  mt-1 d-block">Out of Stock</label>
                                    <?php else: ?><label class="form-label mt-1 fs-12 op-5 mb-0 d-block">In Stock: <?php echo e($product->stock); ?></label>
                                    <?php endif; ?>

                                    <div class="border border-dark d-inline-block mt-4 ms-3 p-2 pb-0">
                                        <h6 class="d-flex align-items-center justify-content-between">Partner Price : <?php echo e($product->min_partner_price); ?>$</h6>
                                    </div><br>
                                    <div class=" d-inline-block mt-3 ms-3 p-1" style="background-color: #025E2F;">
                                        <p class="d-flex  p-0 m-0 text-light fw-semibold">End User Price(MSRP) : <?php echo e($product->end_user_price); ?>.00 $</p>
                                    </div><br>
                            </div>
                        </div>
                        <div class=" ms-3 me-3 mb-3 p-2 border-top border-bottom border-gray bg-light">

                            <p class="d-inline-block m-0 fw-semibold me-5">Region:</p>
                            <?php $__currentLoopData = $product->regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="d-inline-block m-0 me-2"><?php echo e($region->name); ?></p>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="d-flex justify-content-between ms-3 me-3 mb-3 p-2 border-top border-3 ">
                            <form method="POST" action="<?php echo e(route('merchant.favorite.add', $product)); ?>" id="favoriteForm">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <button class="favorite-button" type="submit" id="favoriteButton" style="background: none; border: none; cursor: pointer; font-size: 20px; color: #f1c40f;">
                                        <i class="bi bi-star" id="favoriteIcon"></i>
                                        <h5 class="d-inline-block">Favorite</h5>
                                    </button>
                                </div>
                            </form>
                            <div>
                                <a href="<?php echo e(route('merchant.products.productDetails', $product)); ?>" class="btn text-light rounded-0" style="background-color: #5E0230;"><i class="ri-shopping-cart-line me-1" style="transform: scaleX(-1);"></i>Order</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
<!--End::row-1 -->

<nav aria-label="Page navigation" class="d-flex justify-content-end">
    <ul class="pagination">
        <!-- Previous Page Link -->
        <?php if($products->onFirstPage()): ?>
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>
        <?php else: ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo e($products->previousPageUrl()); ?>" rel="prev">Previous</a>
        </li>
        <?php endif; ?>

        <!-- Pagination Elements -->
        <?php $__currentLoopData = $products->links()->elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- "Three Dots" Separator -->
        <?php if(is_string($element)): ?>
        <li class="page-item disabled"><span class="page-link"><?php echo e($element); ?></span></li>
        <?php endif; ?>

        <!-- Array Of Links -->
        <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $products->currentPage()): ?>
        <li class="page-item active" aria-current="page"><span class="page-link"><?php echo e($page); ?></span></li>
        <?php else: ?>
        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Next Page Link -->
        <?php if($products->hasMorePages()): ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo e($products->nextPageUrl()); ?>" rel="next">Next</a>
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
<?php echo $__env->make('Merchant/partials/master',['title'=>'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Merchant/product/products-list.blade.php ENDPATH**/ ?>