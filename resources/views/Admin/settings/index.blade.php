@extends('Admin/partials/master',['title'=>'Settings'])

@section('content')
@include("Admin/partials/page-header", ["title"=> "Settings", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Settings'])


<div class="row">
    <div class="card col-xl-12">
        <form method="POST" action="{{route('admin.settings.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body col-xl-4">
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Light logo</label>
                        @if (App\Models\Settings::first()->light_logo)
                        <img src="{{ asset(App\Models\Settings::first()->light_logo) }}" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @else
                        <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @endif
                        <input class="form-control form-control-sm" name="light_logo" id="formFileSm" type="file">
                        @error('light_logo')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Dark logo</label>
                        @if (App\Models\Settings::first()->dark_logo)
                            <img src="{{ asset(App\Models\Settings::first()->dark_logo) }}" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @else
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @endif
                            <input class="form-control form-control-sm" name="dark_logo" id="formFileSm" type="file">
                        @error('dark_logo')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror

                    </div>
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Light icon</label>
                        @if (App\Models\Settings::first()->light_icon)
                            <img src="{{ asset(App\Models\Settings::first()->light_icon) }}" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @else
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @endif
                        <input class="form-control form-control-sm" name="light_icon" id="formFileSm" type="file">
                        @error('light_icon')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror

                    </div>
                </div>
                <div class=" custom-card ">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Dark icon</label>
                        @if (App\Models\Settings::first()->dark_icon)
                            <img src="{{ asset(App\Models\Settings::first()->dark_icon) }}" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @else
                            <img src="../assets/images/media/media-51.jpg" class=" rounded img-thumbnail float-start" style="width: 15vh;" alt="...">
                        @endif
                        <input class="form-control form-control-sm" name="dark_icon" id="formFileSm" type="file">
                        @error('dark_icon')
                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                <button type="submit" class="btn btn-primary-light m-1">Update</button>
            </div>
        </form>
    </div>
</div>





@endsection
