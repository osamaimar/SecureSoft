@extends('Merchant/partials/master',['title'=>'Dashboard'])
@section('content')
@include("Merchant/partials/page-header", ["title"=> "Favorite", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Favorite'])

<div class="row">
    <div class="col-xxl-12">
        <div class="card custom-card" id="cart-container-delete">
            <div class="card-header">
                <div class="card-title">
                    Favorite Items
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>
                                    Product Name
                                </th>
                                <th>
                                    Partner Price
                                </th>
                                <th>
                                    End User Price
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <span class="avatar avatar-xxl bg-light">
                                                <img src="{{asset($product->default_image)}}" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            <div class="mb-1 fs-14 fw-semibold">
                                                <a href="javascript:void(0);">{{$product->name}} (ID:{{$product->id}})</a>
                                            </div>
                                            <div class="mb-1">
                                                <span class="me-1">Region:</span>
                                                @foreach ($product->regions as $region)
                                                <span class="fw-semibold text-muted">{{$region->name}}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-quantity-container">
                                    <div class="fw-semibold fs-14">
                                        ${{$product->min_partner_price}}
                                    </div>
                                </td>
                                <td class="product-quantity-container">
                                    <div class="fw-semibold fs-14">
                                        ${{$product->end_user_price}}
                                    </div>
                                </td>

                                <td class="product-quantity-container text-center">
                                    <form method="POST" class="d-inline-block p-0 m-0" action="{{route('merchant.favorite.delete',$product)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove From favorite">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @if ($products->isEmpty())
                    <div class="text-center mt-5" style="height: 30vh; align-items: center;">
                        <h1>Empty!</h1>
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <!-- Custom Pagination -->

                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0 float-end">
                        {{-- Previous Page Link --}}
                        @if ($products->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($products->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a></li>
                        @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </nav>

            </div>
        </div>

    </div>

</div>

@endsection