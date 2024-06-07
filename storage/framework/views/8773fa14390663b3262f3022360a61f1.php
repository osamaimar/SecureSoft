<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
            <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
            <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
            <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
            <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
            <img src="<?php echo e(asset('/assets')); ?>/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Main</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="side-menu__item">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Dashboards</a>
                        </li>
                        
                    </ul>
                </li>
                <!-- End::slide -->



                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">General</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-box side-menu__icon"></i>
                        <span class="side-menu__label">Products</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Products</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.products.index')); ?>" class="side-menu__item">Products list</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.collections.index')); ?>" class="side-menu__item">Collections</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.suppliers.index')); ?>" class="side-menu__item">Suppliers</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.regions.index')); ?>" class="side-menu__item">Regions</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.devices.index')); ?>" class="side-menu__item">Devices</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.purchases.index')); ?>" class="side-menu__item">Purchase History</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.licenses.index')); ?>" class="side-menu__item">Licenses</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-medal side-menu__icon"></i>
                        <span class="side-menu__label">Orders</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Orders</a>
                        </li>
                        <li class="slide">
                            <a href="avatars.html" class="side-menu__item">Orders</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.invoices.index')); ?>" class="side-menu__item">Invoices</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->



                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-medal side-menu__icon"></i>
                        <span class="side-menu__label">Users & Admins</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Users & Admins</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.users.index')); ?>" class="side-menu__item">Users</a>
                        </li>
                        <li class="slide">
                            <a href="<?php echo e(route('admin.merchants.index')); ?>" class="side-menu__item">Merchants</a>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Admins
                                <i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="<?php echo e(route('admin.admins.index')); ?>" class="side-menu__item">Admins</a>
                                </li>
                                <li class="slide">
                                    <a href="<?php echo e(route('admin.roles.index')); ?>" class="side-menu__item">Roles & Permissions</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->


                 <!-- Start::slide -->
                 <li class="slide">
                    <a href="<?php echo e(route('admin.pages.index')); ?>" class="side-menu__item">
                        <i class="la la-edit side-menu__icon"></i>
                        <span class="side-menu__label">Pages</span>
                    </a>
                </li>
                <!-- End::slide -->


                <!-- Start::slide -->
                <li class="slide">
                    <a href="<?php echo e(route('admin.settings.index')); ?>" class="side-menu__item">
                        <i class="bx bx-cog side-menu__icon"></i>
                        <span class="side-menu__label">Settings</span>
                    </a>
                </li>
                <!-- End::slide -->


                

                
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar --><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Admin/partials/sidebar.blade.php ENDPATH**/ ?>