@include("Admin/partials/mainhead")

<link rel="stylesheet" href="{{asset('/assets')}}/libs/jsvectormap/css/jsvectormap.min.css">

<link rel="stylesheet" href="{{asset('/assets')}}/libs/swiper/swiper-bundle.min.css">

</head>

<body>

    @include("Admin/partials/switcher")
    @include("Admin/partials/loader")

    <div class="page">
        @include("Admin/partials/header")
        @include("Admin/partials/sidebar")

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">


                @yield('content')

            </div>
        </div>
        <!-- End::app-content -->
        
        @include("Admin/partials/headersearch_modal")
        @include("Admin/partials/footer")

    </div>

    @include("Admin/partials/commonjs")
  

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

    @include("Admin/partials/custom_switcherjs")
    
</body>

</html>