@extends('admin.layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="row g-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::Mixed Widget 14-->
                        <div class="card card-xxl-stretch mb-5 mb-xl-8" style="background-color: #F7D9E3">
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <!--begin::Title-->
                                    <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">মোট অ্যাডমিন</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Stats-->
                                <div class="pt-8">
                                    <!--begin::Number-->
                                    <span class="text-dark fw-bolder fs-3x me-2 lh-0">{{ en2bn($total_admin) }}</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Stats-->
                            </div>
                        </div>
                        <!--end::Mixed Widget 14-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::Mixed Widget 14-->
                        <div class="card card-xxl-stretch mb-5 mb-xl-8" style="background-color: #CBF0F4">
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <!--begin::Title-->
                                    <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">মোট সদস্য</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Stats-->
                                <div class="pt-5">
                                    <!--begin::Number-->
                                    <span class="text-dark fw-bolder fs-3x me-2 lh-0">{{ en2bn($total_member) }}</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Stats-->
                            </div>
                        </div>
                        <!--end::Mixed Widget 14-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::Mixed Widget 14-->
                        <div class="card card-xxl-stretch mb-5 mb-xl-8" style="background-color: #CBD4F4">
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <!--begin::Title-->
                                    <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">মোট পদবী</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Stats-->
                                <div class="pt-8">
                                    <!--begin::Number-->
                                    <span class="text-dark fw-bolder fs-3x me-2 lh-0">{{ en2bn($total_designation) }}</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Stats-->
                            </div>
                        </div>
                        <!--end::Mixed Widget 14-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-5">
                        <!--begin::Charts Widget 3-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">নাগরিক সনদপত্র অনুরোধ চার্ট</span>
                                    <span class="text-muted fw-bold fs-7">মোট 100 জন সনদপত্রের অনুরোধ এসেছে</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Chart-->
                                <div id="citizenChart" style="height: 350px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Charts Widget 3-->
                    </div>
                    <div class="col-xl-7">
                        <!--begin::Charts Widget 1-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">সদস্য পরিসংখ্যান চার্ট</span>
                                    <span class="text-muted fw-bold fs-7">মোট {{ en2bn(@$total_member) }} জন সদস্য যুক্ত হয়েছেন</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Chart-->
                                <div id="memberChart" style="height: 350px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Charts Widget 1-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@push('script')
    <script>
        var options = {
            series: [44, 55, 12],
            chart: {
                width: 380,
                type: 'donut',
            },
            plotOptions: {
                pie: {
                    startAngle: -90,
                    endAngle: 270
                }
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'gradient',
            },
            legend: {
                formatter: function (val, opts) {
                    return val + " - " + opts.w.globals.series[opts.seriesIndex] + " জন"
                }
            },
            title: {
                text: ''
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            labels: ['Pending', 'Approved', 'Cancelled']
        };

        var chart = new ApexCharts(document.querySelector("#citizenChart"), options);
        chart.render();

        var options = {
            series: [{
                name: 'মোট সদস্য',
                data: [12, 55, 57, 56, 61, 58, 63, 60, 66, 12, 34, 23]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ["{{ getBanglaMonth('Jan') }}", "{{ getBanglaMonth('Feb') }}", "{{ getBanglaMonth('Mar') }}", "{{ getBanglaMonth('Apr') }}", "{{ getBanglaMonth('May') }}", "{{ getBanglaMonth('June') }}",
                    "{{ getBanglaMonth('July') }}", "{{ getBanglaMonth('Aug') }}", "{{ getBanglaMonth('Sep') }}", "{{ getBanglaMonth('Oct') }}", "{{ getBanglaMonth('Nov') }}", "{{ getBanglaMonth('Dec') }}"],
            },
            yaxis: {
                title: {
                    text: ''
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return  val + ' জন'
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#memberChart"), options);
        chart.render();

    </script>
@endpush
