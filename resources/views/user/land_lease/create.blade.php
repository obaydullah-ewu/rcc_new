@extends('user.layouts.app')

@section('content')
    <form class="form" action="{{ route('user.land-lease.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- General Information -->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl customBackgroundColor">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::Card-->
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title fw-boldest" style="color: blue">আবেদনকারীর তথ্য</h3>
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">নাম (ইংরেজীতে)</label>
                                            <input type="text" name="applicant_name_en" id="applicant_name_en" class="form-control form-control-solid" placeholder="নাম (ইংরেজীতে)" value="{{ auth()->user()->name_en ?? old('applicant_name_en') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">নাম (বাংলায়)</label>
                                            <input type="text" name="applicant_name_bn" class="form-control form-control-solid"
                                                   placeholder="নাম (বাংলায়)" value="{{ auth()->user()->name_bn ?? old('applicant_name_bn') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">স্বামী/পিতার নাম</label>
                                            <input type="text" name="father_name" id="father_name" class="form-control form-control-solid" placeholder="স্বামী/পিতার নাম" value="{{ auth()->user()->father_name ?? old('father_name') }}">
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">ইমেইল</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                </div>
                                                <input type="email" name="applicant_email" id="applicant_email" class="form-control form-control-solid" placeholder="ইমেইল" value="{{ auth()->user()->email ?? old('applicant_email') }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">জাতীয় পরিচয় পত্র নাম্বার</label>
                                            <input type="text" name="nid" class="form-control form-control-solid" placeholder="জাতীয় পরিচয় পত্র নাম্বার*" value="{{ auth()->user()->nid ?? old('nid') }}">
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">জন্ম তারিখ</label>
                                            <input type="date" name="birth_of_date" class="form-control form-control-solid" placeholder="জন্ম তারিখ" value="{{ auth()->user()->birth_of_date ?? old('birth_of_date') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">মোবাইল নম্বর</label>
                                            <input type="text" name="mobile_number" class="form-control form-control-solid" placeholder="মোবাইল নম্বর" value="{{ auth()->user()->mobile_number ?? old('mobile_number') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">বিভাগ নাম</label>
                                            <select name="applicant_division_id" class="form-select form-select-solid applicant_division_id" required>
                                                <option value="">বিভাগ নাম</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{ $division->id }}" {{ auth()->user()->division_id == $division->id ? 'selected':'' }}>{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">জেলা নাম</label>
                                            <select class="form-select form-select-solid applicant_district_id" name="applicant_district_id" required>
                                                <option value="">-- জেলা নাম --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">উপজেলা নাম</label>
                                            <select class="form-select form-select-solid applicant_upazila_id" name="applicant_upazila_id" required>
                                                <option value="">-- উপজেলা নাম --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">পোস্ট অফিস নাম</label>
                                            <select class="form-select form-select-solid applicant_post_office_id" name="applicant_post_office_id" required>
                                                <option value="">-- পোস্ট অফিস নাম --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">গ্রাম নাম</label>
                                            <select class="form-select form-select-solid applicant_village_id" name="applicant_village_id" required>
                                                <option value="">-- গ্রাম নাম --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
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

        <!-- Local Information -->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl customBackgroundColor">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title fw-boldest" style="color: blue">প্রার্থিত জমির তফসিল</h3>
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">বিভাগ নাম</label>
                                            <select name="land_division_id" class="form-select form-select-solid land_division_id" required>
                                                <option value="">বিভাগ নাম</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">জেলা নাম</label>
                                            <select class="form-select form-select-solid land_district_id" name="land_district_id" required>
                                                <option value="">-- জেলা নাম --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">উপজেলা নাম</label>
                                            <select class="form-select form-select-solid land_upazila_id" name="land_upazila_id" required>
                                                <option value="">-- উপজেলা নাম --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-3">
                                            <!--begin::Label-->
                                            <label class="required fw-bolder">মৌজার নাম</label>
                                            <!--end::Label-->
                                            <select class="form-select form-select-solid land_mouza_id"  name="land_mouza_id" required>
                                                <option value="">-- মৌজার নাম --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-3">
                                            <!--begin::Label-->
                                            <label class="required fw-bolder">খতিয়ান নং</label>
                                            <!--end::Label-->
                                            <select class="form-select form-select-solid land_ledger_no_id" name="land_ledger_no_id" required>
                                                <option value="">-- খতিয়ান নং --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-3">
                                            <!--begin::Label-->
                                            <label class="required fw-bolder">দাগ নং</label>
                                            <!--end::Label-->
                                            <select class="form-select form-select-solid land_spot_no_id" name="land_spot_no_id" required>
                                                <option value="">-- দাগ নং --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-3">
                                            <!--begin::Label-->
                                            <label class="required fw-bolder">জমির ধরণ</label>
                                            <!--end::Label-->
                                            <select class="form-select form-select-solid" name="land_nature_id" required>
                                                <option value="">-- জমির ধরণ --</option>
                                                @foreach($landNatures as $nature)
                                                    <option value="{{ $nature->id }}">{{ $nature->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">জমির পরিমান</label>
                                            <select class="form-select form-select-solid land_amount_id" name="land_amount_id" required>
                                                <option value="">-- জমির পরিমান --</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
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

        <!-- Present Information -->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl customBackgroundColor">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title fw-bolder" style="color: blue">জমির চৌহদ্দি</h3>
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">উত্তর </label>
                                            <input type="text" name="land_north" class="form-control form-control-solid" placeholder="উত্তর" value="{{ old('land_north') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">দক্ষিণ</label>
                                            <input type="text" name="land_south" class="form-control form-control-solid" placeholder="দক্ষিণ"
                                                   value="{{ old('land_south') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">পূর্ব</label>
                                            <input type="text" name="land_east" class="form-control form-control-solid" placeholder="পূর্ব"
                                                   value="{{ old('land_east') }}">
                                        </div>
                                         <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">পশ্চিম</label>
                                            <input type="text" name="land_west" class="form-control form-control-solid" placeholder="পশ্চিম"
                                                   value="{{ old('land_west') }}">
                                        </div>

                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">প্রথম ইজারার তারিখ</label>
                                            <input type="date" name="first_date_of_lease" class="form-control form-control-solid" placeholder="প্রথম ইজারার তারিখ" value="{{ old('first_date_of_lease') }}">
                                        </div>

                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">প্রথম সেশন ইয়ার</label>
                                            <input type="text" name="first_session_lease" class="form-control form-control-solid" placeholder="প্রথম সেশন ইয়ার" value="{{ old('first_session_lease') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">শেষ ইজারার তারিখ</label>
                                            <input type="date" name="last_date_of_lease" class="form-control form-control-solid" placeholder="শেষ ইজারার তারিখ" value="{{ old('last_date_of_lease') }}">
                                        </div>

                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">শেষ সেশন ইয়ার</label>
                                            <input type="text" name="last_session_lease" class="form-control form-control-solid" placeholder="শেষ সেশন ইয়ার" value="{{ old('last_session_lease') }}">
                                        </div>
                                    </div>

                                </div>
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

        <!-- Others Information -->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl customBackgroundColor">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title fw-boldest" style="color: blue">আবেদনকারীর ছবি এবং স্বাক্ষর</h3>
                                    <div class="card-toolbar">
                                        <div class="example-tools justify-content-center">
                                            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                                            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
                                        </div>
                                    </div>
                                </div>

                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group mb-2 col-md-4">
                                            <label class="fw-bolder mb-3">আবেদনকারীর ছবি:</label><br>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change"
                                                       data-bs-toggle="tooltip" title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="applicant_image" accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="avatar_remove"/>
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                      title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                      title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>

                                        <div class="form-group mb-2 col-md-4">
                                            <label class="fw-bolder mb-3">আবেদনকারীর স্বাক্ষর:</label><br>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px" style=""></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change"
                                                       data-bs-toggle="tooltip" title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="applicant_signature" accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="avatar_remove"/>
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                      title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                      title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                    </div>
                                </div>
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

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl customBackgroundColor">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <!--begin::Card-->
                            <div class="card card-custom gutter-b example example-compact">
                                <!--begin::Form-->
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
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
    </form>
@endsection

@push('script')
    <script>
        "use strict"
        $(function (){
            var division_id = "{{ auth()->user()->division_id }}";
            var district_id ="{{ auth()->user()->district_id }}"
            var upazila_id = "{{ auth()->user()->upazila_id }}"
            var post_office_id = "{{ auth()->user()->post_office_id }}"
            var village_id = "{{ auth()->user()->village_id }}"

            //Get District
            $.ajax({
                url: '{{route('location.getDistrict')}}',
                type: "GET",
                dataType: 'json',
                data: {'division_id':division_id, 'district_id':district_id},
                success: function (response) {
                    $('.applicant_district_id').html('<option value="">-- জেলা নাম --</option>');
                    $.each(response.districts, function (key, value) {
                        $(".applicant_district_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('.applicant_district_id').val(response.district_id)
                }
            });

            //Get Upazila
            $.ajax({
                url: '{{route('location.getUpazila')}}',
                type: "GET",
                dataType: 'json',
                data: {'district_id':district_id, 'upazila_id':upazila_id},
                success: function (response) {
                    $('.applicant_upazila_id').html('<option value="">-- উপজেলা নাম --</option>');
                    $.each(response.upazilas, function (key, value) {
                        $(".applicant_upazila_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('.applicant_upazila_id').val(response.upazila_id)
                }
            });

            //Get Post Office
            $.ajax({
                url: '{{route('location.getPostOffice')}}',
                type: "GET",
                dataType: 'json',
                data: {'upazila_id':upazila_id, 'post_office_id': post_office_id},
                success: function (response) {
                    $('.applicant_post_office_id').html('<option value="">-- পোস্ট অফিস নাম --</option>');
                    $.each(response.postOffices, function (key, value) {
                        $(".applicant_post_office_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('.applicant_post_office_id').val(response.post_office_id)
                }
            });

            //Get Villages
            $.ajax({
                url: '{{route('location.getVillages')}}',
                type: "GET",
                dataType: 'json',
                data: {'post_office_id': post_office_id, 'village_id':village_id},
                success: function (response) {
                    $('.applicant_village_id').html('<option value="">-- গ্রাম নাম --</option>');
                    $.each(response.villages, function (key, value) {
                        $(".applicant_village_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('.applicant_village_id').val(response.village_id)
                }
            });
        })
    </script>

    <script>
        // Start:: Applicant Location
        "use strict"
        $('.applicant_division_id').on('change', function (){
            var division_id = $(this).val();
            $.ajax({
                url: '{{route('location.getDistrict')}}',
                type: "GET",
                dataType: 'json',
                data: {'division_id':division_id},
                success: function (response) {
                    $('.applicant_district_id').html('<option value="">-- জেলা নাম --</option>');
                    $.each(response.districts, function (key, value) {
                        $(".applicant_district_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })

        $('.applicant_district_id').on('change', function (){
            var district_id = $(this).val();
            $.ajax({
                url: '{{route('location.getUpazila')}}',
                type: "GET",
                dataType: 'json',
                data: {'district_id':district_id},
                success: function (response) {
                    $('.applicant_upazila_id').html('<option value="">-- উপজেলা নাম --</option>');
                    $.each(response.upazilas, function (key, value) {
                        $(".applicant_upazila_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })

        $('.applicant_upazila_id').on('change', function (){
            var upazila_id = $(this).val();
            $.ajax({
                url: '{{route('location.getPostOffice')}}',
                type: "GET",
                dataType: 'json',
                data: {'upazila_id':upazila_id},
                success: function (response) {
                    $('.applicant_post_office_id').html('<option value="">-- পোস্ট অফিস নাম --</option>');
                    $.each(response.postOffices, function (key, value) {
                        $(".applicant_post_office_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })

        $('.applicant_post_office_id').on('change', function (){
            var post_office_id = $(this).val();
            $.ajax({
                url: '{{route('location.getVillages')}}',
                type: "GET",
                dataType: 'json',
                data: {'post_office_id':post_office_id},
                success: function (response) {
                    $('.applicant_village_id').html('<option value="">-- গ্রাম নাম --</option>');
                    $.each(response.villages, function (key, value) {
                        $(".applicant_village_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })

        // End:: Applicant Location
    </script>

    <script>
        // Start:: Land Location
        "use strict"
        $('.land_division_id').on('change', function (){
            var division_id = $(this).val();
            $.ajax({
                url: '{{route('location.getDistrict')}}',
                type: "GET",
                dataType: 'json',
                data: {'division_id':division_id},
                success: function (response) {
                    $('.land_district_id').html('<option value="">-- জেলা নাম --</option>');
                    $.each(response.districts, function (key, value) {
                        $(".land_district_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })

        $('.land_district_id').on('change', function (){
            var district_id = $(this).val();
            $.ajax({
                url: '{{route('location.getUpazila')}}',
                type: "GET",
                dataType: 'json',
                data: {'district_id':district_id},
                success: function (response) {
                    $('.land_upazila_id').html('<option value="">-- উপজেলা নাম --</option>');
                    $.each(response.upazilas, function (key, value) {
                        $(".land_upazila_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })

        $('.land_upazila_id').on('change', function (){
            var upazila_id = $(this).val();
            $.ajax({
                url: '{{route('land_information.getMouza')}}',
                type: "GET",
                dataType: 'json',
                data: {'upazila_id':upazila_id},
                success: function (response) {
                    $('.land_mouza_id').html('<option value="">-- মৌজার নাম --</option>');
                    $.each(response.mouzas, function (key, value) {
                        $(".land_mouza_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })

        $('.land_mouza_id').on('change', function (){
            var mouza_id = $(this).val();
            $.ajax({
                url: '{{route('land_information.getLandLedgerNo')}}',
                type: "GET",
                dataType: 'json',
                data: {'mouza_id':mouza_id},
                success: function (response) {
                    $('.land_ledger_no_id').html('<option value="">-- খতিয়ান নং --</option>');
                    $.each(response.landLedgers, function (key, value) {
                        $(".land_ledger_no_id").append('<option value="' + value.id + '">' + value.ledger_no + '</option>');
                    });
                }
            });
        })

        $('.land_ledger_no_id').on('change', function (){
            var land_ledger_no_id = $(this).val();
            $.ajax({
                url: '{{route('land_information.getLandSpotNo')}}',
                type: "GET",
                dataType: 'json',
                data: {'land_ledger_no_id':land_ledger_no_id},
                success: function (response) {
                    $('.land_spot_no_id').html('<option value="">-- দাগ নং --</option>');
                    $.each(response.landSpots, function (key, value) {
                        $(".land_spot_no_id").append('<option value="' + value.id + '">' + value.spot_no + '</option>');
                    });
                }
            });
        })

        $('.land_spot_no_id').on('change', function (){
            var land_spot_no_id = $(this).val();
            $.ajax({
                url: '{{route('land_information.getLandAmount')}}',
                type: "GET",
                dataType: 'json',
                data: {'land_spot_no_id':land_spot_no_id},
                success: function (response) {
                    $('.land_amount_id').html('<option value="">-- জমির পরিমান --</option>');
                    $.each(response.landAmounts, function (key, value) {
                        $(".land_amount_id").append('<option value="' + value.id + '">' + value.amount + '</option>');
                    });
                }
            });
        })
        // End:: Land Location
    </script>
@endpush
