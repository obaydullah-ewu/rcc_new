@extends('admin.layouts.app')

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
                                    <input type="search" class="form-control form-control-solid w-200px " name="search_string" id="search_string"
                                           placeholder="অনুসন্ধান করুন" value="{{ app('request')->search_string }}"/>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>অনুসন্ধান</button>
                                </div>

                                <!--end::Search-->
                            </form>
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <a href="{{ route('admin.land-lease.create') }}" class="btn btn-primary er fs-6 px-8 py-4">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                              fill="black"/>
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
                                    </svg>
                                </span>
                                    সংযুক্ত করুন
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
                                <th>ছবি</th>
                                <th class="min-w-100px">নাম</th>
                                <th class="min-w-125px">ইমেইল</th>
                                <th class="min-w-125px">মোবাইল নম্বর</th>
                                <th class="min-w-125px">অবস্থা</th>
                                <th class=" min-w-100px" colspan="2">অ্যাকশন</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">

                            @forelse(@$landLeases as $landLease)
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    <td>
                                        <div class="symbol symbol-70px">
                                            @if($landLease->applicant_image)
                                                <img src="{{ getFile($landLease->applicant_image)  }}" alt="">
                                            @else
                                                <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="">
                                            @endif
                                        </div>
                                    </td>
                                    <td><span class="text-gray-800">{{ $landLease->applicant_name_en }} </span></td>
                                    <td><span class="text-gray-800">{{ $landLease->applicant_email }} </span></td>
                                    <td><span class="text-gray-800">{{ $landLease->mobile_number }} </span></td>
                                    <td class="text-uppercase">
                                        @if($landLease->application_status == LAND_LEASE_APPLICATION_STATUS_PENDING)
                                            <span class="badge badge-light-warning">Pending </span>
                                        @elseif($landLease->application_status == LAND_LEASE_APPLICATION_STATUS_APPROVED)
                                            <span class="badge badge-light-success">Approved</span>
                                        @elseif($landLease->application_status == LAND_LEASE_RENEWAL_STATUS_CANCELLED)
                                            <span class="badge badge-light-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('leaseApplication', $landLease->id) }}" target="_blank"
                                           class="btn-sm btn btn-icon btn-bg-primary me-2">
                                            <button class="btn btn-primary">Application</button>
                                        </a>
                                    </td>
                                    <td class="">
                                        <div class="d-flex ">
                                            <!--begin::Show-->
                                            <a href="{{ route('admin.land-lease.show', $landLease->id) }}" target="_blank"
                                               class="btn btn-icon btn-bg-secondary me-2">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!--end::Show-->
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

                        {{ @$landLeases->links('pagination::bootstrap-4') }}

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



