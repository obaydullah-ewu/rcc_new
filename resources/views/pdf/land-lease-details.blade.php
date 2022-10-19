<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- links of CSS -->
    <link rel="stylesheet" href="{{ asset('assets/land_details/css/style.css') }}">
    <title>{{ @$pageTitle }}</title>
</head>
<body>
<button id="printPageButton" onClick="window.print();">Print</button>
<div class="lease-header">
    <div class="container">
        <h2>জমি লিজের বিবরণ</h2>
    </div>
</div>

<div class="information-body">
    <div class="container">
        <h3>(১) আবেদনকারীর ঠিকানা :</h3>
        <div class="img-area">
            <img src="{{ getFile($landLease->applicant_image) }}" alt="photo" height="200px" width="165px">
        </div>
        <div class="user-info-list">
            <ul class="info-list">
                <li><span>০১. আবেদনকারী নাম (বাংলায়) </span> <span>{{ $landLease->applicant_name_bn }}</span> </li>
                <li class="name-en"><span>আবেদনকারী নাম (ইংরেজীতে) </span> <span>{{ $landLease->applicant_name_en }}</span> </li>
                <li><span>০২. পিতার নাম </span> <span>{{ $landLease->father_name }}</span> </li>
                <li><span>০৩. মোবাইল নম্বর </span> <span>{{ en2bn($landLease->mobile_number) }}</span> </li>
                <li><span>০৪.  জাতীয় পরিচয় পত্র নাম্বার </span> <span>{{ en2bn($landLease->nid) }}</span> </li>
            </ul>
            <ul class="info-list">
                <li><span>০৫. জন্ম তারিখ </span> <span>{{ getBanglaDateFormat(getDateFormat($landLease->birth_of_date)) }} </span> </li>
                <li><span>০৬. জেলা </span> <span>{{ @$landLease->applicantDistrict->name }}</span> </li>
                <li><span>০৭. উপজেলা </span> <span>{{ @$landLease->applicantUpazila->name }}</span> </li>
                <li><span>০৮. পোস্ট অফিস </span> <span>{{ @$landLease->applicantPostOffice->name }}</span> </li>
                <li><span>০৯. গ্রাম </span> <span>{{ @$landLease->applicantVillage->name }}</span> </li>
            </ul>
        </div>
        <h3 class="mt-50">(২) প্রার্থিতর্থি জমির তফসিল :</h3>
        <table class="tofsil-table">
            <tr>
                <th>উপজেলা নাম</th>
                <th>মৌজার নাম</th>
                <th>খতিয়ান নং</th>
                <th>দাগ নং</th>
                <th>ইজারার জন্য জমির পরিমান</th>
            </tr>
            <tr>
                <td>{{ @$landLease->landUpazila->name }}</td>
                <td>{{ @$landLease->landMouza->name }}</td>
                <td>{{ @$landLease->landKhotiyan->name }}</td>
                <td>{{ en2bn(@$landLease->landDag->dag_no) }}</td>
                <td>{{ en2bn(@$landLease->landAmount->amount) }}
                    @if(@$landLease->landAmount->land_nature == LAND_NATURE_FILLED)
                        বর্গফুট (ভরাট)
                    @elseif(@$landLease->landAmount->land_nature == LAND_NATURE_POND)
                        শতাংশ (জলাশয়)
                    @endif</td>
            </tr>
        </table>
        <h3 class="mt-50">(৩) জমির চৌহদ্দি :</h3>
        <div class="area-details">
            <div class="area-direction">
                <ul class="info-list">
                    <li><span>উত্তর</span><span>{{ $landLease->land_north }}</span></li>
                    <li><span>দক্ষিণ</span><span>{{ $landLease->land_south }}</span></li>
                    <li><span>পূর্ব</span><span>{{ $landLease->land_east }}</span></li>
                    <li><span>পশ্চিম</span><span>{{ $landLease->land_west }}</span></li>
                </ul>
            </div>
            <div>
                <ul class="info-list">
                    <li><span>প্রথম ইজারার তারিখ </span> <span>{{ getBanglaDateFormat(getDateFormat($landLease->first_date_of_lease)) }}</span> </li>
                    <li><span>প্রথম সেশন ইয়ার </span> <span>{{ en2bn($landLease->first_session_lease) }}</span> </li>
                    <li><span>শেষ ইজারার তারিখ</span> <span>{{ getBanglaDateFormat(getDateFormat($landLease->last_date_of_lease)) }}</span> </li>
                    <li><span>শেষ সেশন ইয়ার</span> <span>{{ en2bn($landLease->last_session_lease) }}</span> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
