@extends('Merchant/partials/master',['title'=>'Dashboard'])
@section('content')
<!-- Start::row-1 -->
<div class="row">
    <div class="col-xl-12 ">
        <div class="card custom-card">
            <div class="card-body p-0">
                <nav class="navbar navbar-expand-xxl bg-white rounded-0">
                    <div class="container-fluid ">
                        <a class="navbar-brand" href="javascript:void(0);">

                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse navbar-justified flex-wrap gap-2 " id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-xxl-center">


                                @foreach (App\Models\Top_Category::all() as $category)
                                <li class="nav-item mb-xxl-0 mb-2 ms-xxl-0 ms-3  ">
                                    <div class="btn-group d-xxl-flex d-block  ">
                                        <button class="btn btn-sm dropdown-toggle rounded-0 {{$category->color}}" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{$category->name }}
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
                                @endforeach


                            </ul>
                            <div>
                                <div class="d-flex">
                                    <form method="get" action="{{route('merchant.products.merchantSearch')}}">
                                        @csrf
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

    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-12">
        <div class="card custom-card product-card rounded-0">
            <div class="card-body d-flex">
                <a href="product-details.html" class="product-image me-2" style="width:30%;">
                    <img src="{{asset($product->default_image)}}" class="img-fluid bg-transparent" alt="...">
                </a>
                <div>
                    <a href="">
                        <h6 class="product-name fw-semibold mb-0 mt-1 d-flex align-items-center ">{{$product->name}} (ID:{{$product->id}})</h6>
                    </a>
                    <div class="border border-dark d-inline-block mt-5 ms-3 p-2 pb-0">
                        <h6 class="d-inline-block align-items-center justify-content-between">Partner Price : {{$product->min_partner_price}}$</h6>
                    </div><br>
                    <div class="d-inline-block  mt-3 ms-3 p-1" style="background-color: #025E2F;">
                        <p class="  p-0 m-0 text-light fw-semibold">End User Price(MSRP) : {{$product->end_user_price}}.00 $</p>
                    </div>
                </div>
            </div>
            <div class=" ms-3 me-3 mb-3 p-2 border-top border-bottom border-gray bg-light">

                <p class="d-inline-block m-0 fw-semibold me-5">Region:</p>
                @foreach ($product->regions as $region)
                <p class="d-inline-block m-0 me-2">{{$region->name}}</p>

                @endforeach
            </div>


            <div class="containe ">
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" style="width:100%;" role="tablist">
                    <li class="nav-item ms-0 me-0" style="width: 50%;">
                        <a class="nav-link active rounded-0 border-bottom text-center text-primary " style="font-weight: normal;" data-toggle="tab" href="#home">Pricing</a>
                    </li>
                    <li class="nav-item ms-0 me-0" style="width: 50%;">
                        <a class="nav-link rounded-0 border-bottom  text-center text-primary" style="font-weight: normal;" data-toggle="tab" href="#menu1">Warranty</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active rounded-0"><br>
                        <h4>Quantity-based pricing</h4>
                        <ul>
                            <li>Adjust the prices of items based on quantity.</li>
                            <li>This section is only used to show prices based on quantity.</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-inline-block me-1">
                                <label for="input-number" class="form-label">Quantity</label>
                                <input type="number" name="test_quantity" class="form-control rounded-0" value="1" id="quantity-input" placeholder="Number" min="1">
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-inline-block me-1">
                                <label for="input-number" class="form-label">Unit Price</label>
                                <input type="number" name="test_unit_price" class="form-control rounded-0" id="unit-price-input" placeholder="Number" min="1" value="{{$product->min_partner_price}}.00" disabled>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-inline-block">
                                <label for="input-number" class="form-label">Total Price</label>
                                <input type="number" name="test_total_price" class="form-control rounded-0" id="total-price-input" placeholder="Number" disabled>
                            </div>
                        </div>

                    </div>
                    <div id="menu1" class="container tab-pane fade rounded-0"><br>
                        <ul>
                            <li>You can keep licenses on stock, {{$product->warranty}}.</li>
                            <li>Warranty of originality And functionality, {{$product->warranty}} Gold.</li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
        <div class="card custom-card product-card rounded-0">
            <div class="card-body ">
                <div class="d-block">
                    <h6><a class="nav-link rounded-0 border-bottom  text-left text-primary">Order</a></h6>
                </div>
                @if ($product->stock > 0)
                <form method="POST" action="{{route('merchant.cart.add',$product)}}">
                    @csrf
                    <div class="d-block mt-4">

                        <div class="form-check d-block">
                            <input type="checkbox" name="terms_checkbox" value="true" class="form-check-input" id="terms-checkbox" required>
                            <label class="form-check-label fw-normal" for="terms-checkbox" style="font-size: 14px;">I Agree with <a href="" class="text-primary">terms and conditions</a></la>
                        </div>
                        @error('terms-checkbox')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror

                        <div class="form-check d-block mt-3">
                            <input type="checkbox" name="region-checkbox" value="true" class="form-check-input" id="region-checkbox" required>
                            <label class="form-check-label fw-normal" for="region-checkbox" style="font-size: 14px;">I Agree with <a href="" class="text-primary">region</a></la>
                        </div>
                        @error('region-checkbox')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror

                        <hr>
                        <h6>Purchase & Instant Delivery</h6>
                        <div class="d-flex justify-content-between mt-4">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-inline-block me-1">
                                <label for="input-number" class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control rounded-0" value="1" id="quantity-input2" placeholder="Number" min="1" max="{{$product->stock}}">
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-inline-block me-1">
                                <label for="input-number" class="form-label">Unit Price</label>
                                <input type="number" name="unit_price" class="form-control rounded-0" id="unit-price-input2" placeholder="Number" min="1" value="{{$product->min_partner_price}}.00" disabled>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-inline-block">
                                <label for="input-number" class="form-label">Total Price</label>
                                <input type="number" name="total_price" class="form-control rounded-0" id="total-price-input2" placeholder="Number" disabled>
                            </div>
                        </div>
                        
                        @error('quantity')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0 d-block">{{ $message }}</label>
                        @enderror
                        <label class="form-label mt-1 fs-12 op-5 mb-0 d-block">In Stock: {{$product->stock}}</label>


                        <button type="submit" class="btn btn-primary-light rounded-0 mt-3 border border-primary d-block" {{ $product->stock <= 0 ? 'disabled' : '' }}>Add to Cart</button>
                        

                        <hr>
                        <ul>
                            <li>You will receive keys immediately if use an approved payment.</li>
                        </ul>
                    </div>
                </form>
                @endif
                @if($product->stock <= 0) <h5 class="text-danger  mt-1">Out of Stock</h5>
                    @endif

            </div>

        </div>
    </div>

    @endsection

    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity-input');
            const unitPriceInput = document.getElementById('unit-price-input');
            const totalPriceInput = document.getElementById('total-price-input');

            function updateTotalPrice() {
                const quantity = parseFloat(quantityInput.value);
                const unitPrice = parseFloat(unitPriceInput.value);
                const totalPrice = quantity * unitPrice;
                totalPriceInput.value = totalPrice.toFixed(2);
            }

            // Update total price on initial load
            updateTotalPrice();

            // Add event listener to update total price when quantity changes
            quantityInput.addEventListener('input', updateTotalPrice);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity-input2');
            const unitPriceInput = document.getElementById('unit-price-input2');
            const totalPriceInput = document.getElementById('total-price-input2');

            function updateTotalPrice() {
                const quantity = parseFloat(quantityInput.value);
                const unitPrice = parseFloat(unitPriceInput.value);
                const totalPrice = quantity * unitPrice;
                totalPriceInput.value = totalPrice.toFixed(2);
            }

            // Update total price on initial load
            updateTotalPrice();

            // Add event listener to update total price when quantity changes
            quantityInput.addEventListener('input', updateTotalPrice);
        });
    </script>


    @endsection