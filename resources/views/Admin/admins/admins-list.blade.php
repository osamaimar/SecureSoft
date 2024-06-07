@extends('Admin/partials/master',['title'=>'Admins List'])


@section('content')



<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card mt-4">
            <div class="card-body">
                <div class="contact-header">
                    <div class="d-sm-flex d-block align-items-center justify-content-between">
                        <div class="h5 fw-semibold mb-0">Selelct Roles</div>
                        <div class="d-flex mt-sm-0 mt-2 align-items-center">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0" placeholder="Search Contact" aria-describedby="search-contact-member">
                                <button class="btn btn-light" type="button" id="search-contact-member"><i class="ri-search-line text-muted"></i></button>
                            </div>
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
    @foreach ($admins as $admin)
    <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="card custom-card">
            <div class="card-body contact-action">
                <div class="contact-overlay"></div>
                <div class="d-flex align-items-top">
                    <div class="d-flex flex-fill flex-wrap gap-3">
                        <div class="avatar avatar-xl avatar-rounded">
                            <img src="{{asset('/assets')}}/images/faces/22.png" alt="">
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold">
                                {{$admin->first_name}} {{$admin->last_name}}
                            </h6>
                            <p class="mb-1 text-muted  text-truncate">{{$admin->email}}</p>
                            <p class="fw-semibold fs-11 mb-0 text-primary">
                                {{$admin->phone_number}}
                            </p>

                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-2 contact-hover-buttons">
                    <form method="GET" class="contact-hover-btn" action="{{route('admin.admins.edit',$admin)}}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-light contact-hover-btn">
                            Edit Admin
                        </button>
                    </form>
                    <div class="dropdown contact-hover-dropdown">
                        <button class="btn btn-sm btn-icon btn-light btn-wave" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu">
                            @if ($admin->is_active)
                            <form method="POST" action="{{route('admin.admins.block',$admin)}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm text-danger dropdown-item"><i class="bx bx-error-circle me-2 align-middle d-inline-block"></i>Block</button>
                            </form>
                            @else
                            <form method="POST" action="{{route('admin.admins.activate',$admin)}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm dropdown-item">Activate</button>
                            </form>
                            @endif
                            
                            <form method="get" action="{{route('admin.roles.editRole',$admin)}}">
                                @csrf
                                <button type="submit" class="btn btn-sm dropdown-item" ><i class="ri-group-line me-2 align-middle d-inline-block"></i>Edit Role</button>
                            </form>
                            
                            <form method="get" action="{{route('admin.permisisons.editPermission',$admin)}}">
                                @csrf
                                <button type="submit" class="btn btn-sm dropdown-item" ><i class="ri-group-line me-2 align-middle d-inline-block"></i>Edit Permission</button>
                            </form>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <ul class="pagination justify-content-end">
        <!-- Previous Page Link -->
        @if ($admins->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $admins->previousPageUrl() }}" rel="prev">Previous</a>
        </li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($admins->links()->elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $admins->currentPage())
        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($admins->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $admins->nextPageUrl() }}" rel="next">Next</a>
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