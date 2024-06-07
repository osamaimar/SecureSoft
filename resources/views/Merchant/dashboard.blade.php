@extends('Merchant/partials/master',['title'=>'Dashboard'])
@section('content')
@include('Merchant/partials/page-header',['title'=> 'Welcome back '.Auth::guard('merchant')->user()->first_name , 'subtitle'=>'Track your sales activity, leads and deals here.','subtitle2'=>'Filters'])
<!-- Start::row-1 -->
<div class="row">
    <div class="col-xxl-12 col-xl-12">
        <div class="row">
            <div class="col-xl-6 d-flex align-items-stretch">
                <div class="card custom-card rounded-0 w-100">
                    <div class="d-flex align-items-center mb-4 ms-3">
                        <div class="bg-primary mt-0 col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-inline-block ">
                            <div class="bg-danger d-inline-block">
                                <img src="../assets/images/faces/23.png" style="width: 100%;" alt="">
                            </div>
                        </div>
                        <div class="mt-3 ms-2 col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 d-inline-block">
                            <div class="d-flex justify-content-between align-items-center ">
                                <h5>{{ Auth::guard('merchant')->user()->first_name }} {{ Auth::guard('merchant')->user()->last_name }} <i class="bi bi-check-circle-fill text-success m-0"></i></h5>
                                <a href="{{route('merchant.profile.edit')}}" class="btn btn-sm btn-success-light rounded-0">Profile Overview</a>
                            </div>
                            <div>
                                <p>
                                    <span>
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    {{ Auth::guard('merchant')->user()->email }}
                                </p>
                            </div>
                            <div>
                                <p>
                                    <span>
                                        <i class="ri-road-map-line"></i>
                                    </span>
                                    {{ Auth::guard('merchant')->user()->address }}
                                </p>
                            </div>
                            <div>
                                <p class="d-inline-block me-4">
                                    <span>
                                        <i class="bi bi-telephone-plus"></i>
                                    </span>
                                    {{ Auth::guard('merchant')->user()->first_phone_number }}
                                </p>
                                <p class="d-inline-block">
                                    <span>
                                        <i class="bi bi-calendar-plus"></i>
                                    </span>
                                    Registration date: {{ Auth::guard('merchant')->user()->created_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 d-flex align-items-stretch">
                <div class="card custom-card rounded-0 w-100">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Top Categories
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-xl-0 gy-3">
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div>
                                    <a href="{{route('merchant.products.merchantProducts')}}" class="category-link primary text-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="category-svg " style="height: 35; width: 35;" viewBox="0 0 16 16">
                                            <path d="M8.01 4.555 4.005 7.11 8.01 9.665 4.005 12.22 0 9.651l4.005-2.555L0 4.555 4.005 2zm-4.026 8.487 4.006-2.555 4.005 2.555-4.005 2.555zm4.026-3.39 4.005-2.556L8.01 4.555 11.995 2 16 4.555 11.995 7.11 16 9.665l-4.005 2.555z" />
                                        </svg>
                                        <p class="fs-14 mb-1 text-default fw-semibold">Products</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div>
                                    <a href="{{route('merchant.favorite.index')}}" class="category-link secondary text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="category-svg" style="height: 35; width: 35;" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <p class="fs-14 mb-1 text-default fw-semibold">Favorite</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div>
                                    <a href="{{route('merchant.order.index')}}" class="category-link warning text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="category-svg" style="height: 35; width: 35; transform: scaleX(-1);" viewBox="0 0 24 24">
                                            <path d="M4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V15H18.4433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z"></path>
                                        </svg>
                                        <p class="fs-14 mb-1 text-default fw-semibold">Orders</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div>
                                    <a href="{{route('merchant.invoice.index')}}" class="category-link success">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="category-svg" style="height: 35; width: 35;">
                                            <path d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z"></path>
                                            <path d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"></path>
                                        </svg>
                                        <p class="fs-14 mb-1 text-default fw-semibold">Invoices</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header mt-2">
                <h6>Latest Product</h6>
            </div>
            <div class="row p-3">
                @foreach (App\Models\Product::inRandomOrder()->limit(4)->get() as $product)
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <!-- This is an item -->
                    <div class="card custom-card product-card ">
                        <div class="card-body  m-0 p-3">
                            <a href="{{route('merchant.products.productDetails', $product)}}" class="product-image">
                                <img src="{{asset($product->default_image)}}" class="card-img mb-3 " alt="...">
                            </a>
                            <a href="{{route('merchant.products.productDetails', $product)}}" class="product-name fw-semibold mb-0 d-flex align-items-center justify-content-between">{{$product->name}}</a>
                            <p class="product-description fs-11 text-muted mb-2">Region:
                                @foreach ($product->regions as $region)
                                {{$region->name}}
                                @endforeach

                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card">
            <div class="card-header mt-2">
                <h6>Recent Product</h6>
            </div>
            <div class="row p-3">
                @foreach (App\Models\Product::inRandomOrder()->limit(4)->get() as $product)
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <!-- This is an item -->
                    <div class="card custom-card product-card ">
                        <div class="card-body  m-0 p-3">
                            <a href="{{route('merchant.products.productDetails', $product)}}" class="product-image">
                                <img src="{{asset($product->default_image)}}" class="card-img mb-3 " alt="...">
                            </a>
                            <a href="{{route('merchant.products.productDetails', $product)}}" class="product-name fw-semibold mb-0 d-flex align-items-center justify-content-between">{{$product->name}}</a>
                            <p class="product-description fs-11 text-muted mb-2">Region:
                                @foreach ($product->regions as $region)
                                {{$region->name}}
                                @endforeach

                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End::row-1 -->

@endsection

