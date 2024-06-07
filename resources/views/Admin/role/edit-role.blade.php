@extends('Admin/partials/master',['title'=>'Edit Role'])


@section('content')
@include("Admin/partials/page-header", ["title"=> "Edit Role", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Edit Role'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body p-0">
                <div class="card-body p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xl-12 ">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <form method="POST" action="{{route('admin.roles.update',$role)}}">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="form-text" class="form-label fs-14 text-dark">Role name</label>
                                                    <input type="text" name="name" class="form-control" value="{{$role->name}}" id="form-text" placeholder="Enter role name">
                                                    @error('name')
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 mt-4">
                                                    <h5 class=" text-dark d-block">Permissions</h5>
                                                    @error('permissions')
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                    @enderror
                                                    @foreach (App\Models\Permission_Category::all() as $category)
                                                    <h6>{{$category->name}}</h6>

                                                    @foreach ($category->permissions as $permission)

                                                    <div class="d-inline-block mb-4">
                                                        <input @checked($role->hasPermissionTo($permission)) class="form-check-input" type="checkbox" value="{{$permission->name}}" name="permissions[]" id="product1" aria-label="...">
                                                        <h9 class="me-3 fw-semibold">{{$permission->name}}</h9>
                                                    </div>
                                                    @endforeach
                                                    @endforeach
                                                </div>

                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection