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
                                <th class="min-w-100px">?????????????????????????????? ???????????????</th>
                                <th class="min-w-100px">??????????????????</th>
                                <th class="min-w-125px">????????????????????? ???????????????????????????</th>
                                <th class="min-w-125px">???????????????????????????</th>
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
                                        ??????????????? ???????????? <b class="text-black">{{ $citizenship->mother_name }}</b><br>
                                        ?????????????????? ?????????????????? <b class="text-black">{{ $citizenship->mobile_number }}</b><br>
                                    </td>
                                    <td>
                                        ???????????? ???????????? <b class="text-black">{{ $citizenship->district }}</b><br>
                                        ???????????? ???????????? <b class="text-black">{{ $citizenship->upazila }}</b><br>
                                        @if($citizenship->post_office) ??????????????? ??????????????? <b class="text-black">{{ $citizenship->post_office }}</b><br> @endif
                                        ?????????????????? ????????? <b class="text-black">{{ en2bn($citizenship->ward_no) }}</b><br>
                                        @if($citizenship->village) ????????????????????? <b class="text-black">{{ $citizenship->village }}</b><br> @endif
                                        @if($citizenship->holding_no) ????????????????????? ?????????????????? <b class="text-black">{{ $citizenship->holding_no }}</b><br> @endif
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
                                        @if($citizenship->payment_method == 'bankDraft')
                                            <a href="{{ getFile($citizenship->bank_slip) }}" class="badge bg-success">Click for Bank Slip</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                @if($citizenship->status == CITIZENSHIP_CERTIFICATE_STATUS_PENDING)
                                                    <span class="btn badge bg-warning fs-8 fw-bold my-2">Pending</span>
                                                @elseif($citizenship->status == CITIZENSHIP_CERTIFICATE_STATUS_APPROVED)
                                                    <span class="btn badge bg-success fs-8 fw-bold my-2">Approved</span>
                                                @elseif($citizenship->status == CITIZENSHIP_CERTIFICATE_STATUS_CANCELLED)
                                                    <span class="btn badge bg-danger fs-8 fw-bold my-2">Cancelled</span>
                                                @endif
                                            </div>
                                            <div>
                                                <ul class="action-list">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-sharp fa-solid fa-ellipsis-vertical"></i>Change Status
                                                        </a>
                                                        <span id="hidden_id" style="display: none">{{$citizenship->id}}</span>
                                                        <ul class="dropdown-menu">
                                                            @if($citizenship->status != CITIZENSHIP_CERTIFICATE_STATUS_PENDING)
                                                                <li><a class="product_status dropdown-item"
                                                                       data-status="{{CITIZENSHIP_CERTIFICATE_STATUS_PENDING}}">{{ __('Pending') }}</a>
                                                                </li>
                                                            @endif
                                                            @if($citizenship->status != CITIZENSHIP_CERTIFICATE_STATUS_APPROVED)
                                                                <li><a class="product_status dropdown-item"
                                                                       data-status="{{CITIZENSHIP_CERTIFICATE_STATUS_APPROVED}}">{{ __('Approved') }}</a>
                                                                </li>
                                                            @endif
                                                            @if($citizenship->status != CITIZENSHIP_CERTIFICATE_STATUS_CANCELLED)
                                                                <li><a class="product_status dropdown-item"
                                                                       data-status="{{ CITIZENSHIP_CERTIFICATE_STATUS_CANCELLED }}">{{ __('Cancelled') }}</a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

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


@push('script')
    <script>
        $(".product_status").click(function () {
            var id = $(this).closest('tr').find('#hidden_id').html();
            var status = $(this).data('status');
            Swal.fire({
                title: "Are you sure to change status?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Change it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.citizenship.changeStatus')}}",
                        data: {"status": status, "id": id, "_token": "{{ csrf_token() }}",},
                        datatype: "json",
                        success: function (data) {
                            toastr.success('', "{{ __('Status has been updated') }}");
                            setTimeout(() => {
                                location.reload()
                            }, 1000);
                        },
                        error: function () {
                            alert("Error!");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                }
            });
        });
    </script>
@endpush
