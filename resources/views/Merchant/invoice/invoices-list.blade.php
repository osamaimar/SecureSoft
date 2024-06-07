@extends('Merchant/partials/master',['title'=>'Invoices'])


@section('content')
@include("Merchant/partials/page-header", ["title"=> "Invoices", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Invoices'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Manage Invoices
                </div>
                <div class="d-flex">
                    <div class="dropdown m-1">
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                            Status<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <form method="get" action="{{route('merchant.invoices.unpaid')}}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Unpaid</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('merchant.invoices.pending')}}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Pending</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('merchant.invoices.paid')}}">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Paid</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('merchant.invoices.completed')}}">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Completed</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="{{route('merchant.invoices.overdue')}}">
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
                                <th scope="col">Name</th>
                                <th scope="col">Business</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Date</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                            <tr class="invoice-list">
                                <td>
                                    {{$orders->firstItem() + $index }}
                                </td>
                                <td>
                                    <p class="text-muted">
                                        {{$order->merchant->first_name}} {{$order->merchant->last_name}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-muted">
                                        {{$order->merchant->company_name}}
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-semibold text-primary">
                                        {{$order->invoice->invoice_number}}
                                    </p>
                                </td>
                                <td>
                                    {{ $order->created_at->format('Y-m-d') }}
                                </td>
                                <td>
                                    {{$order->discount}}
                                </td>
                                <td>
                                    ${{$order->total_amount}}
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
                                <td class='hstack gap-2 fs-15'>
                                    <form method="GET" action="{{route('merchant.invoices.pdf',$order->invoice)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success btn-wave waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF Invoice">Download</button>
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