@extends('admin.layouts.app')

@section('content')
    <form class="form" action="{{ route('admin.setting.generalSettingUpdate') }}" method="post">
        @csrf
        <!-- General Information -->
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

                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">সনদপত্র ফি</label>
                                            <input type="number" name="certificate_fee" class="form-control form-control-solid"
                                                   placeholder="সনদপত্র ফি" value="{{getOption('certificate_fee') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">তথ্য কেন্দ্র ফি</label>
                                            <input type="number" name="information_centre_fee" class="form-control form-control-solid"
                                                   placeholder="তথ্য কেন্দ্র ফি" value="{{getOption('information_centre_fee') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">বিকাশ/নগদ চার্জ ফি</label>
                                            <input type="number" name="mobile_banking_charge_fee" class="form-control form-control-solid"
                                                   placeholder="বিকাশ/নগদ ফি" value="{{getOption('mobile_banking_charge_fee') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Card body-->
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

@endpush

