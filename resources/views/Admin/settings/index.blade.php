@extends('Admin/partials/master',['title'=>'Settings'])
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.bubble.css">

<!-- Filepond CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond/filepond.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

<!-- Date & Time Picker CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.css">


@section('content')
@include("Admin/partials/page-header", ["title"=> "Settings", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Settings'])


<div class="row">
    <div class="card col-xl-12">
        <form method="POST" action="{{route('settings.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body col-xl-4">
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Light logo</label>
                        @if (App\Models\Settings::first()->light_logo)
                        <img src="{{ asset(App\Models\Settings::first()->light_logo) }}" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @else
                        <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @endif
                        <input class="form-control form-control-sm" name="light_logo" id="formFileSm" type="file">
                        @error('light_logo')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Dark logo</label>
                        @if (App\Models\Settings::first()->dark_logo)
                            <img src="{{ asset(App\Models\Settings::first()->dark_logo) }}" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @else
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @endif
                            <input class="form-control form-control-sm" name="dark_logo" id="formFileSm" type="file">
                        @error('dark_logo')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror

                    </div>
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Light icon</label>
                        @if (App\Models\Settings::first()->light_icon)
                            <img src="{{ asset(App\Models\Settings::first()->light_icon) }}" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @else
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @endif
                        <input class="form-control form-control-sm" name="light_icon" id="formFileSm" type="file">
                        @error('light_icon')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror

                    </div>
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Dark icon</label>
                        @if (App\Models\Settings::first()->dark_icon)
                            <img src="{{ asset(App\Models\Settings::first()->dark_icon) }}" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @else
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @endif
                        <input class="form-control form-control-sm" name="dark_icon" id="formFileSm" type="file">
                        @error('dark_icon')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                <button type="submit" class="btn btn-primary-light m-1">Update</button>
            </div>
        </form>
    </div>
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