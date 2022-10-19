<!DOCTYPE html>
<html lang="ban">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- links of CSS -->
    <link rel="stylesheet" href="{{ asset('assets/surveyor_report/css/style.css') }}">

    <title>Govt. Notice</title>
</head>
<body>

<button id="printPageButton" onClick="window.print();">Print</button>

<div class="topbar">
    <div class="container">
        <div class="topbar-content grid">
            <div class="logo">
                <img src="{{ asset('assets/surveyor_report/images/logo.png') }}" alt="logo">
            </div>
            <div class="main-title">
                <h4>জেলা পরিষদ, {{ @$landLease->landDistrict->name }}</h4>
                <a href="www.zpnarayanganj.gov.bd" target="_blank">www.zpnarayanganj.gov.bd</a>
            </div>
            <div class="mojib-logo">
                <img src="{{ asset('assets/surveyor_report/images/mojib-logo.png') }}" alt="Mujib Logo">
                <h4>শেখ হাসিনার মূলনীতি <br> গ্রাম শহরের উন্নতি</h4>
            </div>
        </div>
    </div>
</div>

<div class="main-body">
    <div class="container">
        <div class="main-body-top-area">
            <div class="letter-no">
                <p>স্মারক নং-জেঃপঃনাঃ/৪১সাঃ প্রঃ লীজ/{{ en2bn(getDateYear($landLease->first_date_of_lease)) }}
                    -{{ en2bn(getDateYear($surveyor->investigation_english_date)) }}/</p>
            </div>
            <div class="issue-date">
                <p>{{ $surveyor->investigation_bangla_date }}</p>
                <p>{{ getBanglaDateFormat($surveyor->investigation_english_date) }}</p>
            </div>
        </div>
        <div class="notice-sub">
            <p>বিষয়ঃ উপর্যুক্ত বিষয ও সুত্রের প্রেক্ষিতে জানানো যাচ্ছে যে, আপনার আবেদনের প্রেক্ষিতে {{ @$landLease->landDistrict->name }} জেলা
                পরিষদের মালিকানাধীন {{ @$landLease->mouza->name }} মৌজার আপনার আবেদনের প্রেক্ষিতে {{ @$landLease->landDistrict->name }} জেলা
                পরিষদের মালিকানাধীন {{ @$landLease->mouza->name }} মৌজার |</p>
        </div>
        <div class="notice-law">
            <p>সূত্রঃ {{ getBanglaDateFormat($surveyor->investigation_english_date) }} তারিখের আবেদন ও সার্ভেয়ার কর্তৃক তদন্ত প্রতিবেদন। </p>
        </div>
        <div class="notice">
            <p class="main-notice">উপর্যুক্ত বিষয ও সুত্রের প্রেক্ষিতে জানানো যাচ্ছে যে, আপনার আবেদনের প্রেক্ষিতে
                {{ @$landLease->landDistrict->name }} জেলা পরিষদের মালিকানাধীন {{ @$landLease->landMouza->name }} মৌজার {{ @$landLease->landKhotiyan->name }} দাগ
                নং-{{ en2bn(@$landLease->landDag->dag_no) }} দাগের
                {{ en2bn(@$landLease->landAmount->amount) }}
                {{$landLease->land_nature == LAND_NATURE_FILLED ? 'বর্গফুট ভরাট':'শতাংশ জলাশয়' }}
                জমি এ কার্যালয়ের সার্ভেয়ার কর্তৃক সরজমিনে তদন্ত করে দেখা যায়, {{ @$landLease->landDivision->name }}
                বিভাগের {{ @$landLease->landDistrict->name }} জেলা পরিষদের মালিকানাধীন উল্লেখিত জমি
                {{ @$landLease->applicant_name_bn ?? @$landLease->applicant_name_en }}, পিতা- {{ @$landLease->father_name }},  ইজারা নিয়ে {{ en2bn($landLease->last_session_lease) }} সাল পর্যন্ত ভোগদখলে থেকে নবায়ন করেছেন, বর্তমানেও
                সরজমিনে ভোগ দখলে আছেন। যেহেতু, আপনি আবেদনকারী বর্ণিত তফসিলভূক্ত সম্পত্তি বর্তমানেও সরজমিনে ভোগ দখলে
                আছেন, সেহেতু, আপনার আবেদনের প্রেক্ষিতে বর্ণিত তফসিলভূক্ত জমি
                <?php
                    $last_date_of_lease = $landLease->last_date_of_lease;
                    $present_date_year = date('Y');
                    $present_date_month = date('m');

                    $last_date_year = getDateYear($last_date_of_lease);
                    $last_date_month = getDateMonth($last_date_of_lease);

                    if ($present_date_month < 7) {
                        $running_expired_year = $present_date_year;
                        $running_expired_session_year = ($present_date_year - 1) . "-" . $present_date_year;
                    } else {
                        $running_expired_year = $present_date_year + 1;
                        $running_expired_session_year = $present_date_year . "-" . ($present_date_year + 1);
                    }

                    if ($last_date_month < 7) {
                        $last_expired_year = $last_date_year;
                        $from_expired_session_year = $last_expired_year . "-" . ($last_expired_year + 1);
                    } else {
                        $last_expired_year = $last_date_year + 1;
                        $from_expired_session_year = $last_expired_year . "-" . ($last_expired_year + 1);
                    }

                    $total_remaining_lease_year = ($running_expired_year - $last_expired_year) ?? 0;

                    if ($landLease->land_nature == LAND_NATURE_FILLED) {
                        $land_nature_amount = @$landLease->landMouza->land_nature_filled_present_rate ?? 0;
                    } else {
                        $land_nature_amount = @$landLease->landMouza->land_nature_pond_present_rate ?? 0;
                    }

                    $landAmount = @$landLease->landAmount->amount ?? 0;
                    $subTotal = $landAmount * $land_nature_amount * $total_remaining_lease_year;

                    $vat = @$landLease->surveyorInvestigationReport->vat ?? 0;
                    $subTotalWithVat = ($vat * $subTotal) / 100;

                    $tax = @$landLease->surveyorInvestigationReport->tax ?? 0;
                    $subTotalWithTax = ($tax * $subTotal) / 100;

                    $grandTotal = $subTotal+$subTotalWithVat+$subTotalWithTax;
                    $stamp_money = @$landLease->surveyorInvestigationReport->stamp_money ?? 0;
                ?>
                {{ en2bn($running_expired_session_year) }} মোট {{ $total_remaining_lease_year < 10 ? en2bn(0 . $total_remaining_lease_year):en2bn($total_remaining_lease_year) }} বছরের লীজ মানি পরিশোধের
                শর্তে আপনার নামে ইজারা নবায়ন করা হলো।</p>
            <div class="notice-calculation-table">
                <h4>নবায়নের হিসাবঃ</h4>
                <ul>
                    <li>{{ en2bn($from_expired_session_year) }} হতে {{ en2bn($running_expired_session_year) }} সাল পর্যন্ত হিসাব</li>
                    <li>
                        <span>{{ en2bn(@$landAmount) }} {{ $landLease->land_nature == LAND_NATURE_FILLED ? 'বর্গফুট':'শতাংশ' }}
                            = {{ en2bn(@$landAmount) }} X {{ en2bn($land_nature_amount) }} X {{ en2bn($total_remaining_lease_year) }}</span> = <span>{{ en2bn($subTotal) }}/- টাকা</span></li>
                    <li><span>ভ্যাট {{ en2bn($vat) }}%</span> = <span>{{ en2bn($subTotalWithVat) }}/- টাকা</span></li>
                    <li><span>আয়কর {{ en2bn($tax) }}% </span> = <span>{{ en2bn($subTotalWithTax) }}/-টাকা</span></li>
                    <li class="total"><span>সর্বমোট  </span> = <span>{{ en2bn($grandTotal) }}/- টাকা</span></li>
                </ul>
            </div>
            <p class="main-notice">এমতাবস্থায়, পত্র প্রাপ্তির {{ en2bn($surveyor->deposit_money_submit_day) }} ({{ numberBnWord($surveyor->deposit_money_submit_day) }}) কার্যদিবসের মধ্যে ইজারা মূল্য,{{ en2bn($vat) }}% ভ্যাট ও {{ en2bn($tax) }}%
                আয়কর বাবদ সর্বমোট = {{ en2bn($grandTotal) }}/- ({{ numberBnWord($grandTotal) }}) টাকা প্রধান নির্বাহী কর্মকর্তা, জেলা পরিষদ,
                {{ $landLease->landDistrict->name }} এর নামে ব্যাংক ড্রাফ্ট/পে-অর্ডার মাধ্যমে জেলা পরিষদে জমা প্রদানসহ {{ en2bn($surveyor->stamp_money) }}/-({{ numberBnWord($surveyor->stamp_money) }}) টাকা মূল্যের
                নন-জুডিশিয়াল ষ্ট্যাম্পে চুক্তিপত্র সম্পাদন করার জন্য নির্দেশক্রমে আপনাকে অনুরোধ করা হলো ।</p>
        </div>
    </div>
</div>

<div class="footer-area">
    <div class="container">
        <div class="footer-content">
            <div class="footer-left-area">
                <ul>
                    <li><span>{{ $landLease->applicant_name_bn ?? $landLease->applicant_name_en }}</span></li>
                    <li><span>পিতাঃ {{ $landLease->father_name }}</span></li>
                    <li><span>{{ @$landLease->applicantUpazila->name }},  {{ @$landLease->applicantDistrict->name }}</span></li>
                </ul>
                <h5>অনুলিপিঃ</h5>
                <ul>
                    <li><span>০১। প্রশাসনিক কর্মকর্তা, জেলা পরিষদ, নারায়ণগঞ্জ</span></li>
                    <li><span>০২। অফিস কপি।</span></li>
                </ul>
            </div>
            <div class="footer-right-area">
                <ul>
                    <li><span>({{ @$admin->name }})</span></li>
                    <li><span>প্রধান নির্বাহী কর্মকর্তা</span></li>
                    <li><span>জেলা পরিষদ, {{ @$landLease->landDistrict->name }}</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
