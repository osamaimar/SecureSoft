@extends('Admin/partials/master',['title'=>'Add Roles'])


@section('content')
@include("Admin/partials/page-header", ["title"=> "Add Roles", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Add Roles'])

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
                                            <form method="POST" action="{{route('admin.roles.addRole',$admin)}}">
                                                @csrf
                                                <div class="mb-3 mt-4">
                                                    <h5 class=" text-dark d-block mb-3">Add Roles</h5>
                                                    @error('roles')
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                    @enderror
                                                    
                                                    @foreach (App\Models\Role::all() as $role)
                                                    <div class="d-inline-block mb-4">
                                                        <input class="form-check-input" @checked($admin->hasRole($role->name)) type="checkbox" value="{{$role->name}}" name="roles[]" id="product1" aria-label="...">
                                                        <h9 class="me-3 fw-semibold">{{$role->name}}</h9>
                                                    </div>
                                                    @endforeach
                                                </div>

                                                <button class="btn btn-primary" type="submit">Add</button>
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