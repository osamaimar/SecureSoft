@extends('Admin/partials/master',['title'=>'Edit Collection'])

@section('content')
@include("Admin/partials/page-header", ["title"=> "Edit Collection", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Edit Collection'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <form method="POST" action="{{route('admin.collections.update',$collection)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xl-12">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-6">
                                                <label for="product-name-add" class="form-label">Collection Name</label>
                                                <input type="text" name="name" value="{{$collection->name}}" class="form-control" id="product-name-add" placeholder="Name">
                                                @error('name')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="product-name-add" class="form-label">Color</label>
                                                <input type="text" name="color" value="{{$collection->color}}" class="form-control" id="product-name-add" placeholder="Name">
                                                @error('color')
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
                </div>
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <h6>Products</h6>
                        <div class="row gx-5">
                            <div class="col-xl-12">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">


                                            <div class="table-responsive mb-4">
                                                <table class="table text-nowrap table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                <input class="form-check-input check-all" type="checkbox" id="all-products" value="" aria-label="...">
                                                            </th>
                                                            <th scope="col">ID</th>
                                                            <th scope="col" style="width: 80%;">Title</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (App\Models\Product::paginate(10) as $product)


                                                        <tr class="product-list">
                                                            <td class="product-checkbox"><input @checked($collection->products->contains('id', $product->id)) class="form-check-input" value="{{$product->id}}" type="checkbox" name="products[]"></td>
                                                            <td>
                                                                <span class="badge bg-light text-default">{{$product->id}}</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="me-2">
                                                                        <span class="avatar avatar-md avatar-rounded">
                                                                            <img src="{{$product->default_image}}">
                                                                        </span>
                                                                    </div>
                                                                    <div class="fw-semibold">
                                                                        {{$product->name}}
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                @error('products')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <!-- Pagination Links -->
                                            <?php

                                            use App\Models\Product;

                                            $products = Product::paginate(10); ?>
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
                @foreach (App\Models\Collection::all() as $collection)
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



@endsection
