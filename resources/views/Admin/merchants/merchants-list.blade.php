@extends('Admin/partials/master',['title'=>'Merchants List'])


@section('content')



<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card mt-4">
            <div class="card-body">
                <div class="contact-header">
                    <div class="d-sm-flex d-block align-items-center justify-content-between">
                        <div class="h5 fw-semibold mb-0">Merchants List</div>
                        <div class="d-flex mt-sm-0 mt-2 align-items-center">
                            <form method="POST" action="{{route('admin.merchants.search')}}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" id="search-input" name="search" class="form-control bg-light border-0" placeholder="Search Contact" aria-describedby="search-contact-member">
                                    <button type="submit" class="btn btn-light" type="button" id="search-contact-member"><i class="ri-search-line text-muted"></i></button>
                                </div>
                            </form>
                            <div class="dropdown ms-2">
                                <button class="btn btn-icon btn-primary-light btn-wave" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">Delete All</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Copy All</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Move To</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-icon btn-secondary-light ms-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add Contact"><i class="ri-add-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($merchants as $merchant)
    <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="card custom-card">
            <div class="card-body contact-action">
                <div class="contact-overlay"></div>
                <div class="d-flex align-items-top">
                    <div class="d-flex flex-fill flex-wrap gap-3">
                        <div class="avatar avatar-xl avatar-rounded">
                            <img src="{{$merchant->image_path}}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">
                                {{$merchant->first_name}} {{$merchant->last_name}}
                            </h6>
                            <p class="mb-1 text-muted  text-truncate">{{$merchant->email}}</p>
                            <p class="fw-semibold fs-11 mb-0 text-primary">
                                {{$merchant->first_phone_number}}
                            </p>
                            <p class="fw-semibold fs-11 mb-0 text-primary">
                                {{$merchant->second_phone_number}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-2 contact-hover-buttons">
                    <form method="GET" class="contact-hover-btn" action="{{route('admin.merchants.edit',$merchant)}}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-light contact-hover-btn">
                            Edit Merchant
                        </button>
                    </form>
                    <div class="dropdown contact-hover-dropdown">
                        <button class="btn btn-sm btn-icon btn-light btn-wave" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu">
                            @if ($merchant->is_active)
                            <form method="POST" action="{{route('admin.merchants.block',$merchant)}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm text-danger dropdown-item"><i class="bx bx-error-circle me-2 align-middle d-inline-block"></i>Block</button>
                            </form>
                            @else
                            <form method="POST" action="{{route('admin.merchants.activate',$merchant)}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm dropdown-item">Activate</button>
                            </form>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <ul class="pagination justify-content-end">
        <!-- Previous Page Link -->
        @if ($merchants->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $merchants->previousPageUrl() }}" rel="prev">Previous</a>
        </li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($merchants->links()->elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $merchants->currentPage())
        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($merchants->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $merchants->nextPageUrl() }}" rel="next">Next</a>
        </li>
        @else
        <li class="page-item disabled">
            <span class="page-link">Next</span>
        </li>
        @endif
    </ul>
    </nav>

</div>

@endsection