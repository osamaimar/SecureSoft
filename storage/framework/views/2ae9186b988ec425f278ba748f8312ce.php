<?php echo $__env->make('Merchant/partials/mainhead', ['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="<?php echo e(asset('/assets')); ?>/libs/jsvectormap/css/jsvectormap.min.css">

<link rel="stylesheet" href="<?php echo e(asset('/assets')); ?>/libs/swiper/swiper-bundle.min.css">

<link rel="stylesheet" href="<?php echo e(asset('/assets')); ?>/libs/quill/quill.snow.css">
<link rel="stylesheet" href="<?php echo e(asset('/assets')); ?>/libs/quill/quill.bubble.css">

<!-- Filepond CSS -->
<link rel="stylesheet" href="<?php echo e(asset('/assets')); ?>/libs/filepond/filepond.min.css">
<link rel="stylesheet" href="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

<!-- Date & Time Picker CSS -->
<link rel="stylesheet" href="<?php echo e(asset('/assets')); ?>/libs/flatpickr/flatpickr.min.css">
<?php echo $__env->yieldContent('style'); ?>




</head>

<body>

    <?php echo $__env->make("Merchant/partials/switcher", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("Merchant/partials/loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page">
        <?php echo $__env->make("Merchant/partials/header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make("Merchant/partials/sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- Start::app-content -->
        <div class="main-content app-content ">
            <div class="container-fluid ">
                <?php echo $__env->make("Merchant/partials/sounds", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <?php echo $__env->yieldContent('content'); ?>

            </div>
        </div>
        <!-- End::app-content -->

        <?php echo $__env->make("Merchant/partials/headersearch_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make("Merchant/partials/footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <?php echo $__env->make("Merchant/partials/commonjs", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- JSVector Maps JS -->
    <script src="<?php echo e(asset('/assets')); ?>/libs/jsvectormap/js/jsvectormap.min.js"></script>

    <!-- JSVector Maps MapsJS -->
    <script src="<?php echo e(asset('/assets')); ?>/libs/jsvectormap/maps/world-merc.js"></script>

    <!-- Apex Charts JS -->
    <script src="<?php echo e(asset('/assets')); ?>/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Chartjs Chart JS -->
    <script src="<?php echo e(asset('/assets')); ?>/libs/chart.js/chart.min.js"></script>

    <!-- CRM-Dashboard -->
    <script src="<?php echo e(asset('/assets')); ?>/js/crm-dashboard.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo e(asset('/assets')); ?>/js/custom.js"></script>


    <script src="<?php echo e(asset('/assets')); ?>/libs/flatpickr/flatpickr.min.js"></script>

    <!-- Quill Editor JS -->
    <script src="<?php echo e(asset('/assets')); ?>/libs/quill/quill.min.js"></script>

    <!-- Filepond JS -->
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond/filepond.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
    <script src="<?php echo e(asset('/assets')); ?>/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js"></script>

    <!-- Internal Add Products JS -->
    <script src="<?php echo e(asset('/assets')); ?>/js/edit-products.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo e(asset('/assets')); ?>/js/custom.js"></script>
   

    <?php echo $__env->make("Merchant/partials/custom_switcherjs", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Merchant/partials/master.blade.php ENDPATH**/ ?>