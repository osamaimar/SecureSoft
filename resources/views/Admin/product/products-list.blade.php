@extends('Admin/partials/master',['title'=>'Products List'])
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
@include("Admin/partials/page-header",[ "title"=> "Products List", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Products List'])

<div class="d-flex flex-wrap m-1" style="justify-content: right;">
    <form method="get" action="{{route('admin.products.create')}}">
        @csrf
        <button class="btn btn-success btn-wave waves-light me-2 my-1" data-bs-toggle="modal" data-bs-target="#create-folder">
            <i class="ri-add-circle-line align-middle me-2"></i>Add Product
        </button>
    </form>

    <a href="javascript:void(0);" class="btn btn-primary btn-wave m-1" data-bs-toggle="modal" data-bs-target="#importModal">
        <i class="bi bi-file-earmark-plus me-2 align-middle d-inline-block"></i>Import
    </a>
    <form method="POST" action="{{route('admin.products.export')}}">
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
                    Products List
                </div>

                <div class="d-flex flex-wrap">
                    <form method="POST" action="{{route('admin.products.search')}}">
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
                                <form method="get" action="{{route('admin.products.sortEndPrice')}}">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">End User Price</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('admin.products.sortBasePrice')}}">
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
                                <th scope="col">Base Price</th>
                                <th scope="col">End User Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="product-list">
                                <td class="product-checkbox"><input class="form-check-input" type="checkbox" name="products[]" id="product1" value="" aria-label="..."></td>
                                <td>
                                    <span class="badge bg-light text-default">{{$product->id}}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded">
                                                <img src="{{$product->default_image}}" alt="">
                                            </span>
                                        </div>
                                        <div class="fw-semibold">
                                            {{$product->name}}
                                        </div>
                                    </div>
                                </td>

                                <td>{{$product->duration_value.' '.$product->duration_time_unit}}</td>
                                <td>{{$product->no_of_devices}}</td>
                                <td>{{$product->min_partner_price.'$'}}</td>
                                <td>{{$product->end_user_price.'$'}}</td>
                                <td>@if ( $product->status )
                                    <span class="badge bg-success">Published</span>
                                    @else <span class="badge bg-primary">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <form method="GET" action="{{route('admin.products.edit',$product)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></button>
                                        </form>
                                        <form method="POST" action="{{route('admin.products.destroy',$product)}}">
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
                        @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                        @endif

                        <!-- Pagination Elements -->
                        @foreach ($products->links()->elements as $element)
                        <!-- "Three Dots" Separator -->
                        @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        <!-- Array Of Links -->
                        @if (is_array($element))
                        @foreach ($element as $page => $url)
                        @if ($page == $products->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach
                        @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
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
            <form method="POST" action="{{route('admin.products.import')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <label class="form-label d-block fs-16">Import File</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
            @if(session('success'))
            <div>
                <label>{{ session('success') }}</label>
            </div>
            @endif

            @foreach ($errors->all() as $error)
            <div>
                <label>{{ $error }}</label>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection



@section('scripts')
<!-- Internal Product-Details JS -->
<script src="{{asset('/assets')}}/js/product-list.js"></script>

<!-- Custom JS -->
<script src="{{asset('/assets')}}/js/custom.js"></script>

@endsection