@extends('Merchant/partials/master',['title'=>'Orders'])

@section('style')
<style>
    /* Step 2: CSS for Center Alignment */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
        align-items: center;
        justify-content: center;

    }
</style>

@endsection

@section('content')
@include("Merchant/partials/page-header", ["title"=> "Orders", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Orders'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Manage Orders
                </div>
                <div class="d-flex">
                    <div class="dropdown m-1">
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                            Status<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <form method="get" action="{{route('merchant.orders.unpaid')}}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Unpaid</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('merchant.orders.pending')}}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Pending</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('merchant.orders.paid')}}">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Paid</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('merchant.orders.completed')}}">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Completed</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('merchant.orders.overdue')}}">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Overdue</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">No. of Products</th>
                                <th scope="col">Status</th>
                                <th scope="col">Paid Amount</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                            <tr class="invoice-list">
                                <td>
                                    {{$orders->firstItem() + $index}}
                                </td>
                                <td>
                                    Order
                                </td>
                                <td>{{$order->id}}</td>
                                <td>
                                    {{$order->number_of_products}}
                                </td>
                                <td>
                                    @if ($order->status == 'Pending')
                                    <span class="badge bg-warning-transparent">Pending</span>
                                    @elseif ($order->status == 'Paid')
                                    <span class="badge bg-primary-transparent">Paid</span>
                                    @elseif ($order->status == 'Completed')
                                    <span class="badge bg-success-transparent">Completed</span>
                                    @elseif ($order->status == 'Overdue')
                                    <span class="badge bg-danger-transparent">Overdue</span>
                                    @elseif ($order->status == 'Unpaid')
                                    <span class="badge bg-info-transparent">Unpaid</span>
                                    @endif

                                </td>
                                <td>
                                    {{$order->total_amount}}
                                </td>
                                <td>
                                    {{$order->discount}}
                                </td>
                                <td>
                                    {{ $order->created_at->format('Y-m-d') }}
                                </td>
                                <td class='hstack gap-2 fs-15'>
                                    <form method="GET" action="{{route('merchant.orders.details', $order)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary-transparent btn-wave waves-light rounded-0" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF Invoice">Detail</button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @if ($orders->isEmpty())
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
                        @if ($orders->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $orders->previousPageUrl() }}">Previous</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                        @if ($page == $orders->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($orders->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $orders->nextPageUrl() }}">Next</a></li>
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