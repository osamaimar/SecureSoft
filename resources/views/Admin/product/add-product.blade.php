@extends('Admin/partials/master',['title'=>'Add Product'])


@section('content')
@include("Admin/partials/page-header", ["title"=> "Add Product", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Add Product'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <label for="product-name-add" class="form-label">Product Name</label>
                                                <input type="text" name="name" class="form-control" id="product-name-add" placeholder="Name">
                                                @error('name')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="product-category-add" class="form-label">Supplier</label>
                                                <select class="form-control" name="supplier" data-trigger id="product-category-add" placeholder="Select a supplier">
                                                    @foreach (App\Models\Supplier::all() as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('supplier')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>

                                            <div class="col-xl-6">
                                                <label for="product-gender-add" class="form-label">Collection</label>
                                                <select class="form-control" data-trigger name="collection" id="product-gender-add" placeholder="Select a collection"> 
                                                    @foreach (App\Models\Collection::all() as $collection)
                                                    <option value="{{$collection->id}}">{{$collection->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('collection')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>


                                            <div class="col-xl-6 color-selection">
                                                <label for="product-color-add" class="form-label">Regions</label>
                                                <select class="form-control" name="regions[]" id="product-color-add" placeholder="Select all regions" multiple>
                                                    @foreach (App\Models\Region::all() as $region)
                                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('regions')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>

                                            <div class="col-xl-6">
                                                <label for="product-tags" class="form-label">Devices</label>
                                                <select class="js-example-placeholder-multiple js-states" name="devices[]" id="product-tags" multiple="multiple">
                                                    @foreach (App\Models\Device::all() as $device)
                                                    <option value="{{$device->id}}">{{$device->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('devices')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>

                                            <div class="col-xl-12">
                                                <label for="product-description-add" class="form-label">Product Description</label>
                                                <textarea class="form-control" name="description" id="product-description-add" rows="2"></textarea>
                                                @error('description')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-4">
                                            <div class="col-xl-4">
                                                <label for="product-actual-price" class="form-label">Base Price</label>
                                                <input type="number" class="form-control" name="min_partner_price" id="product-actual-price" placeholder="Base Price">
                                                @error('min_partner_price')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="product-dealer-price" class="form-label">End User Price</label>
                                                <input type="number" class="form-control" name="end_user_price" id="product-dealer-price" placeholder="End User Price">
                                                @error('end_user_price')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="product-discount" class="form-label">No. of Devices</label>
                                                <input type="number" class="form-control" name="no_of_devices" id="product-discount" placeholder="No. of Devices">
                                                @error('no_of_devices')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="product-type" class="form-label">Duration</label>
                                                <div style="display: flex;">
                                                    <input type="number" class="form-control " name="duration_value" id="product-type" placeholder="value">
                                                    <select class="form-control" name="duration_time_unit" id="product-gender-add">
                                                        <option value="Years">Years</option>
                                                        <option value="Months">Months</option>
                                                        <option value="Lifetime">Lifetime</option>
                                                    </select>
                                                </div>
                                                @error('duration_value')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                                @error('duration_time_unit')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="product-discount" class="form-label">Warranty</label>
                                                <input type="string" name="warranty" class="form-control" id="product-discount1" placeholder="warranty">
                                                @error('warranty')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="product-cost-add" class="form-label">Enter Cost</label>
                                                <input type="number" name="cost" class="form-control" id="product-cost-add" placeholder="Cost">
                                                @error('cost')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="product-status-add" class="form-label">Status</label>
                                                <select class="form-control" data-trigger name="status" id="product-status-add">
                                                    <option value="">Select</option>
                                                    <option value="1">Published</option>
                                                    <option value="0">Draft</option>
                                                </select>
                                                @error('status')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>

                                            <div class="col-xl-12 product-documents-container">
                                                <p class="fw-semibold mb-2 fs-14">Product Images :</p>
                                                <input type="file" class="form-control" name="images" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="6">
                                                @error('images')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-12 product-documents-container">
                                                <p class="fw-semibold mb-2 fs-14">Default Image :</p>
                                                <input type="file" class="form-control" name="default_image" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="6">
                                                @error('default_image')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button type="submit" class="btn btn-primary-light m-1">Add Product<i class="bi bi-plus-lg ms-2"></i></button>
                        <button class="btn btn-success-light m-1">Save Product<i class="bi bi-download ms-2"></i></button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>


@endsection
