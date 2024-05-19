<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{asset('/assets')}}/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
            <img src="{{asset('/assets')}}/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
            <img src="{{asset('/assets')}}/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
            <img src="{{asset('/assets')}}/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
            <img src="{{asset('/assets')}}/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
            <img src="{{asset('/assets')}}/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
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
                    <a href="{{route('admin.dashboard')}}" class="side-menu__item">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard<span class="badge bg-warning-transparent ms-2">12</span></span>
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
                            <a href="{{route('products.index')}}" class="side-menu__item">Products list</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('collections.index')}}" class="side-menu__item">Collections</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('suppliers.index')}}" class="side-menu__item">Suppliers</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('regions.index')}}" class="side-menu__item">Regions</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('devices.index')}}" class="side-menu__item">Devices</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('purchases.index')}}" class="side-menu__item">Purchase History</a>
                        </li>
                        <li class="slide">
                            <a href="dropdowns.html" class="side-menu__item">Dropdowns</a>
                        </li>
                        <li class="slide">
                            <a href="images_figures.html" class="side-menu__item">Images &amp; Figures</a>
                        </li>
                        <li class="slide">
                            <a href="links_interactions.html" class="side-menu__item">Links &amp; Interactions</a>
                        </li>
                        <li class="slide">
                            <a href="listgroup.html" class="side-menu__item">List Group</a>
                        </li>
                        <li class="slide">
                            <a href="navs_tabs.html" class="side-menu__item">Navs &amp; Tabs</a>
                        </li>
                        <li class="slide">
                            <a href="object-fit.html" class="side-menu__item">Object Fit</a>
                        </li>
                        <li class="slide">
                            <a href="pagination.html" class="side-menu__item">Pagination</a>
                        </li>
                        <li class="slide">
                            <a href="popovers.html" class="side-menu__item">Popovers</a>
                        </li>
                        <li class="slide">
                            <a href="progress.html" class="side-menu__item">Progress</a>
                        </li>
                        <li class="slide">
                            <a href="spinners.html" class="side-menu__item">Spinners</a>
                        </li>
                        <li class="slide">
                            <a href="toasts.html" class="side-menu__item">Toasts</a>
                        </li>
                        <li class="slide">
                            <a href="tooltips.html" class="side-menu__item">Tooltips</a>
                        </li>
                        <li class="slide">
                            <a href="typography.html" class="side-menu__item">Typography</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-medal side-menu__icon"></i>
                        <span class="side-menu__label">Utilities</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Utilities</a>
                        </li>
                        <li class="slide">
                            <a href="avatars.html" class="side-menu__item">Avatars</a>
                        </li>
                        <li class="slide">
                            <a href="borders.html" class="side-menu__item">Borders</a>
                        </li>
                        <li class="slide">
                            <a href="breakpoints.html" class="side-menu__item">Breakpoints</a>
                        </li>
                        <li class="slide">
                            <a href="colors.html" class="side-menu__item">Colors</a>
                        </li>
                        <li class="slide">
                            <a href="columns.html" class="side-menu__item">Columns</a>
                        </li>
                        <li class="slide">
                            <a href="flex.html" class="side-menu__item">Flex</a>
                        </li>
                        <li class="slide">
                            <a href="gutters.html" class="side-menu__item">Gutters</a>
                        </li>
                        <li class="slide">
                            <a href="helpers.html" class="side-menu__item">Helpers</a>
                        </li>
                        <li class="slide">
                            <a href="position.html" class="side-menu__item">Position</a>
                        </li>
                        <li class="slide">
                            <a href="more.html" class="side-menu__item">Additional Content</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-file side-menu__icon"></i>
                        <span class="side-menu__label">Forms</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Forms</a>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Form Elements
                                <i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="form_inputs.html" class="side-menu__item">Inputs</a>
                                </li>
                                <li class="slide">
                                    <a href="form_check_radios.html" class="side-menu__item">Checks &amp; Radios</a>
                                </li>
                                <li class="slide">
                                    <a href="form_input_group.html" class="side-menu__item">Input Group</a>
                                </li>
                                <li class="slide">
                                    <a href="form_select.html" class="side-menu__item">Form Select</a>
                                </li>
                                <li class="slide">
                                    <a href="form_range.html" class="side-menu__item">Range Slider</a>
                                </li>
                                <li class="slide">
                                    <a href="form_input_masks.html" class="side-menu__item">Input Masks</a>
                                </li>
                                <li class="slide">
                                    <a href="form_file_uploads.html" class="side-menu__item">File Uploads</a>
                                </li>
                                <li class="slide">
                                    <a href="form_dateTime_pickers.html" class="side-menu__item">Date,Time Picker</a>
                                </li>
                                <li class="slide">
                                    <a href="form_color_pickers.html" class="side-menu__item">Color Pickers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a href="floating_labels.html" class="side-menu__item">Floating Labels</a>
                        </li>
                        <li class="slide">
                            <a href="form_layout.html" class="side-menu__item">Form Layouts</a>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Form Editors
                                <i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="quill_editor.html" class="side-menu__item">Quill Editor</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a href="form_validation.html" class="side-menu__item">Validation</a>
                        </li>
                        <li class="slide">
                            <a href="form_select2.html" class="side-menu__item">Select2</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-party side-menu__icon"></i>
                        <span class="side-menu__label">Advanced Ui</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Advanced Ui</a>
                        </li>
                        <li class="slide">
                            <a href="accordions_collpase.html" class="side-menu__item">Accordions &amp; Collapse</a>
                        </li>
                        <li class="slide">
                            <a href="carousel.html" class="side-menu__item">Carousel</a>
                        </li>
                        <li class="slide">
                            <a href="draggable-cards.html" class="side-menu__item">Draggable Cards</a>
                        </li>
                        <li class="slide">
                            <a href="modals_closes.html" class="side-menu__item">Modals &amp; Closes</a>
                        </li>
                        <li class="slide">
                            <a href="navbar.html" class="side-menu__item">Navbar</a>
                        </li>
                        <li class="slide">
                            <a href="offcanvas.html" class="side-menu__item">Offcanvas</a>
                        </li>
                        <li class="slide">
                            <a href="placeholders.html" class="side-menu__item">Placeholders</a>
                        </li>
                        <li class="slide">
                            <a href="ratings.html" class="side-menu__item">Ratings</a>
                        </li>
                        <li class="slide">
                            <a href="scrollspy.html" class="side-menu__item">Scrollspy</a>
                        </li>
                        <li class="slide">
                            <a href="swiperjs.html" class="side-menu__item">Swiper JS</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="widgets.html" class="side-menu__item">
                        <i class="bx bx-gift side-menu__icon"></i>
                        <span class="side-menu__label">Widgets<span class="badge bg-danger-transparent ms-2">Hot</span></span>
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
<!-- End::app-sidebar -->