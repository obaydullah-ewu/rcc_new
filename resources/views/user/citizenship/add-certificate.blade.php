@extends('user.layouts.app')

@section('content')
    <form class="form" action="{{ route('user.citizenship.apply') }}" method="post" enctype="multipart/form-data">
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
                                <div class="card-header">
                                    <h3 class="card-title fw-boldest" style="color: blue">সাধারণ তথ্যাদি</h3>
                                </div>
                                <!--begin::Form-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">নাম </label>
                                            <input type="text" name="name" class="form-control form-control-solid"
                                                   placeholder="নাম " value="{{ @Auth::user()->name_bn ?? old('name') }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">পিতার নাম </label>
                                            <input type="text" name="father_name" class="form-control form-control-solid" placeholder="পিতার নাম"
                                                   value="{{ @Auth::user()->father_name_bn }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">মাতার নাম </label>
                                            <input type="text" name="mother_name" class="form-control form-control-solid" placeholder="মাতার নাম"
                                                   value="{{ @Auth::user()->mother_name_bn }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">মোবাইল নম্বর</label>
                                            <input type="text" name="mobile_number" class="form-control form-control-solid" placeholder="মোবাইল নম্বর"
                                                   value="{{ @Auth::user()->mobile_number }}" required>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">জাতীয় পরিচয় পত্র নাম্বার</label>
                                            <input type="text" name="nid" class="form-control form-control-solid"
                                                   placeholder="জাতীয় পরিচয় পত্র নাম্বার" value="{{ @Auth::user()->nid }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">জন্ম সনদ নাম্বার</label>
                                            <input type="text" name="birth_certificate_no" class="form-control form-control-solid"
                                                   placeholder="জন্ম সনদ নাম্বার" value="{{ @Auth::user()->birth_certificate_no }}">
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">জেলা </label>
                                            <input type="text" name="district" class="form-control form-control-solid" placeholder="জেলা "
                                                   value="{{ @Auth::user()->userPermanentAddress->perDistrict->name }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">থানা </label>
                                            <input type="text" name="upazila" class="form-control form-control-solid" placeholder="থানা"
                                                   value="{{ @Auth::user()->userPermanentAddress->perUpazila->name }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">পোষ্ট অফিস </label>
                                            <input type="text" name="post_office" class="form-control form-control-solid" placeholder="পোষ্ট অফিস"
                                                   value="{{ @Auth::user()->userPermanentAddress->perPostOffice->name }}" required>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">ওয়ার্ড নং </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fw-bolder">ওয়ার্ড-</span>
                                                </div>
                                                <input type="number" name="ward_no" class="form-control form-control-solid" placeholder="ওয়ার্ড নং"
                                                       value="{{ Auth::user()->userPermanentAddress->perWard->name }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">মহল্লা </label>
                                            <input type="text" name="village" class="form-control form-control-solid" placeholder="মহল্লা"
                                                   value="{{ @Auth::user()->userPermanentAddress->perVillage->name }}" required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">হোল্ডিং নম্বর </label>
                                            <input type="text" name="holding_no" class="form-control form-control-solid" placeholder="হোল্ডিং নম্বর"
                                                   value="{{ @Auth::user()->userPermanentAddress->per_holding }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title fw-boldest" style="color: blue">মূল্যপরিশোধ মাধ্যম</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="payment_method" type="radio" value="bankDraft" required>
                                                <span class="fw-bolder ps-2 fs-6">পে অর্ডার / ব্যাংক ড্রাফট</span>
                                            </label>
                                            <label class="form-check form-check-custom form-check-inline form-check-solid mt-3">
                                                <input class="form-check-input" name="payment_method" type="radio" value="bkash" required>
                                                <span class="fw-bolder ps-2 fs-6">বিকাশ</span>
                                            </label>
                                            <label class="form-check form-check-custom form-check-inline form-check-solid mt-3">
                                                <input class="form-check-input" name="payment_method" type="radio" value="nagad" required>
                                                <span class="fw-bolder ps-2 fs-6">নগদ</span>
                                            </label>
                                            <label class="form-check form-check-custom form-check-inline form-check-solid mt-3">
                                                <input class="form-check-input" name="payment_method" type="radio" value="cash" required>
                                                <span class="fw-bolder ps-2 fs-6">ক্যাশ</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="form-group mb-4 col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width: 120px">
                                                            <span class="input-group-text fw-bolder">ফি</span>
                                                        </div>
                                                        <input type="number" name="certificate_fee"
                                                               value="{{ (empty(getOption('certificate_fee')) ? 0:getOption('certificate_fee')) }}"
                                                               step="any" min="1" class="form-control" placeholder="0.00" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text fw-bolder">টাকা</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group mb-4 col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width: 120px">
                                                            <span class="input-group-text fw-bolder">তথ্য কেন্দ্র ফি</span>
                                                        </div>
                                                        <input type="number" name="information_centre_fee"
                                                               value="{{ empty(getOption('information_centre_fee')) ? 0 : getOption('information_centre_fee') }}"
                                                               step="any" min="1" class="form-control" placeholder="0.00" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text fw-bolder">টাকা</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mobileBankChargeDiv d-none">
                                                <div class="form-group mb-4 col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width: 120px">
                                                            <span class="input-group-text fw-bolder">ব্যাঙ্কিং চার্জ ফি</span>
                                                        </div>
                                                        <input type="number" name="information_centre_fee"
                                                               value="{{ empty(getOption('mobile_banking_charge_fee')) ? 0 : getOption('mobile_banking_charge_fee') }}"
                                                               step="any" min="1" class="form-control" placeholder="0.00" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text fw-bolder">টাকা</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group mb-4 col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text fw-bolder" style="width: 120px">মোট ফি</span>
                                                        </div>
                                                        <input type="number" name="total_fee" value=""
                                                               step="any" min="1" class="form-control total_fee" placeholder="0.00" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text fw-bolder">টাকা</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="fw-bolder"><h3>Details</h3></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fw-bolder" style="width: 200px">তারিখ</span>
                                                </div>
                                                <input type="date" name="date" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bankDraftDiv d-none">
                                        <div class="row">
                                            <div class="form-group mb-4 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fw-bolder"
                                                              style="width: 200px">পে অর্ডার / ব্যাংক ড্রাফট নং</span>
                                                    </div>
                                                    <input type="text" name="bank_draft_no" class="form-control bank_draft_no"
                                                           placeholder="পে অর্ডার / ব্যাংক ড্রাফট নং">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-4 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fw-bolder" style="width: 200px">ব্যাংকের নাম</span>
                                                    </div>
                                                    <input type="text" name="bank_name" class="form-control bank_name" placeholder="ব্যাংকের নাম">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-4 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fw-bolder" style="width: 200px">শাখা</span>
                                                    </div>
                                                    <input type="text" name="branch_name" class="form-control branch_name" placeholder="শাখা">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-4 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fw-bolder" style="width: 200px">ব্যাংক স্লিপ ছবি</span>
                                                    </div>
                                                    <input type="file" name="bank_slip" class="form-control bank_slip">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mobileBankingDiv d-none">
                                        <div class="row">
                                            <div class="form-group mb-4 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fw-bolder" style="width: 200px">লেনদেন নম্বর লিখুন</span>
                                                    </div>
                                                    <input type="text" name="mobile_banking_number" class="form-control mobile_banking_number"
                                                           placeholder="লেনদেন নম্বর লিখুন">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-4 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fw-bolder" style="width: 200px">ট্রানস্যাকশন আইডি</span>
                                                    </div>
                                                    <input type="text" name="trx_id" class="form-control trx_id" placeholder="ট্রানস্যাকশন আইডি">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cashDiv d-none">
                                        <div class="row">
                                            <div class="form-group mb-4 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fw-bolder" style="width: 200px">রশিদ নম্বর</span>
                                                    </div>
                                                    <input type="text" name="rashid_no" class="form-control rashid_no" placeholder="রশিদ নম্বর">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-4 col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fw-bolder" style="width: 200px">সিরিয়াল নং</span>
                                                    </div>
                                                    <input type="text" name="serial_no" class="form-control serial_no" placeholder="সিরিয়াল নং">
                                                </div>
                                            </div>
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
    <script>
        $("input[name='payment_method']").click(function () {
            var payment_method = $("input[name='payment_method']:checked").val();
            if (payment_method) {
                if (payment_method == 'bankDraft') {
                    $('.bankDraftDiv').removeClass('d-none');
                    $('.mobileBankingDiv').addClass('d-none');
                    $('.cashDiv').addClass('d-none');

                    $('.bank_draft_no').attr('required', true);
                    $('.bank_name').attr('required', true);
                    $('.branch_name').attr('required', true);
                    $('.bank_slip').attr('required', true);
                    $('.mobile_banking_number').removeAttr('required');
                    $('.trx_id').removeAttr('required');
                    $('.rashid_no').removeAttr('required');
                    $('.serial_no').removeAttr('required');
                    $('.mobileBankChargeDiv').addClass('d-none');

                    var certificate_fee = "{{  (empty(getOption('certificate_fee')) ? 0:getOption('certificate_fee')) }}"
                    var information_centre_fee = "{{ (empty(getOption('information_centre_fee')) ? 0 : getOption('information_centre_fee')) }}"
                    var total_fee = parseInt(certificate_fee)+parseInt(information_centre_fee);
                    $('.total_fee').val(total_fee)
                } else if (payment_method == 'bkash' || payment_method == 'nagad') {
                    $('.bankDraftDiv').addClass('d-none');
                    $('.mobileBankingDiv').removeClass('d-none');
                    $('.cashDiv').addClass('d-none');

                    $('.mobile_banking_number').attr('required', true);
                    $('.trx_id').attr('required', true);
                    $('.bank_draft_no').removeAttr('required');
                    $('.bank_name').removeAttr('required');
                    $('.branch_name').removeAttr('required');
                    $('.rashid_no').removeAttr('required');
                    $('.serial_no').removeAttr('required');
                    $('.bank_slip').removeAttr('required');
                    $('.mobileBankChargeDiv').removeClass('d-none');

                    var certificate_fee = "{{  (empty(getOption('certificate_fee')) ? 0:getOption('certificate_fee')) }}"
                    var information_centre_fee = "{{ (empty(getOption('information_centre_fee')) ? 0 : getOption('information_centre_fee')) }}"
                    var mobile_banking_charge_fee = "{{ empty(getOption('mobile_banking_charge_fee')) ? 0 : getOption('mobile_banking_charge_fee') }}"
                    var total_fee = parseInt(certificate_fee)+parseInt(information_centre_fee)+parseInt(mobile_banking_charge_fee);
                    $('.total_fee').val(total_fee)
                } else if (payment_method == 'cash') {
                    $('.bankDraftDiv').addClass('d-none');
                    $('.mobileBankingDiv').addClass('d-none');
                    $('.cashDiv').removeClass('d-none');

                    $('.rashid_no').attr('required', true);
                    $('.serial_no').attr('required', true);
                    $('.bank_draft_no').removeAttr('required');
                    $('.bank_name').removeAttr('required');
                    $('.branch_name').removeAttr('required');
                    $('.mobile_banking_number').removeAttr('required');
                    $('.trx_id').removeAttr('required');
                    $('.bank_slip').removeAttr('required');
                    $('.mobileBankChargeDiv').addClass('d-none');

                    var certificate_fee = "{{  (empty(getOption('certificate_fee')) ? 0:getOption('certificate_fee')) }}"
                    var information_centre_fee = "{{ (empty(getOption('information_centre_fee')) ? 0 : getOption('information_centre_fee')) }}"
                    var total_fee = parseInt(certificate_fee)+parseInt(information_centre_fee);
                    $('.total_fee').val(total_fee)
                }
            }
        });
    </script>
@endpush

