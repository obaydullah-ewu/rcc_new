@extends('admin.layouts.app')

@section('content')
    <form class="form" action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
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
                                    <h3 class="card-title fw-boldest" style="color: blue">সাধারণ তথ্যাদি</h3>
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
                                            <label class="required fw-bolder">Name (ইংরেজীতে)</label>
                                            <input type="text" name="name_en"  class="form-control form-control-solid" placeholder="নাম (ইংরেজীতে)" value="{{ old('name_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">নাম (বাংলায়)</label>
                                            <input type="text" name="name_bn" class="form-control form-control-solid"
                                                   placeholder="নাম (বাংলায়)" value="{{ old('name_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Father Name (ইংরেজীতে)</label>
                                            <input type="text" name="father_name_en" class="form-control form-control-solid" placeholder="পিতার নাম" value="{{ old('father_name_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">পিতার নাম (বাংলায়)</label>
                                            <input type="text" name="father_name_bn" class="form-control form-control-solid" placeholder="পিতার নাম" value="{{ old('father_name_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Mother Name (ইংরেজীতে)</label>
                                            <input type="text" name="mother_name_en" class="form-control form-control-solid" placeholder="মাতার নাম" value="{{ old('mother_name_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">মাতার নাম (বাংলায়)</label>
                                            <input type="text" name="mother_name_bn" class="form-control form-control-solid" placeholder="মাতার নাম" value="{{ old('mother_name_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">মোবাইল নম্বর</label>
                                            <input type="text" name="mobile_number" class="form-control form-control-solid" placeholder="মোবাইল নম্বর" value="{{ old('mobile_number') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">ইমেইল</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                </div>
                                                <input type="text" name="email" class="form-control form-control-solid" placeholder="ইমেইল" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">পাসওয়ার্ড</label>
                                            <div class="input-group input-group-solid">
                                                <input type="text" name="password" class="form-control form-control-solid" placeholder="পাসওয়ার্ড" value="{{ old('password') }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">জাতীয় পরিচয় পত্র নাম্বার</label>
                                            <input type="text" name="nid" class="form-control form-control-solid" placeholder="জাতীয় পরিচয় পত্র নাম্বার" value="{{ old('nid') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">জন্ম সনদ নাম্বার</label>
                                            <input type="text" name="birth_certificate_no" class="form-control form-control-solid" placeholder="জন্ম সনদ নাম্বার" value="{{ old('birth_certificate_no') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">পাসপোর্ট নম্বর</label>
                                            <input type="text" name="passport_no" class="form-control form-control-solid" placeholder="পাসপোর্ট নাম্বার" value="{{ old('passport_no') }}">
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">জন্ম তারিখ</label>
                                            <input type="date" name="birth_of_date" class="form-control form-control-solid" placeholder="জন্ম তারিখ" value="{{ old('birth_of_date') }}" required>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">লিঙ্গ</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="Male" {{ old('gender') == 'Male' ? 'selected':'' }}>পুরুষ</option>
                                                <option value="Female" {{ old('gender') == 'Female' ? 'selected':'' }}>মহিলা</option>
                                                <option value="Others" {{ old('gender') == 'Others' ? 'selected':'' }}>অন্যান্য</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">ধর্ম</label>
                                            <select name="religion" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="islam" {{ old('religion') == 'islam' ? 'selected':'' }}>ইসলাম</option>
                                                <option value="hindo" {{ old('religion') == 'hindo' ? 'selected':'' }}>হিন্দু</option>
                                                <option value="Female" {{ old('religion') == 'Female' ? 'selected':'' }}>খ্রিস্টান</option>
                                                <option value="Female" {{ old('religion') == 'Female' ? 'selected':'' }}>বৌদ্ধ</option>
                                                <option value="Others" {{ old('religion') == 'Others' ? 'selected':'' }}>অন্যান্য</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">বৈবাহিক অবস্থা</label>
                                            <select name="marital_status" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="married" {{ old('marital_status') == 'married' ? 'selected':'' }}>বিবাহিত</option>
                                                <option value="unmarried" {{ old('marital_status') == 'unmarried' ? 'selected':'' }}>অবিবাহিত</option>
                                                <option value="divorce" {{ old('marital_status') == 'divorce' ? 'selected':'' }}>বিবাহবিচ্ছেদ</option>
                                                <option value="widow" {{ old('marital_status') == 'widow' ? 'selected':'' }}>বিধবা</option>
                                                <option value="Others" {{ old('marital_status') == 'Others' ? 'selected':'' }}>অন্যান্য</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">মাসিক আয়</label>
                                            <input type="text" name="monthly_income" class="form-control form-control-solid" placeholder="মাসিক আয়" value="{{ old('monthly_income') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">বার্ষিক আয়</label>
                                            <input type="text" name="yearly_income" class="form-control form-control-solid" placeholder="বার্ষিক আয়" value="{{ old('yearly_income') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">পেশা</label>
                                            <input type="text" name="profession" class="form-control form-control-solid" placeholder="পেশা" value="{{ old('profession') }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আপনি কি ভূমিহীন?</label>
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="landless_status" {{ old('landless_status') == 'yes' ? 'checked':'' }} type="radio" value="yes">
                                                    <span class="fw-semibold ps-2 fs-6">হ্যাঁ</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="landless_status" {{ old('landless_status') != 'yes' ? 'checked':'' }} type="radio" value="no">
                                                    <span class="fw-semibold ps-2 fs-6">না</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আপনি কি প্রতিবন্ধী?</label>
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="handicapped_status" {{ old('handicapped_status') == 'yes' ? 'checked':'' }} type="radio" value="yes">
                                                    <span class="fw-semibold ps-2 fs-6">হ্যাঁ</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="handicapped_status" {{ old('handicapped_status') != 'yes' ? 'checked':'' }} type="radio" value="no">
                                                    <span class="fw-semibold ps-2 fs-6">না</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আপনি কি নদী ভাঙ্গনের আওতায় পড়েছেন?</label>
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="river_break_status" {{ old('river_break_status') == 'yes' ? 'checked':'' }} type="radio" value="yes">
                                                    <span class="fw-semibold ps-2 fs-6">হ্যাঁ</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="river_break_status" {{ old('river_break_status') != 'yes' ? 'checked':'' }} type="radio" value="no">
                                                    <span class="fw-semibold ps-2 fs-6">না</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আপনি কি মুক্তিযোদ্ধার সন্তান??</label>
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="freedom_son_status" {{ old('freedom_son_status') == 'yes' ? 'checked':'' }} type="radio" value="yes">
                                                    <span class="fw-semibold ps-2 fs-6">হ্যাঁ</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="freedom_son_status" {{ old('freedom_son_status') != 'yes' ? 'checked':'' }} type="radio" value="no">
                                                    <span class="fw-semibold ps-2 fs-6">না</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder ">ব্যবহারকারীর ছবি:</label><br>
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
                                <div class="card-header">
                                    <h3 class="card-title fw-boldest" style="color: blue">বর্তমান ঠিকানা</h3>
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Holding Number (ইংরেজীতে)</label>
                                            <input type="text" name="pre_holding_en" id="pre_holding_en"  class="form-control form-control-solid" placeholder="Holding Number" value="{{ old('pre_holding_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">হোল্ডিং নম্বর (বাংলায়)</label>
                                            <input type="text" name="pre_holding_bn" id="pre_holding_bn" class="form-control form-control-solid"
                                                   placeholder="হোল্ডিং নম্বর" value="{{ old('pre_holding_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Village (ইংরেজীতে)</label>
                                            <input type="text" name="pre_village_en" id="pre_village_en" class="form-control form-control-solid" placeholder="Village" value="{{ old('pre_village_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">গ্রাম/মহল্লা (বাংলায়)</label>
                                            <input type="text" name="pre_village_bn" id="pre_village_bn" class="form-control form-control-solid" placeholder="গ্রাম/মহল্লা" value="{{ old('pre_village_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Ward No (ইংরেজীতে)</label>
                                            <input type="number" name="pre_ward_no_en" id="pre_ward_no_en" class="form-control form-control-solid" placeholder="Ward No" value="{{ old('pre_ward_no_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">ওয়ার্ড নং (বাংলায়)</label>
                                            <input type="number" name="pre_ward_no_bn" id="pre_ward_no_bn" class="form-control form-control-solid" placeholder="ওয়ার্ড নং" value="{{ old('pre_ward_no_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Post Office (ইংরেজীতে)</label>
                                            <input type="text" name="pre_post_office_en" id="pre_post_office_en" class="form-control form-control-solid" placeholder="Post Office" value="{{ old('pre_post_office_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">পোষ্ট অফিস (বাংলায়)</label>
                                            <input type="text" name="pre_post_office_bn" id="pre_post_office_bn" class="form-control form-control-solid" placeholder="পোষ্ট অফিস" value="{{ old('pre_post_office_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Union (ইংরেজীতে)</label>
                                            <input type="text" name="pre_union_en" id="pre_union_en" class="form-control form-control-solid" placeholder="Union" value="{{ old('pre_union_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">ইউনিয়ন (বাংলায়)</label>
                                            <input type="text" name="pre_union_bn" id="pre_union_bn" class="form-control form-control-solid" placeholder="ইউনিয়ন" value="{{ old('pre_union_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Upazila / Thana (ইংরেজীতে)</label>
                                            <input type="text" name="pre_upazila_en" id="pre_upazila_en" class="form-control form-control-solid" placeholder="Upazila" value="{{ old('pre_upazila_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">উপজেলা / থানা (বাংলায়)</label>
                                            <input type="text" name="pre_upazila_bn" id="pre_upazila_bn" class="form-control form-control-solid" placeholder="উপজেলা" value="{{ old('pre_upazila_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">District (ইংরেজীতে)</label>
                                            <input type="text" name="pre_district_en" id="pre_district_en" class="form-control form-control-solid" placeholder="District" value="{{ old('pre_district_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">জেলা (বাংলায়)</label>
                                            <input type="text" name="pre_district_bn" id="pre_district_bn" class="form-control form-control-solid" placeholder="জেলা (বাংলায়)" value="{{ old('pre_district_bn') }}" required>
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
                                <div class="card-header d-flex">
                                    <h3 class="card-title fw-boldest mt-5" style="color: blue">স্থায়ী ঠিকানা</h3>
                                    <label class="form-check form-check-custom form-check-inline form-check-solid mb-5 mt-5">
                                        <input class="form-check-input same_as_present_address" name="same_as_present_address" type="checkbox" value="1">
                                        <span class="fw-bolder ms-2"> বর্তমান ঠিকানা হিসাবে একই</span>
                                    </label>
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Holding Number (ইংরেজীতে)</label>
                                            <input type="text" name="per_holding_en" id="per_holding_en"  class="form-control form-control-solid" placeholder="Holding Number" value="{{ old('per_holding_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">হোল্ডিং নম্বর (বাংলায়)</label>
                                            <input type="text" name="per_holding_bn" id="per_holding_bn" class="form-control form-control-solid"
                                                   placeholder="হোল্ডিং নম্বর" value="{{ old('per_holding_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Village (ইংরেজীতে)</label>
                                            <input type="text" name="per_village_en" id="per_village_en" class="form-control form-control-solid" placeholder="Village" value="{{ old('per_village_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">গ্রাম/মহল্লা (বাংলায়)</label>
                                            <input type="text" name="per_village_bn" id="per_village_bn" class="form-control form-control-solid" placeholder="গ্রাম/মহল্লা" value="{{ old('per_village_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Ward No (ইংরেজীতে)</label>
                                            <input type="number" name="per_ward_no_en" id="per_ward_no_en" class="form-control form-control-solid" placeholder="Ward No" value="{{ old('per_ward_no_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">ওয়ার্ড নং (বাংলায়)</label>
                                            <input type="number" name="per_ward_no_bn" id="per_ward_no_bn" class="form-control form-control-solid" placeholder="ওয়ার্ড নং" value="{{ old('per_ward_no_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Post Office (ইংরেজীতে)</label>
                                            <input type="text" name="per_post_office_en" id="per_post_office_en" class="form-control form-control-solid" placeholder="Post Office" value="{{ old('per_post_office_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">পোষ্ট অফিস (বাংলায়)</label>
                                            <input type="text" name="per_post_office_bn" id="per_post_office_bn" class="form-control form-control-solid" placeholder="পোষ্ট অফিস" value="{{ old('per_post_office_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Union (ইংরেজীতে)</label>
                                            <input type="text" name="per_union_en" id="per_union_en" class="form-control form-control-solid" placeholder="Union" value="{{ old('per_union_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">ইউনিয়ন (বাংলায়)</label>
                                            <input type="text" name="per_union_bn" id="per_union_bn" class="form-control form-control-solid" placeholder="ইউনিয়ন" value="{{ old('per_union_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">Upazila / Thana (ইংরেজীতে)</label>
                                            <input type="text" name="per_upazila_en" id="per_upazila_en" class="form-control form-control-solid" placeholder="Upazila" value="{{ old('per_upazila_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">উপজেলা / থানা (বাংলায়)</label>
                                            <input type="text" name="per_upazila_bn" id="per_upazila_bn" class="form-control form-control-solid" placeholder="উপজেলা" value="{{ old('per_upazila_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">District (ইংরেজীতে)</label>
                                            <input type="text" name="per_district_en" id="per_district_en" class="form-control form-control-solid" placeholder="District" value="{{ old('per_district_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">জেলা (বাংলায়)</label>
                                            <input type="text" name="per_district_bn" id="per_district_bn" class="form-control form-control-solid" placeholder="জেলা (বাংলায়)" value="{{ old('per_district_bn') }}" required>
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
        $(document).ready(function(){
            $('input[name="same_as_present_address"]').click(function(){
                if($(this).is(":checked")){
                    $('#per_holding_en').val($('#pre_holding_en').val())
                    $('#per_holding_bn').val($('#pre_holding_bn').val())
                    $('#per_village_en').val($('#pre_village_en').val())
                    $('#per_village_bn').val($('#pre_village_bn').val())
                    $('#per_union_en').val($('#pre_union_en').val())
                    $('#per_union_bn').val($('#pre_union_bn').val())
                    $('#per_ward_no_en').val($('#pre_ward_no_en').val())
                    $('#per_ward_no_bn').val($('#pre_ward_no_bn').val())
                    $('#per_post_office_en').val($('#pre_post_office_en').val())
                    $('#per_post_office_bn').val($('#pre_post_office_bn').val())
                    $('#per_upazila_en').val($('#pre_upazila_en').val())
                    $('#per_upazila_bn').val($('#pre_upazila_bn').val())
                    $('#per_district_en').val($('#pre_district_en').val())
                    $('#per_district_bn').val($('#pre_district_bn').val())
                } else if($(this).is(":not(:checked)")){
                    $('#per_holding_en').val('')
                    $('#per_holding_bn').val('')
                    $('#per_village_en').val('')
                    $('#per_village_bn').val('')
                    $('#per_union_en').val('')
                    $('#per_union_bn').val('')
                    $('#per_ward_no_en').val('')
                    $('#per_ward_no_bn').val('')
                    $('#per_post_office_en').val('')
                    $('#per_post_office_bn').val('')
                    $('#per_upazila_en').val('')
                    $('#per_upazila_bn').val('')
                    $('#per_district_en').val('')
                    $('#per_district_bn').val('')
                }
            });
        });
    </script>
@endpush

