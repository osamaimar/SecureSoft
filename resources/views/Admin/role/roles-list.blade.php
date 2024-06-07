@extends('Admin/partials/master',['title'=>'Roles'])


@section('content')
@include("Admin/partials/page-header", ["title"=> "Roles", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Roles'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Manage Roles
                </div>
                <div class="d-flex">
                    <form method="GET" action="{{route('admin.roles.create')}}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary btn-wave waves-light"><i class="ri-add-line fw-semibold align-middle me-1"></i> Create Role</button>
                    </form>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Guard Name</th>
                                <th scope="col">Users</th>
                                <th scope="col">Permissions</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Role::paginate(10) as $role)

                            <tr class="invoice-list">
                                <td>
                                    <span class="badge bg-success">{{$role->id}}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 fw-semibold">{{$role->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success">{{$role->guard_name}}</span>
                                </td>
                                <td>
                                    <p class="fw-semibold text-primary">
                                        {{$role->users()->count();}}
                                    </p>
                                </td>
                                <td>
                                    {{$role->permissions()->count();}}
                                </td>

                                <td class='hstack gap-2 fs-15'>
                                    <form method="GET" action="{{route('admin.roles.edit',$role)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary-light btn-icon btn-sm"><i class="ri-edit-line"></i></button>
                                    </form>
                                    <form method="POST" action="{{route('admin.roles.destroy',$role)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger-light btn-icon btn-sm"><i class="ri-delete-bin-5-line"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <!-- Custom Pagination -->
                <?php

                use App\Models\Role;

                $roles = Role::paginate(10) ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0 float-end">
                        {{-- Previous Page Link --}}
                        @if ($roles->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $roles->previousPageUrl() }}">Previous</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($roles->getUrlRange(1, $roles->lastPage()) as $page => $url)
                        @if ($page == $roles->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($roles->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $roles->nextPageUrl() }}">Next</a></li>
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