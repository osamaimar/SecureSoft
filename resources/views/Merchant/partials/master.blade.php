@include('Merchant/partials/mainhead', ['title' => $title])

<link rel="stylesheet" href="{{asset('/assets')}}/libs/jsvectormap/css/jsvectormap.min.css">

<link rel="stylesheet" href="{{asset('/assets')}}/libs/swiper/swiper-bundle.min.css">

<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.bubble.css">

<!-- Filepond CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond/filepond.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

<!-- Date & Time Picker CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.css">
@yield('style')




</head>

<body>

    @include("Merchant/partials/switcher")
    @include("Merchant/partials/loader")

    <div class="page">
        @include("Merchant/partials/header")
        @include("Merchant/partials/sidebar")
        
        <!-- Start::app-content -->
        <div class="main-content app-content ">
            <div class="container-fluid ">
                @include("Merchant/partials/sounds")


                @yield('content')

            </div>
        </div>
        <!-- End::app-content -->

        @include("Merchant/partials/headersearch_modal")
        @include("Merchant/partials/footer")

    </div>

    @include("Merchant/partials/commonjs")


    <!-- JSVector Maps JS -->
    <script src="{{asset('/assets')}}/libs/jsvectormap/js/jsvectormap.min.js"></script>

    <!-- JSVector Maps MapsJS -->
    <script src="{{asset('/assets')}}/libs/jsvectormap/maps/world-merc.js"></script>

    <!-- Apex Charts JS -->
    <script src="{{asset('/assets')}}/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Chartjs Chart JS -->
    <script src="{{asset('/assets')}}/libs/chart.js/chart.min.js"></script>

    <!-- CRM-Dashboard -->
    <script src="{{asset('/assets')}}/js/crm-dashboard.js"></script>

    <!-- Custom JS -->
    <script src="{{asset('/assets')}}/js/custom.js"></script>


    <script src="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.js"></script>

    <!-- Quill Editor JS -->
    <script src="{{asset('/assets')}}/libs/quill/quill.min.js"></script>

    <!-- Filepond JS -->
    <script src="{{asset('/assets')}}/libs/filepond/filepond.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
    <script src="{{asset('/assets')}}/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js"></script>

    <!-- Internal Add Products JS -->
    <script src="{{asset('/assets')}}/js/edit-products.js"></script>

    <!-- Custom JS -->
    <script src="{{asset('/assets')}}/js/custom.js"></script>
   

    @include("Merchant/partials/custom_switcherjs")
    @yield('scripts')

</body>

</html>