@extends('Admin/partials/master',['title'=>'Create Collection'])
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.bubble.css">

<!-- Filepond CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond/filepond.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

<!-- Date & Time Picker CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.css">


@section('content')
@include("Admin/partials/page-header", ["title"=> "Create Collection", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Create Collection'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <form method="POST" action="{{route('collections.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xl-12 ">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-6">
                                                <label for="product-name-add" class="form-label">Collection Name</label>
                                                <input type="text" name="name" class="form-control" id="product-name-add" placeholder="Name">
                                                @error('name')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 product-documents-container">
                                                <p class="fw-semibold mb-2 fs-14">Image</p>
                                                <input type="file" class="form-control" name="image_path" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="6">
                                                @error('image_path')
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

<h6>All Collections</h6>

<div class="card-body">
    <div class="table-responsive mb-4">
        <table class="table text-nowrap table-bordered">
            <thead>
                <tr>
                    <th scope="col">
                        <input class="form-check-input check-all" type="checkbox" id="all-products" value="" aria-label="...">
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col" style="width: 80%;">Title</th>
                    <th scope="col">Products</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Collection::paginate(10) as $collection)
                <tr class="product-list">
                    <td class="product-checkbox"><input class="form-check-input" type="checkbox" name="collections[]" id="product1" value="" aria-label="..."></td>
                    <td>
                        <span class="badge bg-light text-default">{{$collection->id}}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded">
                                    <img src="{{$collection->image_path}}" alt="">
                                </span>
                            </div>
                            <div class="fw-semibold">
                                {{$collection->name}}
                            </div>
                        </div>
                    </td>

                    <td>{{$collection->products->count()}}</td>
                    <td>
                        <div class="hstack gap-2 fs-15">
                            <form method="GET" action="{{route('collections.edit',$collection)}}">
                                @csrf
                                <button type="submit" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></button>
                            </form>
                            <form method="POST" action="{{route('collections.destroy',$collection)}}">
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
    <!-- Pagination Links -->
    <?php

    use App\Models\Collection;

    $collections = Collection::paginate(10); ?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <!-- Previous Page Link -->
            @if ($collections->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $collections->previousPageUrl() }}" rel="prev">Previous</a>
            </li>
            @endif

            <!-- Pagination Elements -->
            @foreach ($collections->links()->elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $collections->currentPage())
            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach
            @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($collections->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $collections->nextPageUrl() }}" rel="next">Next</a>
            </li>
            @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
            @endif
        </ul>
    </nav>



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