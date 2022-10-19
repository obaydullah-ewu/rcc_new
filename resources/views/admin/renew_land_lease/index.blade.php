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
                                    <input type="search" class="form-control form-control-solid w-200px "
                                           name="search_string" id="search_string" placeholder="নাম অনুসন্ধান করুন"
                                           value="{{ app('request')->search_string }}"/>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>অনুসন্ধান
                                    </button>
                                </div>

                                <!--end::Search-->
                            </form>
                        </div>
                        <!--begin::Card title-->

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
                                <th class="min-w-125px text-center">অবস্থা</th>
                                <th class=" min-w-100px text-center">অ্যাকশন</th>
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
                                    <td>
                                        ইংরেজীতে: <span class="text-gray-800 fw-bolder">{{ $landLease->applicant_name_en }} </span><br>
                                        বাংলায়: <span class="text-gray-800 fw-bolder">{{ $landLease->applicant_name_bn }} </span><br>
                                    </td>
                                    <td><span class="text-gray-800">{{ $landLease->applicant_email }} </span></td>
                                    <td><span class="text-gray-800">{{ $landLease->mobile_number }} </span></td>
                                    <td class="text-uppercase text-center">

                                        @if($landLease->approval_cycle_id == 1)
                                            <span class="badge badge-light-danger">
                                                নবায়নের আবেদন করা হয়েছে
                                            </span>
                                        @elseif($landLease->approval_cycle_id == 2)
                                            <span class="badge badge-light-info">
                                                সার্ভেয়ার গ্রহণ করেছেন। বরাদ্দ পত্র তৈরির প্রস্তুতির অপেক্ষমান
                                            </span>
                                        @elseif($landLease->approval_cycle_id == 3)
                                            <span class="badge badge-light-success">
                                                প্রশাসনিক কর্মকর্তা গ্রহণ করেছেন
                                            </span>
                                        @elseif($landLease->approval_cycle_id == 4)
                                            <span class="badge badge-light-dark">
                                                উচ্চমান/নিন্মমান সহকারী কাম কম্পিউটার গ্রহণ করেছেন
                                            </span>
                                        @elseif($landLease->approval_cycle_id == 5)
                                            <span class="badge badge-light-info">
                                                প্রধান নির্বাহী কর্মকর্তা গ্রহণ করেছেন
                                            </span>
                                        @elseif($landLease->approval_cycle_id == 6)
                                            <button class="btn btn-success btn-sm">
                                                অনুমোদিত
                                            </button>
                                        @endif

                                        <div class="mt-2">
                                            @php $roleTrue = false @endphp
                                            @if($landLease->approval_cycle_id == 1 && Auth::guard('admin')->user()->role_id == 1)
                                                @php
                                                    $roleTrue = true;
                                                    $approval_cycle_forward = 'সার্ভেয়ার এর কাছে পাঠান';
                                                    $approval_cycle_id_forward = 2;
                                                @endphp
                                            @elseif($landLease->approval_cycle_id == 2 && Auth::guard('admin')->user()->role_id == 2)
                                                @php
                                                    $roleTrue = true;
                                                    $approval_cycle_forward = 'প্রশাসনিক কর্মকর্তা এর কাছে পাঠান';
                                                    $approval_cycle_id_forward = 3;
                                                @endphp
                                            @elseif($landLease->approval_cycle_id == 3 && Auth::guard('admin')->user()->role_id == 3)
                                                @php
                                                    $roleTrue = true;
                                                    $approval_cycle_forward = 'উচ্চমান / নিন্মমান সহকারী কাম কম্পিউটার এর কাছে পাঠান';
                                                    $approval_cycle_backward = 'সার্ভেয়ার এর কাছে পাঠান';
                                                    $approval_cycle_main = 'প্রধান নির্বাহী কর্মকর্তা এর কাছে পাঠান';
                                                    $approval_cycle_id_main = 5;
                                                    $approval_cycle_id_forward = 4;
                                                    $approval_cycle_id_backward = 2;
                                                @endphp
                                            @elseif($landLease->approval_cycle_id == 4 && Auth::guard('admin')->user()->role_id == 4)
                                                @php
                                                    $roleTrue = true;
                                                    $approval_cycle_backward = 'প্রশাসনিক কর্মকর্তা এর কাছে পাঠান';
                                                    $approval_cycle_id_backward = 3;
                                                @endphp
                                            @elseif($landLease->approval_cycle_id == 5 && Auth::guard('admin')->user()->role_id == 1)
                                                @php
                                                    $roleTrue = true;
                                                    $approval_cycle_forward = 'আবেদনটি অনুমোদন দিন';
                                                    $approval_renewal_status = 'approved';
                                                    $approval_cycle_backward = 'প্রশাসনিক কর্মকর্তা এর কাছে পাঠান';
                                                    $approval_cycle_id_backward = 3;
                                                @endphp
                                            @endif
                                            @if($roleTrue)
                                                <div class="d-flex flex-column">
                                                    @if(@$approval_cycle_forward)
                                                    <button class="btn btn-success btn-sm approval_cycle_id"
                                                            data-land_lease_id="{{ $landLease->id }}"
                                                            data-approval_cycle_id="{{ @$approval_cycle_id_forward }}" data-renewal_status="{{ @$approval_renewal_status ? $approval_renewal_status:'pending' }}">
                                                        {{ @$approval_cycle_forward }}
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                    </button>
                                                    @endif
                                                    @if(@$approval_cycle_backward)
                                                    <button class="btn btn-secondary btn-sm approval_cycle_id mt-2"
                                                            data-land_lease_id="{{ $landLease->id }}"
                                                            data-approval_cycle_id="{{ @$approval_cycle_id_backward }}"
                                                            data-renewal_status="pending">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Left-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                <rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/>
                                                                <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                        {{ @$approval_cycle_backward }}
                                                    </button>
                                                    @endif
                                                    @if(@$approval_cycle_main)
                                                    <button class="btn btn-primary btn-sm approval_cycle_id mt-2"
                                                            data-land_lease_id="{{ $landLease->id }}"
                                                            data-approval_cycle_id="{{ $approval_cycle_id_main }}"
                                                            data-renewal_status="pending">
                                                        {{ @$approval_cycle_main }}
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                    </button>
                                                    @endif
                                                    <button class="btn btn-danger btn-sm approval_cycle_id mt-2"
                                                            data-land_lease_id="{{ $landLease->id }}"
                                                            data-approval_cycle_id="{{ $landLease->approval_cycle_id }}"
                                                            data-renewal_status="cancelled">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Deleted-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                        বাতিল করুন
                                                    </button>
                                                    @if(Auth::guard('admin')->user()->role_id == 2)
                                                        <a href="{{ route('admin.renew-lease-application.surveyorInvestigationReport', $landLease->uuid) }}" class="btn btn-primary btn-sm mt-2"
                                                                data-land_lease_id="{{ $landLease->id }}">
                                                            @if(@$landLease->surveyorInvestigationReport)
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                                    </svg>
                                                                </span>
                                                                <b>সার্ভেয়ার</b> তদন্ত প্রতিবেদন হালনাগাদ করুন
                                                            @else
                                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
                                                                <b>সার্ভেয়ার</b> তদন্ত প্রতিবেদন তৈরী করুন
                                                            @endif
                                                        </a>
                                                    @endif
                                                    @if(@$landLease->surveyorInvestigationReport)
                                                    <a href="{{ route('admin.renew-lease-application.surveyorInvestigationReport.show', $landLease->uuid) }}" class="btn btn-secondary btn-sm mt-2"
                                                            data-land_lease_id="{{ $landLease->id }}">
                                                       <i class="fas fa-eye"></i>
                                                        <b>সার্ভেয়ার</b> তদন্ত প্রতিবেদন দেখুন
                                                    </a>
                                                    @endif
                                                    @if(Auth::guard('admin')->user()->role_id == 4)
                                                        <a href="{{ route('admin.renew-lease-application.assistantComputerInvestigationReport', $landLease->uuid) }}" class="btn btn-primary btn-sm mt-2"
                                                           data-land_lease_id="{{ $landLease->id }}">
                                                            @if(@$landLease->assistantComputerInvestigationReport)
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                                    </svg>
                                                                </span>
                                                                <b>সহকারী কাম কম্পিউটার</b> তদন্ত প্রতিবেদন হালনাগাদ করুন
                                                            @else
                                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                                                    </g>
                                                                </svg><!--end::Svg Icon--></span>
                                                                <b>সহকারী কাম কম্পিউটার</b> তদন্ত প্রতিবেদন তৈরী করুন
                                                            @endif
                                                        </a>
                                                    @endif
                                                    @if(@$landLease->surveyorInvestigationReport && (Auth::guard('admin')->user()->role_id != 2))
                                                        <a href="{{ route('admin.renew-lease-application.assistantComputerInvestigationReport.show', $landLease->uuid) }}" class="btn btn-secondary btn-sm mt-2"
                                                           data-land_lease_id="{{ $landLease->id }}">
                                                            <i class="fas fa-eye"></i>
                                                            <b>সহকারী কাম কম্পিউটার</b> তদন্ত প্রতিবেদন দেখুন
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <div>
                                                <a href="{{ route('landLease.details', $landLease->id) }}"
                                                   target="_blank" class="btn-sm btn btn-icon btn-bg-secondary me-2">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
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

@push('script')
    <script>
        $(".approval_cycle_id").click(function () {
            var land_lease_id = $(this).data('land_lease_id');
            var approval_cycle_id = $(this).data('approval_cycle_id');
            var renewal_status = $(this).data('renewal_status');
            console.log(renewal_status)
            Swal.fire({
                title: "আপনি কি অবস্থা পরিবর্তন করতে নিশ্চিত?",
                text: "আপনি এটি ফিরিয়ে আনতে পারবেন না!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "হ্যাঁ",
                cancelButtonText: "না",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.renew-lease-application.approvalCycleRoleIdChange') }}",
                        data: {
                            "land_lease_id": land_lease_id,
                            "approval_cycle_id": approval_cycle_id,
                            "renewal_status": renewal_status,
                            "_token": "{{ csrf_token() }}",
                        },
                        datatype: "json",
                        success: function (data) {
                            toastr.success('Application status has been updated');
                            location.reload();
                        },
                        error: function () {
                            alert("Error!");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                    //
                }
            });
        });
    </script>
@endpush


