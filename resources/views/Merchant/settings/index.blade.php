@extends('Merchant/partials/master',['title'=>'Settings'])

<!-- Include Quill CSS -->

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


@section('content')
@include("Merchant/partials/page-header", ["title"=> "Settings", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Settings'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <form method="POST" action="{{route('merchant.setting.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="mb-2 mt-2 col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Company name</label>
                                    <input type="text" name="company_name" class="form-control" id="input-placeholder" placeholder="Enter your company name.." value="{{Auth::guard('merchant')->user()->company_name}}">
                                    @error('company_name')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="mb-2 mt-2 col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="input-placeholder" placeholder="Enter company address.." value="{{Auth::guard('merchant')->user()->address}}">
                                    @error('address')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3 col-xl-6 col-lg-12 col-md-6 col-sm-12">
                                    <label for="formFile" class="form-label">Profile picture</label>
                                    <span class="avatar avatar-xxl m-1 avatar-rounded d-block">
                                        <img src="{{asset(Auth::guard()->user()->image_path)}}" alt="img">
                                    </span>

                                    <input class="form-control" name="image_path" type="file" id="formFile">
                                    @error('image_path')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="mb-2 mt-2 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <label for="input-placeholder" class="form-label">First phone number</label>
                                    <input type="number" name="first_phone_number" class="form-control" id="input-placeholder" placeholder="Enter a phone number.." value="{{Auth::guard('merchant')->user()->first_phone_number}}">
                                    @error('first_phone_number')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="mb-2 mt-2 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <label for="input-placeholder" class="form-label">Second phone number</label>
                                    <input type="number" name="second_phone_number" class="form-control" id="input-placeholder" placeholder="Enter another phone number.." value="{{Auth::guard('merchant')->user()->second_phone_number}}">
                                    @error('second_phone_number')
                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                    @enderror
                                </div>

                            </div>

                            <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                <button type="submit" class="btn btn-primary-light m-1">Update</button>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>


@endsection