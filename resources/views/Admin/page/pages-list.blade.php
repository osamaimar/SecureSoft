@extends('Admin/partials/master',['title'=>'Pages'])
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.snow.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/quill/quill.bubble.css">

<!-- Filepond CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond/filepond.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="{{asset('/assets')}}/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

<!-- Date & Time Picker CSS -->
<link rel="stylesheet" href="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.css">


@section('content')
@include("Admin/partials/page-header", ["title"=> "Pages", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Pages'])


<div class="row">
    <div class="col-xxl-12 col-xl-8">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    All Pages
                </div>
                <div class="d-flex">
                    <form methode="get" action="{{route('pages.create')}}">
                    @csrf
                        <button type="submit" class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal" data-bs-target="#create-task"><i class="ri-add-line fw-semibold align-middle me-1"></i> New Page</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input class="form-check-input check-all" type="checkbox" id="all-tasks" value="" aria-label="...">
                                </th>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Page::all() as $page)
                                <tr class="task-list">
                                    <td class="task-checkbox"><input class="form-check-input" type="checkbox" value="" aria-label="..."></td>
                                    <td>
                                        <span class="fw-semibold">{{$page->id}}</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">{{$page->title}}</span>
                                    </td>
                                    <td> {{Carbon\Carbon::parse($page->created_at)->diffForHumans()}} </td>
                                    
                                    <td>
                                       @if ( $page->is_active )
                                       <span class="badge bg-success">Active</span>
                                       @else
                                       <span class="badge bg-danger">Inactive</span>
                                       @endif
                                    </td>
                                
                                    <td class="hstack gap-2 fs-15">

                                        <form method="GET" action="{{route('pages.edit',$page)}}">
                                        @csrf
                                            <button type="submit" class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                        </form>
                                        <form method="POST" action="{{route('pages.destroy',$page)}}">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i class="ri-delete-bin-5-line"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
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