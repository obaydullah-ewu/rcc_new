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
                            <form class="form"
                                  action="{{ route('admin.renew-lease-application.assistantComputerInvestigationReport.store', $landLease->uuid) }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">তদন্ত তারিখ (ইংরেজি)</label>
                                            <input type="date" name="investigation_english_date" class="form-control form-control-solid"
                                                   value="{{ old('investigation_english_date') ?? @$assistantComputer->investigation_english_date }}"
                                                   required>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">তদন্ত তারিখ (বাংলায়)</label>
                                            <input type="text" name="investigation_bangla_date" class="form-control form-control-solid"
                                                   value="{{ old('investigation_bangla_date') ?? @$assistantComputer->investigation_bangla_date }}"
                                                   placeholder="উদাঃ ২৫শে আশ্বিন ১৪২৯" required>
                                        </div>

                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">ভ্যাট</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="vat" id="vat" class="form-control form-control-solid"
                                                       placeholder="ভ্যাট" value="{{ old('vat') ?? @$assistantComputer->vat }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">আয়কর</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="tax" id="tax" class="form-control form-control-solid"
                                                       placeholder="আয়কর" value="{{ old('tax') ?? @$assistantComputer->tax }}" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">স্ট্যাম্প মূল্য</label>
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="stamp_money" class="form-control form-control-solid"
                                                       placeholder="স্ট্যাম্প মূল্য" value="{{ old('stamp_money') ?? @$assistantComputer->stamp_money }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <label class="required fw-bolder">পত্র প্রাপ্তির কত দিনের মধ্যে জমা দিতে হবে?</label>
                                            <div class="input-group input-group-solid">
                                                <input type="number" min="0" name="deposit_money_submit_day" class="form-control form-control-solid"
                                                       placeholder="কত দিন" value="{{ old('deposit_money_submit_day') ?? @$assistantComputer->deposit_money_submit_day }}" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer ">
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

@endpush
