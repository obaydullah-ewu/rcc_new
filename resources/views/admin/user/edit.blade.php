@extends('admin.layouts.app')

@section('content')
    <form class="form" action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
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
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Name (ইংরেজীতে)</label>
                                            <input type="text" name="name_en"  class="form-control form-control-solid" placeholder="নাম (ইংরেজীতে)" value="{{ $user->name_en ?? old('name_en') }}" required>
                                            @error('name_en')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">নাম (বাংলায়)</label>
                                            <input type="text" name="name_bn" class="form-control form-control-solid" placeholder="নাম (বাংলায়)" value="{{ $user->name_bn ?? old('name_bn') }}" required>
                                            @error('name_bn')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Father Name (ইংরেজীতে)</label>
                                            <input type="text" name="father_name_en" class="form-control form-control-solid" placeholder="পিতার নাম" value="{{ $user->father_name_en ?? old('father_name_en') }}" required>
                                             @error('father_name_en')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">পিতার নাম (বাংলায়)</label>
                                            <input type="text" name="father_name_bn" class="form-control form-control-solid" placeholder="পিতার নাম" value="{{ $user->father_name_bn ?? old('father_name_bn') }}" required>
                                            @error('father_name_bn')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">Mother Name (ইংরেজীতে)</label>
                                            <input type="text" name="mother_name_en" class="form-control form-control-solid" placeholder="মাতার নাম" value="{{ $user->mother_name_en ?? old('mother_name_en') }}" required>
                                            @error('mother_name_en')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">মাতার নাম (বাংলায়)</label>
                                            <input type="text" name="mother_name_bn" class="form-control form-control-solid" placeholder="মাতার নাম" value="{{ $user->mother_name_bn ?? old('mother_name_bn') }}" required>
                                            @error('mother_name_bn')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">মোবাইল নম্বর</label>
                                            <input type="text" name="mobile_number" class="form-control form-control-solid" placeholder="মোবাইল নম্বর" value="{{ $user->mobile_number ?? old('mobile_number') }}" required>
                                             @error('mobile_number')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">ইমেইল</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                </div>
                                                <input type="text" name="email" class="form-control form-control-solid" placeholder="ইমেইল" value="{{ $user->email ?? old('email') }}">
                                                @error('email')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">পাসওয়ার্ড</label>
                                            <div class="input-group input-group-solid">
                                                <input type="text" name="password" class="form-control form-control-solid" placeholder="পাসওয়ার্ড" value="" >
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">জাতীয় পরিচয় পত্র নাম্বার</label>
                                            <input type="text" name="nid" class="form-control form-control-solid" placeholder="জাতীয় পরিচয় পত্র নাম্বার" value="{{ $user->nid ?? old('nid') }}">
                                            @error('nid')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">জন্ম সনদ নাম্বার</label>
                                            <input type="text" name="birth_certificate_no" class="form-control form-control-solid" placeholder="জন্ম সনদ নাম্বার" value="{{ $user->birth_certificate_no ?? old('birth_certificate_no') }}">
                                            @error('birth_certificate_no')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">পাসপোর্ট নম্বর</label>
                                            <input type="text" name="passport_no" class="form-control form-control-solid" placeholder="পাসপোর্ট নাম্বার" value="{{ $user->passport_no ?? old('passport_no') }}">
                                            @error('passport_no')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">জন্ম তারিখ</label>
                                            <input type="date" name="birth_of_date" class="form-control form-control-solid" placeholder="জন্ম তারিখ" value="{{ $user->birth_of_date ?? old('birth_of_date') }}" required>
                                            @error('birth_of_date')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">লিঙ্গ</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="Male" {{ $user->gender == 'Male' ? 'selected':'' }}>পুরুষ</option>
                                                <option value="Female" {{ $user->gender == 'Female' ? 'selected':'' }}>মহিলা</option>
                                                <option value="Others" {{ $user->gender == 'Others' ? 'selected':'' }}>অন্যান্য</option>
                                            </select>
                                            @error('gender')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">ধর্ম</label>
                                            <select name="religion" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="islam" {{ $user->religion == 'islam' ? 'selected':'' }}>ইসলাম</option>
                                                <option value="hindo" {{ $user->religion == 'hindo' ? 'selected':'' }}>হিন্দু</option>
                                                <option value="Female" {{ $user->religion == 'Female' ? 'selected':'' }}>খ্রিস্টান</option>
                                                <option value="Female" {{ $user->religion == 'Female' ? 'selected':'' }}>বৌদ্ধ</option>
                                                <option value="Others" {{ $user->religion == 'Others' ? 'selected':'' }}>অন্যান্য</option>
                                            </select>
                                            @error('religion')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">বৈবাহিক অবস্থা</label>
                                            <select name="marital_status" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="married" {{ $user->marital_status == 'married' ? 'selected':'' }}>বিবাহিত</option>
                                                <option value="unmarried" {{ $user->marital_status == 'unmarried' ? 'selected':'' }}>অবিবাহিত</option>
                                                <option value="divorce" {{ $user->marital_status == 'divorce' ? 'selected':'' }}>বিবাহবিচ্ছেদ</option>
                                                <option value="widow" {{ $user->marital_status == 'widow' ? 'selected':'' }}>বিধবা</option>
                                                <option value="Others" {{ $user->marital_status == 'Others' ? 'selected':'' }}>অন্যান্য</option>
                                            </select>
                                            @error('marital_status')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">মাসিক আয়</label>
                                            <input type="text" name="monthly_income" class="form-control form-control-solid" placeholder="মাসিক আয়" value="{{ $user->monthly_income ?? old('monthly_income') }}">
                                            @error('monthly_income')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">বার্ষিক আয়</label>
                                            <input type="text" name="yearly_income" class="form-control form-control-solid" placeholder="বার্ষিক আয়" value="{{ $user->yearly_income ?? old('yearly_income') }}">
                                             @error('yearly_income')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder">পেশা</label>
                                            <input type="text" name="profession" class="form-control form-control-solid" placeholder="পেশা" value="{{ $user->profession ?? old('profession') }}">
                                             @error('profession')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আপনি কি ভূমিহীন?</label>
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="landless_status" {{ $user->landless_status == 'yes' ? 'checked':'' }} type="radio" value="yes">
                                                    <span class="fw-semibold ps-2 fs-6">হ্যাঁ</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="landless_status" {{ $user->landless_status != 'yes' ? 'checked':'' }} type="radio" value="no">
                                                    <span class="fw-semibold ps-2 fs-6">না</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আপনি কি প্রতিবন্ধী?</label>
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="handicapped_status" {{ $user->handicapped_status == 'yes' ? 'checked':'' }} type="radio" value="yes">
                                                    <span class="fw-semibold ps-2 fs-6">হ্যাঁ</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="handicapped_status" {{ $user->handicapped_status != 'yes' ? 'checked':'' }} type="radio" value="no">
                                                    <span class="fw-semibold ps-2 fs-6">না</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আপনি কি নদী ভাঙ্গনের আওতায় পড়েছেন?</label>
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="river_break_status" {{ $user->river_break_status == 'yes' ? 'checked':'' }} type="radio" value="yes">
                                                    <span class="fw-semibold ps-2 fs-6">হ্যাঁ</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="river_break_status" {{ $user->river_break_status != 'yes' ? 'checked':'' }} type="radio" value="no">
                                                    <span class="fw-semibold ps-2 fs-6">না</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আপনি কি মুক্তিযোদ্ধার সন্তান??</label>
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="freedom_son_status" {{ $user->freedom_son_status  == 'yes' ? 'checked':'' }} type="radio" value="yes">
                                                    <span class="fw-semibold ps-2 fs-6">হ্যাঁ</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="freedom_son_status" {{ $user->freedom_son_status != 'yes' ? 'checked':'' }} type="radio" value="no">
                                                    <span class="fw-semibold ps-2 fs-6">না</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder ">ব্যবহারকারীর ছবি:</label><br>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})">
                                                <!--begin::Preview existing avatar-->
                                                @if($user->image)
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ getFile($user->image)  }})"></div>
                                                @else
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})"></div>
                                                @endif
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
                                <div class="card-header d-flex">
                                    <h3 class="card-title fw-boldest mt-5" style="color: blue">স্থায়ী ঠিকানা</h3>
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">বিভাগ </label>
                                            <select class="form-select form-select-solid per_division" name="per_division" required>
                                                <option value="">বিভাগ নাম</option>
                                                @foreach($divisions as $division)
                                                    <option
                                                        value="{{ $division->id }}" {{ $permanentAddress->per_division == $division->id ? 'selected':'' }}>{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('per_division')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">জেলা </label>
                                            <select class="form-select form-select-solid per_district" name="per_district" required>
                                                <option value="">নির্বাচন করুন</option>
                                            </select>
                                            @error('per_district')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">উপজেলা / থানা </label>
                                            <select class="form-select form-select-solid per_upazila" name="per_upazila" required>
                                                <option value="">নির্বাচন করুন</option>
                                            </select>
                                            @error('per_upazila')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">ওয়ার্ড নং </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fw-bolder">ওয়ার্ড-</span>
                                                </div>
                                                <select class="form-select form-select-solid per_ward" name="per_ward" required>
                                                    <option value="">নির্বাচন করুন</option>
                                                </select>
                                                @error('per_ward')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">গ্রাম/মহল্লা </label>
                                            <select class="form-select form-select-solid per_village" name="per_village" required>
                                                <option value="">নির্বাচন করুন</option>
                                            </select>
                                            @error('per_village')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">হোল্ডিং নম্বর </label>
                                            <input type="text" name="per_holding" class="form-control form-control-solid per_holding"
                                                   placeholder="হোল্ডিং নম্বর" value="{{ $permanentAddress->per_holding }}">
                                            @error('per_holding')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">পোষ্ট অফিস </label>
                                            <select class="form-select form-select-solid per_post_office" name="per_post_office" required>
                                                <option value="">নির্বাচন করুন</option>
                                            </select>
                                             @error('per_post_office')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
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
                                    <label class="form-check form-check-custom form-check-inline form-check-solid mb-5 mt-5">
                                        <input class="form-check-input same_as_permanent_address" name="same_as_permanent_address" type="checkbox"
                                               value="1">
                                        <span class="fw-bolder ms-2"> স্থায়ী ঠিকানা হিসাবে একই</span>
                                    </label>
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">বিভাগ </label>
                                            <select class="form-select form-select-solid pre_division" name="pre_division" required>
                                                <option value="">নির্বাচন করুন</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{ $division->id }}" {{ $presentAddress->pre_division == $division->id ? 'selected':'' }}>{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('pre_division')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">জেলা </label>
                                            <select class="form-select form-select-solid pre_district" name="pre_district" required>
                                                <option value="">নির্বাচন করুন</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">উপজেলা / থানা </label>
                                            <select class="form-select form-select-solid pre_upazila" name="pre_upazila" required>
                                                <option value="">নির্বাচন করুন</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">ওয়ার্ড নং </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fw-bolder">ওয়ার্ড-</span>
                                                </div>
                                                <select class="form-select form-select-solid pre_ward" name="pre_ward" required>
                                                    <option value="">নির্বাচন করুন</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">গ্রাম/মহল্লা </label>
                                            <select class="form-select form-select-solid pre_village" name="pre_village" required>
                                                <option value="">নির্বাচন করুন</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">হোল্ডিং নম্বর </label>
                                            <input type="text" name="pre_holding" class="form-control form-control-solid pre_holding"
                                                   placeholder="হোল্ডিং নম্বর" value="{{ $presentAddress->pre_holding }}">
                                            @error('pre_holding')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class=" fw-bolder">পোষ্ট অফিস </label>
                                            <select class="form-select form-select-solid pre_post_office" name="pre_post_office" required>
                                                <option value="">নির্বাচন করুন</option>
                                            </select>
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
    <!-- Start:: Permanent Address -->
    <script>
        "use strict"
        $('.per_division').on('change', function () {
            var division_id = $(this).val();
            getPerDistrict(division_id)
        })

        function getPerDistrict(division_id)
        {
            $.ajax({
                url: '{{route('location.getDistrict')}}',
                type: "GET",
                dataType: 'json',
                data: {'division_id': division_id},
                success: function (response) {
                    $('.per_district').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.districts, function (key, value) {
                        $(".per_district").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }

        $('.per_district').on('change', function () {
            var district_id = $(this).val();
            getPerUpazila(district_id)
        })

        function getPerUpazila(district_id)
        {
            $.ajax({
                url: '{{route('location.getUpazila')}}',
                type: "GET",
                dataType: 'json',
                data: {'district_id': district_id},
                success: function (response) {
                    $('.per_upazila').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.upazilas, function (key, value) {
                        $(".per_upazila").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }

        $('.per_upazila').on('change', function () {
            var upazila_id = $(this).val();
            getPerWard(upazila_id)
        })

        function getPerWard(upazila_id)
        {
            $.ajax({
                url: '{{route('location.getWard')}}',
                type: "GET",
                dataType: 'json',
                data: {'upazila_id': upazila_id},
                success: function (response) {
                    $('.per_ward').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.wards, function (key, value) {
                        $(".per_ward").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }

        $('.per_ward').on('change', function () {
            var ward_id = $(this).val();
            getPerVillages(ward_id)
        })

        function getPerVillages(ward_id)
        {
            $.ajax({
                url: '{{route('location.getVillages')}}',
                type: "GET",
                dataType: 'json',
                data: {'ward_id': ward_id},
                success: function (response) {
                    $('.per_village').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.villages, function (key, value) {
                        $(".per_village").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }

        $('.per_upazila').on('change', function () {
            var upazila_id = $(this).val();
            getPerPostOffice(upazila_id)
        })

        function getPerPostOffice(upazila_id)
        {
            $.ajax({
                url: '{{route('location.getPostOffice')}}',
                type: "GET",
                dataType: 'json',
                data: {'upazila_id': upazila_id},
                success: function (response) {
                    $('.per_post_office').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.postOffices, function (key, value) {
                        $(".per_post_office").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }
    </script>
    <!-- End:: Permanent Address -->

    <!-- Start:: Present Address -->
    <script>
        "use strict"
        $('.pre_division').on('change', function () {
            var division_id = $(this).val();
            getPreDistrict(division_id)
        })
        function getPreDistrict(division_id)
        {
            $.ajax({
                url: '{{route('location.getDistrict')}}',
                type: "GET",
                dataType: 'json',
                data: {'division_id': division_id},
                success: function (response) {
                    $('.pre_district').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.districts, function (key, value) {
                        $(".pre_district").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }

        $('.pre_district').on('change', function () {
            var district_id = $(this).val();
            getPreUpazila(district_id)
        })
        function getPreUpazila(district_id)
        {
            $.ajax({
                url: '{{route('location.getUpazila')}}',
                type: "GET",
                dataType: 'json',
                data: {'district_id': district_id},
                success: function (response) {
                    $('.pre_upazila').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.upazilas, function (key, value) {
                        $(".pre_upazila").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }

        $('.pre_upazila').on('change', function () {
            var upazila_id = $(this).val();
            getPreWard(upazila_id)
        })
        function getPreWard(upazila_id)
        {
            $.ajax({
                url: '{{route('location.getWard')}}',
                type: "GET",
                dataType: 'json',
                data: {'upazila_id': upazila_id},
                success: function (response) {
                    $('.pre_ward').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.wards, function (key, value) {
                        $(".pre_ward").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }

        $('.pre_ward').on('change', function () {
            var ward_id = $(this).val();
            getPreVillages(ward_id)
        })
        function getPreVillages(ward_id)
        {
            $.ajax({
                url: '{{route('location.getVillages')}}',
                type: "GET",
                dataType: 'json',
                data: {'ward_id': ward_id},
                success: function (response) {
                    $('.pre_village').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.villages, function (key, value) {
                        $(".pre_village").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }

        $('.pre_upazila').on('change', function () {
            var upazila_id = $(this).val();
            getPrePostOffice(upazila_id)
        })
        function getPrePostOffice(upazila_id)
        {
            $.ajax({
                url: '{{route('location.getPostOffice')}}',
                type: "GET",
                dataType: 'json',
                data: {'upazila_id': upazila_id},
                success: function (response) {
                    $('.pre_post_office').html('<option value="">-- নির্বাচন করুন --</option>');
                    $.each(response.postOffices, function (key, value) {
                        $(".pre_post_office").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                async: false
            });
        }
    </script>
    <!-- End:: Present Address -->

    <script>
        $(document).ready(function () {
            $('input[name="same_as_permanent_address"]').click(function () {
                if ($(this).is(":checked")) {
                    var division_id = $('.per_division').val();
                    $('.pre_division').val(division_id)

                    getPreDistrict(division_id)
                    var district_id = $('.per_district').val()
                    $('.pre_district').val(district_id)

                    getPreUpazila(district_id)
                    var upazila_id = $('.per_upazila').val()
                    $('.pre_upazila').val(upazila_id)

                    getPrePostOffice(upazila_id)
                    var post_office_id = $('.per_post_office').val()
                    $('.pre_post_office').val(post_office_id)

                    getPreWard(upazila_id)
                    var ward_id = $('.per_ward').val();
                    $('.pre_ward').val(ward_id)

                    getPreVillages(ward_id)
                    var village_id = $('.per_village').val()
                    $('.pre_village').val(village_id)

                    $('.pre_holding').val($('.per_holding').val())
                } else if ($(this).is(":not(:checked)")) {
                    // $('#pre_district').val('')
                    // $('#pre_upazila').val('')
                    // $('#pre_post_office').val('')
                    // $('#pre_ward').val('')
                    // $('#pre_village').val('')
                    // $('#pre_holding').val('')
                }
            });

            $(function (){
                var division_id = "{{ $permanentAddress->per_division }}"

                getPerDistrict(division_id)
                var district_id = "{{ $permanentAddress->per_district }}"
                $('.per_district').val(district_id)

                getPerUpazila(district_id)
                var upazila_id = "{{ $permanentAddress->per_upazila }}"
                $('.per_upazila').val(upazila_id)

                getPerWard(upazila_id)
                var ward_id = "{{ $permanentAddress->per_ward }}"
                $('.per_ward').val(ward_id)

                getPerVillages(ward_id)
                var village_id = "{{ $permanentAddress->per_village }}"
                $('.per_village').val(village_id)

                getPerPostOffice(upazila_id)
                var post_office_id = "{{ $permanentAddress->per_ward }}"
                $('.per_post_office').val(post_office_id)


                var division_id = "{{ $presentAddress->pre_division }}"

                getPreDistrict(division_id)
                var district_id = "{{ $presentAddress->pre_district }}"
                $('.pre_district').val(district_id)

                getPreUpazila(district_id)
                var upazila_id = "{{ $presentAddress->pre_upazila }}"
                $('.pre_upazila').val(upazila_id)

                getPreWard(upazila_id)
                var ward_id = "{{ $presentAddress->pre_ward }}"
                $('.pre_ward').val(ward_id)

                getPreVillages(ward_id)
                var village_id = "{{ $presentAddress->pre_village }}"
                $('.pre_village').val(village_id)

                getPrePostOffice(upazila_id)
                var post_office_id = "{{ $presentAddress->pre_ward }}"
                $('.pre_post_office').val(post_office_id)
            })
        });
    </script>
@endpush
