@extends('user.auth.layouts.app')

@section('content')
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Two-stes -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="#" class="mb-12">
                <img alt="Logo" src="{{ asset(getOption('app_logo')) }}" class="h-40px" />
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form action="{{ route('user.registration.verify') }}" class="form w-100 mb-10" novalidate="novalidate" id="kt_sing_in_two_steps_form" method="post">
                    {{ csrf_field() }}
                    <!--begin::Icon-->
                    <div class="text-center mb-10">
                        <img alt="Logo" class="mh-125px" src="{{ asset('/') }}assets/media/svg/misc/smartphone.svg" />
                    </div>
                    <!--end::Icon-->
                    <input type="hidden" name="user_id" value="{{ @$user_id }}">
                    <input type="hidden" name="mobile_number" value="{{ @$mobile_number }}">
                    <input type="hidden" name="password" value="{{ @$password }}">
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Two Step Verification</h1>
                        <!--end::Title-->
                        <!--begin::Sub-title-->
                        <div class="text-muted fw-bold fs-5 mb-5">Enter the verification code we sent to</div>
                        <!--end::Sub-title-->
                        <!--begin::Mobile no-->
                        <div class="fw-bolder text-dark fs-3">{{ @$mobile_number }}</div>
                        <!--end::Mobile no-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Section-->
                    <div class="mb-10 px-md-10">
                        <!--begin::Label-->
                        <div class="fw-bolder text-start text-dark fs-6 mb-1 ms-1">Type your 6 digit security code</div>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-wrap flex-stack">
                            <input type="text" name="vc_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                            <input type="text" name="vc_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                            <input type="text" name="vc_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                            <input type="text" name="vc_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                            <input type="text" name="vc_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                            <input type="text" name="vc_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                        </div>
                        <!--begin::Input group-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Submit-->
                    <div class="d-flex flex-center">
                        <button type="submit" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bolder">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                    <!--end::Submit-->
                </form>
                <!--end::Form-->
                <!--begin::Notice-->
                <div class="text-center fw-bold fs-5">
                    <a href="{{ route('user.registration') }}" class="link-primary fw-bolder fs-5 me-1">Back To Registration?</a>
                </div>
                <!--end::Notice-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
            <!--begin::Links-->
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication - Two-stes-->
</div>
<!--end::Main-->
@endsection
