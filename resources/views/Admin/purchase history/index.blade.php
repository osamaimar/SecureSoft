@extends('Admin/partials/master',['title'=>'Purchase History'])

@section('content')
@include("Admin/partials/page-header", ["title"=> "Purchase History", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Purchase History'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Products List
                </div>

                <div class="d-flex flex-wrap">
                    <div class="me-3 my-1">
                        <input class="form-control form-control-sm" type="text" placeholder="Search Here" aria-label=".form-control-sm example">
                    </div>
                    <div class="dropdown m-1">
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="javascript:void(0);">New</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Popular</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Relevant</a></li>
                        </ul>
                    </div>
                    <form method="POST" action="{{route('admin.purchases.export')}}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-wave m-1">
                            <i class="ri-upload-cloud-line me-2 align-middle d-inline-block"></i>Export all
                        </button>
                    </form>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive mb-4">
                    <table class="table text-nowrap table-bordered mb-1">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">No. Of Products</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Status</th>
                                <th scope="col">User type</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Purchase_History::paginate(10) as $purchase)
                            <tr class="product-list">
                                <td>
                                    <span class="badge bg-light text-default">{{$purchase->id}}</span>
                                </td>

                                <td> @if ($purchase->order->user instanceof App\Models\User)
                                    {{$purchase->order->user->first_name.' '.$purchase->order->user->last_name}}
                                    @else {{$purchase->order->merchant->first_name.' '.$purchase->order->merchant->last_name}}
                                    @endif
                                </td>

                                <td> @if ($purchase->order->user instanceof App\Models\User)
                                    {{$purchase->order->user->email}}
                                    @else {{$purchase->order->merchant->email}}
                                    @endif
                                </td>

                                <td>{{$purchase->order->products->count()}}</td>
                                <td>{{$purchase->order->id}}</td>
                                <td>{{$purchase->order->status}}</td>
                                <td> @if ($purchase->order->user instanceof App\Models\User)
                                    <span class="badge bg-success">User</span>

                                    @else
                                    <span class="badge bg-primary">Merchant</span>
                                    @endif
                                </td>
                                <td>{{$purchase->order->total_amount}}$</td>

                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <form method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Download</i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <?php

                    use App\Models\Purchase_History;

                    $productHistories = Purchase_History::paginate(10); ?>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <!-- Previous Page Link -->
                            @if ($productHistories->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $productHistories->previousPageUrl() }}" rel="prev">Previous</a>
                            </li>
                            @endif

                            <!-- Pagination Elements -->
                            @foreach ($productHistories->links()->elements as $element)
                            <!-- "Three Dots" Separator -->
                            @if (is_string($element))
                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                            @endif

                            <!-- Array Of Links -->
                            @if (is_array($element))
                            @foreach ($element as $page => $url)
                            @if ($page == $productHistories->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach
                            @endif
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($productHistories->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $productHistories->nextPageUrl() }}" rel="next">Next</a>
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

@endsection
