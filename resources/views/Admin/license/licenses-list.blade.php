@extends('Admin/partials/master',['title'=>'Licenses List'])
@section('content')
@if (session('deleted'))
<div class="alert alert-secondary alert-dismissible fade show custom-alert-icon shadow-sm mt-2" role="alert">
    <svg class="svg-secondary" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
        <path d="M0 0h24v24H0z" fill="none" />
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
    </svg>
    {{ session('deleted') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
</div>
@endif
@include("Admin/partials/page-header",[ "title"=> "Licenses List", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Licenses List'])

<div class="d-flex flex-wrap m-1" style="justify-content: right;">

    <a href="javascript:void(0);" class="btn btn-success btn-wave waves-light me-2 my-1" data-bs-toggle="modal" data-bs-target="#addKey">
        <i class="ri-add-circle-line align-middle me-2"></i>Add License
    </a>


    <a href="javascript:void(0);" class="btn btn-primary btn-wave m-1" data-bs-toggle="modal" data-bs-target="#importModal">
        <i class="bi bi-file-earmark-plus me-2 align-middle d-inline-block"></i>Import
    </a>
    <form method="POST" action="{{route('admin.licenses.export')}}">
        @csrf
        <button type="submit" class="btn btn-outline-secondary btn-wave m-1">
            <i class="ri-upload-cloud-line me-2 align-middle d-inline-block"></i>Export
        </button>
    </form>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Licenses List
                </div>

                <div class="d-flex flex-wrap">
                    <form method="POST" action="">
                        @csrf
                        <div class="me-3 my-1">
                            <input class="form-control form-control-sm" name="search" type="text" placeholder="Search Here" aria-label=".form-control-sm example">
                        </div>
                    </form>
                    <div class="dropdown m-1">
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <form method="get" action="">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">End User Price</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Base Price</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive mb-4">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input class="form-check-input check-all" type="checkbox" id="all-products" value="" aria-label="...">
                                </th>
                                <th scope="col">ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Duration</th>
                                <th scope="col">No. of Devices</th>
                                <th scope="col">License</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($licenses as $license)
                            <tr class="product-list">
                                <td class="license-checkbox"><input class="form-check-input" type="checkbox" name="licenses[]" id="product1" value="" aria-label="..."></td>
                                <td>
                                    <span class="badge bg-light text-default">{{$license->id}}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded">
                                                <img src="{{$license->product->default_image}}" alt="">
                                            </span>
                                        </div>
                                        <div class="fw-semibold">
                                            {{$license->product->name}}
                                        </div>
                                    </div>
                                </td>
                                <td>{{$license->product->duration_value.' '.$license->product->duration_time_unit}}</td>
                                <td>{{$license->product->no_of_devices}}</td>
                                <td>{{$license->key}}</td>
                                <td>
                                    <div class="hstack gap-2 fs-15">

                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-light" data-bs-toggle="modal" data-bs-target="#editKey">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <form method="POST" action="{{route('admin.licenses.destroy',$license)}}">
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

                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if ($licenses->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $licenses->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                        @endif

                        <!-- Pagination Elements -->
                        @foreach ($licenses->links()->elements as $element)
                        <!-- "Three Dots" Separator -->
                        @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        <!-- Array Of Links -->
                        @if (is_array($element))
                        @foreach ($element as $page => $url)
                        @if ($page == $licenses->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach
                        @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($licenses->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $licenses->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <label class="form-label d-block fs-16">Import File</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addKey" tabindex="-1" aria-labelledby="addKey" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('admin.licenses.store')}}">
                @csrf
                <div class="modal-body p-4">
                    <label class="form-label fs-16">Enter the Key</label>
                    <input type="text" name="license" class="form-control" placeholder="key..">
                    @error('license')
                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label><br>
                    @enderror

                    <label class="form-label fs-16">Select Product</label>
                    <select name="product" class="form-control" data-trigger>
                        @foreach (App\Models\Product::all() as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                    @error('product')
                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                    @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-light" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editKey" tabindex="-1" aria-labelledby="editKey" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <label class="form-label fs-16">Enter the Key</label>
                    <input type="text" id="modal-license-input" name="license" class="form-control" placeholder="key..">
                    @error('license')
                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label><br>
                    @enderror

                    <label class="form-label fs-16">Select Product</label>
                    <select name="product" class="form-control" data-trigger>
                        @foreach (App\Models\Product::all() as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product')
                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                    @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-light" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('admin.licenses.import')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <label class="form-label d-block fs-16">Import File</label>
                    <input type="file" class="form-control" name="licenses">
                </div>
                @error('license')
                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label><br>
                @enderror

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection



@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editKeyModal = document.getElementById('editKey');
        editKeyModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract info from data-* attributes
            var licenseKey = button.getAttribute('data-license-key');
            // Update the modal's input field
            var input = document.getElementById('modal-license-input');
            input.value = licenseKey;
        });
    });
</script>

<!-- Internal Product-Details JS -->
<script src="{{asset('/assets')}}/js/product-list.js"></script>

<!-- Custom JS -->
<script src="{{asset('/assets')}}/js/custom.js"></script>

@endsection