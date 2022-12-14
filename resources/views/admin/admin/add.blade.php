@extends('admin.layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Add Admin</h3>
                                <div class="card-toolbar">
                                    <div class="example-tools justify-content-center">
                                        <span class="example-toggle" data-toggle="tooltip" title=""
                                              data-original-title="View code"></span>
                                        <span class="example-copy" data-toggle="tooltip" title=""
                                              data-original-title="Copy code"></span>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{ route('admin.admin.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <label class="fw-bolder ">Image:</label><br>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">???????????????????????? ?????????</label>
                                            <input type="text" name="name" class="form-control form-control-solid"
                                                   placeholder="Enter name" value="{{ old('name') }}">
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">???????????????</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                </div>
                                                <input type="email" name="email" id="email" class="form-control form-control-solid" placeholder="Enter email" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">??????????????????????????????</label>
                                            <input type="password" name="password" class="form-control form-control-solid" placeholder="Enter password">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fs-6 fw-bolder">???????????? ?????????</label>
                                            <select class="form-select form-select-solid" name="role_id" required>
                                                <option value="">--Select Option--</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">?????????????????? ???????????????</label>
                                            <input type="text" name="mobile_number" class="form-control form-control-solid" placeholder="Enter mobile number" value="{{ old('mobile_number') }}">
                                        </div>


                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">??????????????? ?????????</label>
                                            <input type="text" name="division" class="form-control form-control-solid" placeholder="Enter division" value="{{ old('division') }}">
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">???????????? ?????????</label>
                                            <input type="text" name="district" class="form-control form-control-solid" placeholder="Enter district" value="{{ old('district') }}">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">?????????????????? ?????????</label>
                                            <input type="text" name="upazila" class="form-control form-control-solid" placeholder="Enter upazila" value="{{ old('upazila') }}">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">??????????????? ???????????? ?????????</label>
                                            <input type="text" name="post_office" class="form-control form-control-solid" placeholder="Enter post office" value="{{ old('post_office') }}">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">??????????????? ?????????</label>
                                            <input type="text" name="village" class="form-control form-control-solid" placeholder="Enter village" value="{{ old('village') }}">
                                        </div>
                                        <!--end::Input group-->

                                        <div class="form-group mb-2 col-md-4">
                                            <label class="required fw-bolder">??????????????????</label>
                                           <select name="status" class="form-select form-select-solid">
                                                <option value="1" @if(old('status') == 1) selected @endif>Active</option>
                                                <option value="2" @if(old('status') == 2) selected @endif>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer " >
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->

        </div>


    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $("#email").change(function () {
                var email = $('#email').val();
                $.ajax({
                    type: "GET",
                    url: '{{ route('admin.admin.get-email') }}',
                    data: {"email": email},
                    success: function (response) {
                        if (response.admin > 0) {
                            $('#email').val(null);
                            toastr.error('', 'Admin email name already created');
                        }
                    }
                });
            });
        });
    </script>
@endpush

