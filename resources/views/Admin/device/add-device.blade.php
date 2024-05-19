@extends('Admin/partials/master',['title'=>'Devices'])
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.bubble.css">

<!-- Filepond CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond/filepond.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

<!-- Date & Time Picker CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.css">


@section('content')
@include("Admin/partials/page-header", ["title"=> "Devices", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Devices'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <form method="POST" action="{{route('devices.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xl-12 ">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-6">
                                                <label for="product-name-add" class="form-label">Device Name</label>
                                                <input type="text" name="name" class="form-control" id="product-name-add" placeholder="Name">
                                                @error('name')
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
                        <button type="submit" class="btn btn-primary-light m-1">Create<i class="bi bi-plus-lg ms-2"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<h6>All Devices</h6>

        <div class="card-body">
            <div class="table-responsive mb-4">
                <table class="table text-nowrap table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input class="form-check-input check-all" type="checkbox" id="all-products" value="" aria-label="...">
                            </th>
                            <th scope="col">ID</th>
                            <th scope="col" style="width: 80%;">Name</th>
                            <th scope="col">Products</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Models\Device::paginate(10) as $device)
                        <tr class="product-list">
                            <td class="product-checkbox"><input class="form-check-input" type="checkbox" name="devices[]" id="product1" value="" aria-label="..."></td>
                            <td>
                                <span class="badge bg-light text-default">{{$device->id}}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="fw-semibold">
                                        {{$device->name}}
                                    </div>
                                </div>
                            </td>

                            <td>{{$device->products->count()}}</td>
                            <td>
                                <div class="hstack gap-2 fs-15">
                                    <form method="GET" action="{{route('devices.edit',$device)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></button>
                                    </form>
                                    <form method="POST" action="{{route('devices.destroy',$device)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-sm btn-danger-light "><i class="ri-delete-bin-line"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <?php $devices = App\Models\Device::paginate(10); ?>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav aria-label="Pagination">
                    <ul class="pagination mb-0">
                        <li class="page-item {{ $devices->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $devices->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">Previous</span>
                            </a>
                        </li>

                        @foreach ($devices as $page => $device)
                        <li class="page-item {{ $page === $devices->currentPage() ? 'active' : '' }}" aria-current="page">
                            <a class="page-link" href="{{ $devices->url($page) }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        <li class="page-item {{ $devices->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $devices->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <button class="btn btn-danger btn-wave m-1">Delete All</button>
            </div>



@endsection
@section('scripts')

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

@endsection