@extends('Admin/partials/master',['title'=>'Collections List'])
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
@include("Admin/partials/page-header",[ "title"=> "Collections List", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Collections List'])

<div class="row">

    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header" style="display: flex; justify-content: space-between;">
                <div class="card-title">
                    Collections List
                </div>


                <div class="card-header">
                    <form method="get" action="{{route('admin.collections.create')}}">
                        @csrf
                        <button class="btn btn-success btn-wave waves-light" data-bs-toggle="modal" data-bs-target="#create-folder">
                            <i class="ri-add-circle-line align-middle me-2"></i>Add Collection
                        </button>
                    </form>


                    <a href="javascript:void(0);" class="btn btn-primary btn-wave m-1" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bi bi-file-earmark-plus me-2 align-middle d-inline-block"></i>Import
                    </a>
                    <form method="POST" action="{{route('admin.collections.export')}}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-wave m-1">
                            <i class="ri-upload-cloud-line me-2 align-middle d-inline-block"></i>Export
                        </button>
                    </form>
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
                                <th scope="col" style="width: 80%;">Title</th>
                                <th scope="col">Color</th>
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

                                <td>{{$collection->color}}</td>
                                <td>{{$collection->products->count()}}</td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <form method="GET" action="{{route('admin.collections.edit',$collection)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></button>
                                        </form>
                                        <form method="POST" action="{{route('admin.collections.destroy',$collection)}}">
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
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('admin.collections.import')}}" enctype="multipart/form-data">
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


@endsection