@extends('Admin/partials/master',['title'=>'Roles'])


@section('content')
@include("Admin/partials/page-header", ["title"=> "Roles", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Roles'])

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
                                            <form method="POST" action="{{route('admin.roles.store')}}">
                                                @csrf

                                                <div class="mb-3">
                                                    <label for="form-text" class="form-label fs-14 text-dark">Role name</label>
                                                    <input type="text" name="name" class="form-control" id="form-text" placeholder="Enter role name">
                                                    @error('name')
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 mt-4">
                                                    <h5 class=" text-dark d-block">Permissions</h5>
                                                    @error('permissions')
                                                    <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                    @enderror
                                                    <div class="mb-4">
                                                        <input type="checkbox" id="checkAll" class="form-check-input">
                                                        <label for="checkAll" class="fw-semibold">Check All</label>
                                                    </div>

                                                    @foreach (App\Models\Permission_Category::all() as $category)
                                                    <h6>{{$category->name}}</h6>

                                                    @foreach ($category->permissions as $permission)
                                                    <div class="d-inline-block mb-4">
                                                        <input class="form-check-input permission-checkbox" type="checkbox" value="{{ $permission->name }}" name="permissions[]" id="permission{{ $loop->index }}" aria-label="...">
                                                        <label for="permission{{ $loop->index }}" class="fw-semibold">{{ $permission->name }}</label>
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
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkAllBox = document.getElementById('checkAll');
        const checkboxes = document.querySelectorAll('.permission-checkbox');

        checkAllBox.addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = checkAllBox.checked;
            });
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (!this.checked) {
                    checkAllBox.checked = false;
                } else {
                    const allChecked = Array.from(checkboxes).every(chk => chk.checked);
                    checkAllBox.checked = allChecked;
                }
            });
        });
    });
</script>

@endsection