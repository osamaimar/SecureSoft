@extends('Admin/partials/master',['title'=>'Add Page'])

<!-- Filepond CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond/filepond.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

<!-- Date & Time Picker CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.css">

<!-- Include Quill CSS -->

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


@section('content')
@include("Admin/partials/page-header", ["title"=> "Add Page", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Add Page'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <form method="POST" action="{{route('pages.store')}}">
                @csrf
                <div class="card-body">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-placeholder" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="input-placeholder" placeholder="Enter page title..">
                        @error('title')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="formFile" class="form-label">Page image</label>
                        <input class="form-control" name="image_path" type="file" id="formFile">
                        @error('image_path')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <p class="fw-semibold mb-2">Status</p>
                        <select name="status" class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="col-xl-12 mt-3">
                        <label class="form-label">Content:</label>
                        <div id="quillArea"></div>
                        <textarea name="content" style="display:none" id="hiddenArea"></textarea>
                        @error('content')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button type="submit" class="btn btn-primary-light m-1">Create</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('scripts')

<script src="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.js"></script>

<!-- Quill Editor JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    var quill = new Quill('#quillArea', {
        theme: 'snow'
    });

    // Handle form submission
    document.querySelector('form').onsubmit = function() {
        // Populate hidden form input with the editor content
        document.querySelector('#hiddenArea').value = quill.root.innerHTML;
    };

    $("#identifier").on("submit", function() {
        $("#hiddenArea").val($("#quillArea").html());
    })
</script>
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