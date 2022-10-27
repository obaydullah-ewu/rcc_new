@extends('user.layouts.app')

@section('content')
    <form class="form" action="{{ route('user.my-profile.update') }}" method="post" enctype="multipart/form-data">
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
                                    <h3 class="card-title fw-boldest" style="color: blue">ব্যবসার সাধারণ তথ্য</h3>
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">প্রতিষ্ঠানের নাম (ইংরেজীতে)</label>
                                            <input type="text" name="name_en"  class="form-control form-control-solid" placeholder="নাম (ইংরেজীতে)" value="{{ @$user->name_en ?? old('name_en') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class="required fw-bolder">প্রতিষ্ঠানের নাম (বাংলায়)</label>
                                            <input type="text" name="name_bn" class="form-control form-control-solid" placeholder="নাম (বাংলায়)" value="{{ @$user->name_bn ?? old('name_bn') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-12">
                                            <label class="required fw-bolder">ব্যবসায়ের বিবরণ</label>
                                            <textarea name="business_description" class="form-control form-control-solid" placeholder="ব্যবসায়ের বিবরণ লিখুন" id="" cols="30" rows="10">{{ old('business_description') }}</textarea>
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
                                    <h3 class="card-title fw-boldest" style="color: blue">ঠিকানা</h3>
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">Holding Number (ইংরেজীতে)</label>
                                            <input type="text" name="pre_holding_en" id="pre_holding_en"  class="form-control form-control-solid" placeholder="Holding Number" value="{{ @$user->userPresentAddress->pre_holding_en }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">হোল্ডিং নম্বর (বাংলায়)</label>
                                            <input type="text" name="pre_holding_bn" id="pre_holding_bn" class="form-control form-control-solid"
                                                   placeholder="হোল্ডিং নম্বর" value="{{ @$user->userPresentAddress->pre_holding_bn }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">ঠিকানা (ইংরেজীতে)</label>
                                            <input type="number" name="pre_ward_no_en" id="pre_ward_no_en" class="form-control form-control-solid" placeholder="ঠিকানা" value="{{ @$user->userPresentAddress->pre_ward_no_en }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">ঠিকানা (বাংলায়)</label>
                                            <input type="number" name="pre_ward_no_bn" id="pre_ward_no_bn" class="form-control form-control-solid" placeholder="ঠিকানা" value="{{ @$user->userPresentAddress->pre_ward_no_bn }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">রাস্তা (ইংরেজীতে)</label>
                                            <input type="text" name="pre_post_office_en" id="pre_post_office_en" class="form-control form-control-solid" placeholder="রাস্তা" value="{{ @$user->userPresentAddress->pre_post_office_en }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">রাস্তা (বাংলায়)</label>
                                            <input type="text" name="pre_post_office_bn" id="pre_post_office_bn" class="form-control form-control-solid" placeholder="রাস্তা" value="{{ @$user->userPresentAddress->pre_post_office_bn }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">অঞ্চল / বাজার শাখা</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">ওয়ার্ড / মার্কেট</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">ব্যবসায়ের এলাকা</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">মার্কেটের নাম</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">ফ্লোর নং</label>
                                            <input type="number" name="pre_union_en" id="pre_union_en" class="form-control form-control-solid" placeholder="ফ্লোর নং" value="{{ @$user->userPresentAddress->pre_union_en }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">দোকান নং </label>
                                            <input type="text" name="pre_union_bn" id="pre_union_bn" class="form-control form-control-solid" placeholder="দোকান নং  " value="{{ @$user->userPresentAddress->pre_union_bn }}" >
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
                                    <h3 class="card-title fw-boldest" style="color: blue">ব্যবসার গুরুত্বপূর্ণ তথ্য</h3>
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">ব্যবসা শুরুর তারিখ </label>
                                            <input type="date" name="pre_holding_en" id="pre_holding_en"  class="form-control form-control-solid" placeholder="Holding Number" value="{{ old('business_start_date') }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">অনুমোদিত মূলধণ (ইংরেজি)</label>
                                            <input type="text" name="pre_holding_bn" id="pre_holding_bn" class="form-control form-control-solid"
                                                   placeholder="হোল্ডিং নম্বর" value="{{ old('a') }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class=" fw-bolder">পরিশোধিত মূলধণ (ইংরেজি)</label>
                                            <input type="number" name="pre_ward_no_en" id="pre_ward_no_en" class="form-control form-control-solid" placeholder="ঠিকানা" value="{{ @$user->userPresentAddress->pre_ward_no_en }}" >
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">ব্যবসায়ের প্রকৃতি</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">ব্যবসায়ের ধরণ</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-3">
                                            <label class="required fw-bolder">ব্যবসায়ের উপ-ধরণ</label>
                                            <select name="gender" class="form-select form-select-solid land_division_id" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <label class=" fw-bolder">সাইনবোর্ড (ফিট-ইংরেজি) </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fw-bolder">দৈর্ঘ্য</span>
                                                </div>
                                                <input type="number" name="information_centre_fee" step="any" min="1" class="form-control" placeholder="0.00">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fw-bolder">প্রস্থ</span>
                                                </div>
                                                <input type="number" name="information_centre_fee" step="any" min="1" class="form-control" placeholder="0.00">
                                            </div>
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

        });
    </script>
@endpush

