@extends('Admin/partials/master',['title'=>'Add Permissions'])


@section('content')
@include("Admin/partials/page-header", ["title"=> "Add Permissions", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Add Permissions'])

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
                                            <form method="POST" action="{{route('admin.permissions.addPermission',$admin)}}">
                                                @csrf
                                                <div class="mb-3 mt-4">
                                                    <h5 class=" text-dark d-block">Permissions</h5>
                                                    @error('permissions')
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                    @enderror
                                                    @foreach (App\Models\Permission_Category::all() as $category)
                                                    <h6>{{$category->name}}</h6>

                                                    @foreach ($category->permissions as $permission)
                                                    <div class="d-inline-block mb-4">
                                                        <input class="form-check-input" @checked($admin->hasPermissionTo($permission->name))
                                                        type="checkbox" value="{{$permission->name}}" name="permissions[]" id="product1" aria-label="...">
                                                        <h9 class="me-3 fw-semibold" 
                                                            @foreach ($admin->roles as $role)
                                                            @if ($role->hasPermissionTo($permission))
                                                            style='color: red;'
                                                            @endif
                                                            @endforeach
                                                            >
                                                            {{$permission->name}}
                                                        </h9>
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