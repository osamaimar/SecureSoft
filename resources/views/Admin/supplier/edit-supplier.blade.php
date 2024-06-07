@extends('Admin/partials/master',['title'=>'Suppliers'])


@section('content')
@include("Admin/partials/page-header", ["title"=> "Suppliers", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Suppliers'])

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <form method="POST" action="{{route('admin.suppliers.update',$supplier)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xl-12 ">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-6">
                                                <label for="product-name-add" class="form-label">Supplier Name</label>
                                                <input type="text" name="name" value="{{$supplier->name}}" class="form-control" id="product-name-add" placeholder="Name">
                                                @error('name')
                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button type="submit" class="btn btn-primary-light m-1">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection