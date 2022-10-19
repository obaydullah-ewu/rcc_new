@extends('admin.layouts.app')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid " id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <form action="" method="get">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative mr-2">
                                    <input type="search" class="form-control form-control-solid w-250px "
                                           name="search_string" id="search_string"
                                           placeholder="মৌজার নাম অনুসন্ধান করুন"
                                           value="{{ app('request')->search_string }}"/>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>অনুসন্ধান
                                    </button>
                                </div>

                                <!--end::Search-->
                            </form>
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                                   data-bs-target="#kt_modal_new_target">
                                    <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                              transform="rotate(-90 11.364 20.364)" fill="black"/>
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
                                    </svg>
                                </span>
                                    নতুন সংযুক্ত করুন </a>

                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3 ">
                                        #
                                    </div>
                                </th>
                                <th class="min-w-100px text-left">মৌজার নাম</th>
                                <th class="min-w-100px text-left">জমির (বর্তমান মূল্য)</th>
                                <th class="min-w-100px text-left">জমির (সুপারিশকৃত মূল্য)</th>
                                <th class="min-w-100px text-left">ঠিকানা</th>
                                <th class=" min-w-100px text-center">কার্যকলাপ</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">

                            @forelse($mouzas as $mouza)
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            {{ en2bn($loop->iteration + $mouzas->firstItem() - 1) }}
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    <td class="text-left">
                                        <span class="text-gray-800"> {{ @$mouza->name }}</span><br>
                                    </td>
                                    <td class="text-left">
                                        <span
                                            class="text-gray-800">ভরাট (প্রতি বর্গফুট) : <b>{{ en2bnNumber($mouza->land_nature_filled_present_rate) }}</b></span><br>
                                        <span
                                            class="text-gray-800">জলাশয় (প্রতি শতাংশ) : <b>{{ en2bnNumber($mouza->land_nature_pond_present_rate) }}</b></span>
                                    </td>
                                    <td class="text-left">
                                        <span
                                            class="text-gray-800">ভরাট (প্রতি বর্গফুট) : <b>{{ en2bnNumber($mouza->land_nature_filled_recommended_rate) }}</b></span><br>
                                        <span
                                            class="text-gray-800">জলাশয় (প্রতি শতাংশ) : <b>{{ en2bnNumber($mouza->land_nature_pond_recommended_rate) }}</b></span>
                                    </td>
                                    <td class="text-left">
                                        <span class="text-gray-800">উপজেলা নাম : {{ @$mouza->upazila->name }}</span><br>
                                        <span
                                            class="text-gray-800">জেলা নাম : {{ @$mouza->upazila->district->name }}</span><br>
                                        <span
                                            class="text-gray-800">বিভাগ নাম : {{ @$mouza->upazila->district->division->name }}</span>
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <!--begin::Edit-->
                                            <a href="#" data-item="{{ $mouza }}"
                                               data-updateurl="{{ route('admin.land_information.mouza.update', $mouza->id) }}"
                                               class="btn btn-icon btn-primary me-2 er edit" data-bs-toggle="modal"
                                               data-bs-target="#kt_modal_new_target_edit">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                              d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                              fill="black"></path>
                                                        <path
                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--end::Edit-->
                                            <!--begin::Delete-->
                                            <button class="btn btn-icon btn-danger deleteItem"
                                                    data-formid="delete_row_form_{{$mouza->id}}">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                             height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                fill="black"></path>
                                                            <path opacity="0.5"
                                                                  d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                  fill="black"></path>
                                                            <path opacity="0.5"
                                                                  d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                  fill="black"></path>
                                                        </svg>
                                                    </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <form
                                                action="{{ route('admin.land_information.mouza.delete', $mouza->id) }}"
                                                method="post" id="delete_row_form_{{ $mouza->id }}">
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                            <!--end::Delete-->
                                        </div>

                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">কোন রেকর্ড পাওয়া যায়নি</td>
                                </tr>
                            @endforelse

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        {{ @$mouzas->links('pagination::bootstrap-4') }}
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->

            <!--begin::Modal - New Modal-->
            <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <!--begin::Modal content-->
                    <div class="modal-content rounded">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                              transform="rotate(-45 6 17.3137)" fill="black"/>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                              transform="rotate(45 7.41422 6)" fill="black"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <!--begin:Form-->
                            <form id="kt_modal_new_target_form" class="form"
                                  action="{{ route('admin.land_information.mouza.store') }}" method="post">
                                @csrf
                                <!--begin::Heading-->
                                <div class="mb-13 text-center">
                                    <!--begin::Title-->
                                    <h1 class="mb-3 modalHeaderH1">মৌজা যুক্ত করুন</h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Heading-->
                                <div class="row">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <label class="required fs-6 fw-bolder mb-2">বিভাগ নাম</label>
                                        <select class="form-select form-select-solid division_id"
                                                data-hide-search="true" data-placeholder="Select a Division"
                                                name="division_id" required>
                                            <option value="">-- বিভাগ নাম --</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <label class="required fs-6 fw-bolder mb-2">জেলা নাম</label>
                                        <select class="form-select form-select-solid district_id" data-control="select2"
                                                data-hide-search="true" data-placeholder="Select a District"
                                                name="district_id" required>
                                            <option value="">-- জেলা নাম --</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                            <span class="required">উপজেলা নাম</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                               title="উপজেলা নাম"></i>
                                        </label>
                                        <!--end::Label-->
                                        <select class="form-select form-select-solid upazila_id" data-control="select2"
                                                data-hide-search="true" data-placeholder="Select a Upazila"
                                                name="upazila_id" required>
                                            <option value="">-- উপজেলা নাম --</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                            <span class="required">মৌজার নাম</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                               title="মৌজার নাম"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid"
                                               placeholder="মৌজার নাম" name="name"/>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <div class="form-group">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">ভরাট (প্রতি বর্গফুট) - <span class="btn-primary">(বর্তমান মূল্য)</span></span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="ভরাট (প্রতি বর্গফুট)"></i>
                                            </label>
                                            <!--end::Label-->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="land_nature_filled_present_rate"
                                                       placeholder="ভরাট (প্রতি বর্গফুট)"
                                                       class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <div class="form-group">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">জলাশয় (প্রতি শতাংশ) - <span class="btn-primary">(বর্তমান মূল্য)</span></span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="জলাশয় (প্রতি শতাংশ)"></i>
                                            </label>
                                            <!--end::Label-->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="land_nature_pond_present_rate"
                                                       placeholder="জলাশয় (প্রতি শতাংশ)"
                                                       class="form-control "/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <div class="form-group">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="">ভরাট (প্রতি বর্গফুট) - <span class="btn-secondary">(সুপারিশকৃত মূল্য)</span></span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="ভরাট (প্রতি বর্গফুট)"></i>
                                            </label>
                                            <!--end::Label-->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="land_nature_filled_recommended_rate"
                                                       placeholder="ভরাট (প্রতি বর্গফুট)"
                                                       class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <div class="form-group">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="">জলাশয় (প্রতি শতাংশ) - <span class="btn-secondary">(সুপারিশকৃত মূল্য)</span></span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="জলাশয় (প্রতি শতাংশ)"></i>
                                            </label>
                                            <!--end::Label-->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="land_nature_pond_recommended_rate"
                                                       placeholder="জলাশয় (প্রতি শতাংশ)"
                                                       class="form-control "/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">
                                        Reset
                                    </button>
                                    <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end:Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - New Modal-->

            <!--begin::Modal - Edit Modal-->
            <div class="modal fade" id="kt_modal_new_target_edit" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <!--begin::Modal content-->
                    <div class="modal-content rounded">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                              transform="rotate(-45 6 17.3137)" fill="black"/>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                              transform="rotate(45 7.41422 6)" fill="black"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <!--begin:Form-->
                            <form id="kt_modal_new_target_edit_form" class="form" action="" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <!--begin::Heading-->
                                <div class="mb-13 text-center">
                                    <!--begin::Title-->
                                    <h1 class="mb-3 modalHeaderH1">মৌজা আপডেট করুন</h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Heading-->
                                <div class="row">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <label class="required fs-6 fw-bolder mb-2">বিভাগ নাম</label>
                                        <select class="form-select form-select-solid division_id"
                                                data-hide-search="true" data-placeholder="Select a Division"
                                                name="division_id" required>
                                            <option value="">বিভাগ নাম</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <label class="required fs-6 fw-bolder mb-2">জেলা নাম</label>
                                        <select class="form-select form-select-solid district_id" data-control="select2"
                                                data-hide-search="true" data-placeholder="Select a District"
                                                name="district_id" required>
                                            <option value="">জেলা নাম</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                            <span class="required">উপজেলা নাম</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                               title="উপজেলা নাম"></i>
                                        </label>
                                        <!--end::Label-->
                                        <select class="form-select form-select-solid upazila_id" data-control="select2"
                                                data-hide-search="true" data-placeholder="Select a Upazila"
                                                name="upazila_id" required>
                                            <option value="">উপজেলা নাম</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                            <span class="required">মৌজার নাম</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                               title="মৌজার নাম"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid"
                                               placeholder="মৌজার নাম" name="name"/>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <div class="form-group">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">ভরাট (প্রতি বর্গফুট) - <span class="btn-primary">(বর্তমান মূল্য)</span></span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="ভরাট (প্রতি বর্গফুট)"></i>
                                            </label>
                                            <!--end::Label-->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="land_nature_filled_present_rate"
                                                       placeholder="ভরাট (প্রতি বর্গফুট)"
                                                       class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <div class="form-group">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="required">জলাশয় (প্রতি শতাংশ) - <span class="btn-primary">(বর্তমান মূল্য)</span></span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="জলাশয় (প্রতি শতাংশ)"></i>
                                            </label>
                                            <!--end::Label-->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="land_nature_pond_present_rate"
                                                       placeholder="জলাশয় (প্রতি শতাংশ)"
                                                       class="form-control "/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <div class="form-group">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="">ভরাট (প্রতি বর্গফুট) - <span class="btn-secondary">(সুপারিশকৃত মূল্য)</span></span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="ভরাট (প্রতি বর্গফুট)"></i>
                                            </label>
                                            <!--end::Label-->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="land_nature_filled_recommended_rate"
                                                       placeholder="ভরাট (প্রতি বর্গফুট)"
                                                       class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row col-md-6">
                                        <div class="form-group">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bolder mb-2">
                                                <span class="">জলাশয় (প্রতি শতাংশ) - <span class="btn-secondary">(সুপারিশকৃত মূল্য)</span></span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                   title="জলাশয় (প্রতি শতাংশ)"></i>
                                            </label>
                                            <!--end::Label-->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" step="any" min="0" name="land_nature_pond_recommended_rate"
                                                       placeholder="জলাশয় (প্রতি শতাংশ)"
                                                       class="form-control "/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">
                                        Reset
                                    </button>
                                    <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                        <span class="indicator-label">Update</span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end:Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - Edit Modal-->

        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@push('script')
    <script>
        $(function () {
            'use strict'
            $('.edit').on('click', function (e) {
                e.preventDefault();
                const modal = $('#kt_modal_new_target_edit');
                var division_id = $(this).data('item').division_id;
                var district_id = $(this).data('item').district_id
                var upazila_id = $(this).data('item').upazila_id

                modal.find('select[name=division_id]').val(division_id)
                modal.find('input[name=name]').val($(this).data('item').name)
                modal.find('input[name=land_nature_filled_present_rate]').val($(this).data('item').land_nature_filled_present_rate)
                modal.find('input[name=land_nature_pond_present_rate]').val($(this).data('item').land_nature_pond_present_rate)
                modal.find('input[name=land_nature_filled_recommended_rate]').val($(this).data('item').land_nature_filled_recommended_rate)
                modal.find('input[name=land_nature_pond_recommended_rate]').val($(this).data('item').land_nature_pond_recommended_rate)
                let route = $(this).data('updateurl');
                $('#kt_modal_new_target_edit_form').attr("action", route)
                modal.modal('show')

                //Get District
                $.ajax({
                    url: '{{route('location.getDistrict')}}',
                    type: "GET",
                    dataType: 'json',
                    data: {'division_id': division_id, 'district_id': district_id},
                    success: function (response) {
                        $('.district_id').html('<option value="">-- জেলা নাম --</option>');
                        $.each(response.districts, function (key, value) {
                            modal.find(".district_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        modal.find('.district_id').val(response.district_id)
                    }
                });

                //Get Upazila
                $.ajax({
                    url: '{{route('location.getUpazila')}}',
                    type: "GET",
                    dataType: 'json',
                    data: {'district_id': district_id, 'upazila_id': upazila_id},
                    success: function (response) {
                        $('.upazila_id').html('<option value="">-- উপজেলা নাম --</option>');
                        $.each(response.upazilas, function (key, value) {
                            modal.find(".upazila_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        modal.find('.upazila_id').val(response.upazila_id)
                    }
                });
            })
        })
    </script>

    <script>
        "use strict"
        $('.division_id').on('change', function () {
            var division_id = $(this).val();
            console.log(division_id)
            $.ajax({
                url: '{{route('location.getDistrict')}}',
                type: "GET",
                dataType: 'json',
                data: {'division_id': division_id},
                success: function (response) {
                    $('.district_id').html('<option value="">-- জেলা নাম --</option>');
                    $.each(response.districts, function (key, value) {
                        $(".district_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })

        $('.district_id').on('change', function () {
            var district_id = $(this).val();
            $.ajax({
                url: '{{route('location.getUpazila')}}',
                type: "GET",
                dataType: 'json',
                data: {'district_id': district_id},
                success: function (response) {
                    $('.upazila_id').html('<option value="">-- উপজেলা নাম --</option>');
                    $.each(response.upazilas, function (key, value) {
                        $(".upazila_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        })
    </script>
@endpush
