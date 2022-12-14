@extends('user.layouts.app')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
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
                                    <div class="form-group me-2">
                                        <select name="search_status" class="form-select form-select-solid">
                                            <option value="">--Select Option</option>
                                            <option value="1" {{ app('request')->search_status == 1 ? 'selected':'' }}>Pending</option>
                                            <option value="2" {{ app('request')->search_status == 2 ? 'selected':'' }}>Approved</option>
                                            <option value="3" {{ app('request')->search_status == 3 ? 'selected':'' }}>Cancelled</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Search</button>
                                </div>

                                <!--end::Search-->
                            </form>
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <a href="{{ route('user.citizenship.add') }}" class="btn btn-primary er fs-6 px-8 py-4">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
                                    </svg>
                                </span>
                                    ???????????? ????????????????????? ????????????
                                </a>
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
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        #
                                    </div>
                                </th>
                                <th class="min-w-100px">???????????????</th>
                                <th class="min-w-125px">????????????????????? ??????????????????????????? </th>
                                <th class="min-w-125px">??????????????????????????? </th>
                                <th class=" min-w-100px">???????????????????????????</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">

                            @forelse(@$citizenships as $citizenship)
                                <!--begin::Table row-->
                                <tr class="ms-2">
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            {{ en2bn($loop->iteration) }}
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    <td>
                                        ???????????? <b class="text-black">{{ $citizenship->name }}</b><br>
                                        ??????????????? ???????????? <b class="text-black">{{ $citizenship->father_name }}</b><br>
                                        ??????????????? ???????????? <b class="text-black">{{ $citizenship->mother_name }}</b>
                                    </td>
                                    <td>
                                        ????????????????????? <b class="text-black">
                                        {{ $citizenship->payment_method == 'bankDraft' ? '?????? ?????????????????? / ?????????????????? ??????????????????' : null}}
                                        {{ $citizenship->payment_method == 'bkash' ? '???????????????' : null}}
                                        {{ $citizenship->payment_method == 'nagad' ? '?????????' : null}}
                                        {{ $citizenship->payment_method == 'cash' ? '???????????????' : null}}
                                        </b>
                                        <br>
                                        @if($citizenship->payment_method == 'bkash' || $citizenship->payment_method == 'nagad')
                                            ?????????????????? ?????????????????? <b class="text-black">{{ $citizenship->mobile_banking_number }}</b><br>
                                            ???????????????????????????????????? ??????????????? <b class="text-black">{{ $citizenship->trx_id }}</b><br>
                                        @elseif($citizenship->payment_method == 'cash')
                                            ???????????? ?????????????????? <b class="text-black">{{ $citizenship->rashid_no }}</b><br>
                                            ????????????????????? ????????? <b class="text-black">{{ $citizenship->serial_no }}</b><br>
                                        @endif
                                        ??????????????? ????????????????????? <b class="text-black">{{ en2bn($citizenship->total_fee) . ' ????????????' }}</b><br>
                                        ?????????????????? <b class="text-black">{{ getBanglaDateFormat($citizenship->date) }}</b><br>
                                        ?????????????????? ????????? <b class="text-black">{{ en2bn($citizenship->ward_no) }}</b><br>
                                        @if($citizenship->payment_method == 'bankDraft')
                                            <a href="{{ getFile($citizenship->bank_slip) }}" class="badge bg-success">Click for Bank Slip</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($citizenship->status == CITIZENSHIP_CERTIFICATE_STATUS_PENDING)
                                            <span class="btn badge bg-warning fs-8 fw-bold my-2">Pending</span>
                                        @elseif($citizenship->status == CITIZENSHIP_CERTIFICATE_STATUS_APPROVED)
                                            <span class="btn badge bg-success fs-8 fw-bold my-2">Approved</span>
                                        @elseif($citizenship->status == CITIZENSHIP_CERTIFICATE_STATUS_CANCELLED)
                                        <span class="btn badge bg-danger fs-8 fw-bold my-2">Cancelled</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        <div class="d-flex flex-column">
                                            <!--begin::Show-->
                                            <a href="{{ route('citizenship.application.pdf', $citizenship->id) }}" class="btn btn-info" style="width: 150px">
                                                ??????????????? ?????????
                                            </a>
                                            <!--end::Show-->
                                            <!--begin::Show-->
                                            <a href="{{ route('citizenship.paymentDetails.pdf', $citizenship->id) }}" class="btn btn-info mt-2" style="width: 150px">
                                                ????????????????????? ????????????
                                            </a>
                                            <!--end::Show-->
                                            @if($citizenship->status == CITIZENSHIP_CERTIFICATE_STATUS_APPROVED)
                                                <!--begin::Show-->
                                                <a href="{{ route('citizenship.certificate.pdf', $citizenship->id) }}" class="btn btn-info mt-2" style="width: 150px">
                                                    ????????? ?????????????????????
                                                </a>
                                                <!--end::Show-->
                                            @endif
                                        </div>

                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">????????? ?????????????????? ?????????????????? ??????????????????</td>
                                </tr>
                            @endforelse

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->

                        {{ @$citizenships->links('pagination::bootstrap-4') }}

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection



