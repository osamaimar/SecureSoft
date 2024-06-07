<!-- app-header -->
<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid ">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="index.html" class="header-logo">
                        <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                        <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                        <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                        <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                        <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
                        <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right mb-0">

            <!-- Start::header-element -->
            <div class="header-element cart-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown">
                    <span class="badge bg-primary rounded-pill header-icon-badge" id="cart-icon-badge">
                        <?php echo e(Auth::guard()->user()->cart->number_of_products); ?>

                    </span>
                    <i class="bx bx-cart header-link-icon" style="transform: scaleX(-1);"></i>

                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">Cart Items</p>
                            <span class="badge fs-12 bg-success-transparent" id="cart-data">Total: <?php echo e(Auth::guard()->user()->cart->total_amount); ?>$</span>
                        </div>
                    </div>
                    <div>
                        <hr class="dropdown-divider">
                    </div>
                    <ul class="list-unstyled mb-0" id="header-cart-items-scroll">
                        <?php $__currentLoopData = Auth::guard()->user()->cart->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="<?php echo e(asset('/assets')); ?>/images/ecommerce/jpg/1.jpg" alt="img" class="avatar avatar-sm avatar-rounded br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13 text-dark fw-semibold">
                                            <a href="cart.html"><?php echo e($product->name); ?></a>
                                        </div>
                                        <div>
                                            <span class="text-black mb-1">$<?php echo e($product->min_partner_price); ?></span>
                                            <form method="POST" class="d-inline-block p-0 m-0" action="<?php echo e(route('merchant.cart.delete',$product)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="border-0 header-cart-remove float-end dropdown-item-close bg-white "><i class="ti ti-trash ms-0"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                        <ul class="header-product-item d-flex">
                                            <li>Qtn: <input type="number" class="form-control d-inline-block form-control-sm" style="width: 40%;" id="product-quantity-<?php echo e($product->id); ?>" value="<?php echo e($product->pivot->quantity); ?>" data-product-id="<?php echo e($product->id); ?>" disabled>
                                                <label class="form-label mt-1 fs-11 op-5 mb-0 ">In Stock: <?php echo e($product->stock); ?></label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Auth::guard()->user()->cart->products->isEmpty()): ?>
                        <li class="dropdown-item">
                            <div class="text-center mt-5" style="height: 10vh; align-items: center;">
                                <h6 class="text-muted">Empty!</h6>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if($errors->any()): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li for="product-name-add" class="dropdown-item mt-1 fs-12 op-5 text-danger mb-0 d-block">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <?php echo e($error); ?>

                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>

                    <?php if(Auth::guard()->user()->cart->products()->count()>0): ?>
                    <div class="p-3 empty-header-item border-top">
                        <div>
                            <form method="GET" action="<?php echo e(route('merchant.checkout.form',Auth::guard()->user()->cart)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Proceed to checkout</button>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="p-5 empty-item d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-warning-transparent">
                                <i class="ri-shopping-cart-2-line fs-2"></i>
                            </span>
                            <h6 class="fw-bold mb-1 mt-3">Your Cart is Empty</h6>
                            <span class="mb-3 fw-normal fs-13 d-block">Add some items to make me happy :)</span>
                            <a href="products.html" class="btn btn-primary btn-wave btn-sm m-1" data-abc="true">continue shopping <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element country-selector">
                <!-- Start::header-link -->
                <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#countryModal">
                    <img src="<?php echo e(asset('/assets')); ?>/images/flags/us_flag.jpg" alt="img" class="rounded-circle header-link-icon">
                    <span class="fw-semibold mb-0 lh-1">EN</span>
                </a>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img src="../assets/images/faces/23.png" alt="img" width="32" height="32" class="rounded-circle">
                        </div>
                        <div class="d-sm-block d-none">
                            <p class="fw-semibold mb-0 lh-1"><?php echo e(Auth::guard('merchant')->user()->first_name); ?> <?php echo e(Auth::guard('merchant')->user()->last_name); ?></p>
                            <span class="op-7 fw-normal d-block fs-11">Merchant</span>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                    <li><a href="<?php echo e(route('merchant.profile.edit')); ?>" class="dropdown-item d-flex" href="profile.html"><i class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
                    <form method="POST" action="<?php echo e(route('merchant.logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item d-flex border-block-end" href="javascript:void(0);"><i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out</button>
                    </form>
                </ul>
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>
<!-- /app-header --><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Merchant/partials/header.blade.php ENDPATH**/ ?>