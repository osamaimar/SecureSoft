@extends('Admin/partials/master',['title'=>'Edit Admin'])


@section('content')
@include("Admin/partials/page-header", ["title"=> "Edit Admin", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Edit Admin'])

<div class="row">
    <div class="col-xxl-4 col-xl-12">
        <div class="card custom-card overflow-hidden">
            <div class="card-body p-0">
                <div class="d-sm-flex align-items-top p-4 border-bottom-0 main-profile-cover">
                    <div>
                        <span class="avatar avatar-xxl avatar-rounded online me-3">
                            <img src="{{asset('/assets')}}/images/faces/22.png" alt="">
                        </span>
                    </div>
                    <div class="flex-fill main-profile-info">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold mb-1 text-fixed-white">{{$admin->first_name.' '.$admin->last_name}}</h6>
                        </div>
                        <p class="mb-1 text-muted text-fixed-white op-7">Admin</p>
                    </div>
                </div>
                <div class="p-4 border-bottom border-block-end-dashed">
                    <p class="fs-15 mb-2 me-4 fw-semibold">Contact Information :</p>
                    <div class="text-muted">
                        <p class="mb-2">
                            <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                <i class="ri-mail-line align-middle fs-14"></i>
                            </span>
                            {{$admin->email}}
                        </p>
                        <p class="mb-2">
                            <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                <i class="ri-phone-line align-middle fs-14"></i>
                            </span>
                            {{$admin->phone_number}}
                        </p>

                        <p class="mb-0">
                            <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                <i class="ri-map-pin-line align-middle fs-14"></i>
                            </span>
                            MIG-1-11, Monroe Street, Georgetown, Washington D.C, USA,20071
                        </p>
                    </div>
                </div>
                <div class="p-4">
                    <p class="fs-15 mb-2 me-4 fw-semibold">Followers :</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="d-sm-flex align-items-top">
                                <span class="avatar avatar-sm">
                                    <img src="../assets/images/faces/1.jpg" alt="img">
                                </span>
                                <div class="ms-sm-2 ms-0 mt-sm-0 mt-1 fw-semibold flex-fill">
                                    <p class="mb-0 lh-1">Alicia Sierra</p>
                                    <span class="fs-11 text-muted op-7">aliciasierra389@gmail.com</span>
                                </div>
                                <button class="btn btn-light btn-wave btn-sm">Follow</button>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-sm-flex align-items-top">
                                <span class="avatar avatar-sm">
                                    <img src="../assets/images/faces/3.jpg" alt="img">
                                </span>
                                <div class="ms-sm-2 ms-0 mt-sm-0 mt-1 fw-semibold flex-fill">
                                    <p class="mb-0 lh-1">Samantha Mery</p>
                                    <span class="fs-11 text-muted op-7">samanthamery@gmail.com</span>
                                </div>
                                <button class="btn btn-light btn-wave btn-sm">Follow</button>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-sm-flex align-items-top">
                                <span class="avatar avatar-sm">
                                    <img src="../assets/images/faces/6.jpg" alt="img">
                                </span>
                                <div class="ms-sm-2 ms-0 mt-sm-0 mt-1 fw-semibold flex-fill">
                                    <p class="mb-0 lh-1">Juliana Pena</p>
                                    <span class="fs-11 text-muted op-7">juliapena555@gmail.com</span>
                                </div>
                                <button class="btn btn-light btn-wave btn-sm">Follow</button>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-sm-flex align-items-top">
                                <span class="avatar avatar-sm">
                                    <img src="../assets/images/faces/15.jpg" alt="img">
                                </span>
                                <div class="ms-sm-2 ms-0 mt-sm-0 mt-1 fw-semibold flex-fill">
                                    <p class="mb-0 lh-1">Adam Smith</p>
                                    <span class="fs-11 text-muted op-7">adamsmith99@gmail.com</span>
                                </div>
                                <button class="btn btn-light btn-wave btn-sm">Follow</button>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-sm-flex align-items-top">
                                <span class="avatar avatar-sm">
                                    <img src="../assets/images/faces/13.jpg" alt="img">
                                </span>
                                <div class="ms-sm-2 ms-0 mt-sm-0 mt-1 fw-semibold flex-fill">
                                    <p class="mb-0 lh-1">Farhaan Amhed</p>
                                    <span class="fs-11 text-muted op-7">farhaanahmed989@gmail.com</span>
                                </div>
                                <button class="btn btn-light btn-wave btn-sm">Follow</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-8 col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card mb-3">
                    <div class="card-body p-0 ">
                        <div class="p-3 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                            <h3 class="fs-18 fw-semibold mb-0">Personal Information</h3>
                        </div>
                        <div class="p-3">
                            <div class="tab-content" id="myTabContent">
                                <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('patch')

                                    <div class="mb-3">
                                        <label for="form-text" class="form-label fs-14 text-dark">First Name</label>
                                        <input type="text" name="first_name" value="{{$admin->first_name}}" class="form-control" id="form-text" placeholder="">
                                        @error('first_name')
                                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="form-text" class="form-label fs-14 text-dark">Last Name</label>
                                        <input type="text" name="last_name" value="{{$admin->last_name}}" class="form-control" id="form-text" placeholder="">
                                        @error('last_name')
                                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="form-text" class="form-label fs-14 text-dark">Email</label>
                                        <input type="text" name="email" value="{{$admin->email}}" class="form-control" id="form-text" placeholder="">
                                        @error('email')
                                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                        @enderror


                                        @if ($admin instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $admin->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mt-2 text-gray-800">
                                                {{ __('Your email address is unverified.') }}

                                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                            @endif
                                        </div>
                                        @endif
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                                        @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>

                </div>
                <div class="card custom-card mb-3">
                    <div class="card-body p-0 ">
                        <div class="p-3 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                            <h3 class="fs-18 fw-semibold mb-0">Change Password</h3>
                        </div>
                        <div class="p-3">
                            <div class="tab-content" id="myTabContent">
                                <form method="post" action="{{ route('admin.admin.password.update',$admin->id) }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('PATCH')
                                    <div>
                                        <label for="form-text" class="form-label fs-14 text-dark">New Password</label>
                                        <input type="password" name="password" class="form-control" id="form-text" placeholder="">
                                        @error('password')
                                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="form-text" class="form-label fs-14 text-dark">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="form-text" placeholder="">
                                        @error('password_confirmation')
                                        <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-danger mb-0">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                                        @if (session('status') === 'password-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

