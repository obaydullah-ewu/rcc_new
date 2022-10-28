<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/pdf/css/style.css') }}">
    <title>{{ getOption('app_name') }}</title>
    <style>
        .title {
            font-weight: 900 !important;
        }
    </style>
</head>
<body>
<button id="printPageButton" onClick="window.print();">Print</button>
<header class="header">
    <div class="container">
        <div class="header-content">
            <h1>{{ getOption('app_name') }}</h1>
            <h4>{{ getOption('app_district') }}</h4>
        </div>
    </div>
</header>
<div class="city-logo">
    <div class="container">
        <img src="{{ asset(getOption('app_logo')) }}" alt="logo">
    </div>
</div>
<div class="form-area">
    <div class="container">
        <h4>নাগরিকত্ব সনদ এর আবেদন পত্র</h4>
        <table class="citizen-app-table">
            <tr>
                <td class="title">নামঃ</td>
                <td class="app-name" colspan="4"><span>{{ $citizenship->name ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">পিতার নামঃ</td>
                <td class="f_name"><span>{{ $citizenship->father_name ?? 'N/A' }}</span></td>
                <td class="title">মাতার নামঃ</td>
                <td class="m_name"><span>{{ $citizenship->mother_name ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">হোল্ডিং নম্বরঃ</td>
                <td class="birth_cirt"><span>{{ $citizenship->holding_no ?? 'N/A' }}</span></td>
                <td class="title">মহল্লাঃ</td>
                <td class="village"><span>{{ $citizenship->village ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">ওয়ার্ড নংঃ</td>
                <td class="ward_no"><span>{{ en2bn($citizenship->ward_no) }}</span></td>
                <td class="title">ডাকঘরঃ</td>
                <td class="post_office"><span>{{ $citizenship->post_office ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">থানা</td>
                <td class="sub_dist"><span>{{ $citizenship->upazila ?? 'N/A' }}</span></td>
                <td class="title">জেলাঃ</td>
                <td class="district"><span>{{ $citizenship->district ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">জন্ম নিবন্ধন নংঃ</td>
                <td class="birth_cirt"><span>{{ $citizenship->birth_certificate_no ?? 'N/A' }}</span></td>
                <td class="title">জাতীয় পরিচয় পত্র নংঃ</td>
                <td class="nid"><span>{{ $citizenship->nid ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">মোবাইলঃ</td>
                <td class="phone"><span>{{ $citizenship->mobile_number ?? 'N/A' }}</span></td>
            </tr>
        </table>

        <table class="citizen-app-table">
            <tr>
                <td class="app-name" style="text-align: center" colspan="5"><b>স্থায়ী ঠিকানা</b></td>
            </tr>
            <tr>
                <td class="title">হোল্ডিং নম্বরঃ</td>
                <td class="birth_cirt"><span>{{ $permanentAddress->per_holding ?? 'N/A' }}</span></td>
                <td class="title">মহল্লাঃ</td>
                <td class="village"><span>{{ @$permanentAddress->perVillage->name ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">ওয়ার্ড নংঃ</td>
                <td class="ward_no"><span>{{ en2bn(@$permanentAddress->perWard->name) }}</span></td>
                <td class="title">ডাকঘরঃ</td>
                <td class="post_office"><span>{{ @$permanentAddress->perPostOffice->name ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">থানা</td>
                <td class="sub_dist"><span>{{ $permanentAddress->perUpazila->name ?? 'N/A' }}</span></td>
                <td class="title">জেলাঃ</td>
                <td class="district"><span>{{ $permanentAddress->perDistrict->name ?? 'N/A' }}</span></td>
            </tr>
        </table>

        <table class="citizen-app-table">
            <tr>
                <td class="app-name" style="text-align: center" colspan="5"><b>বর্তমান ঠিকানা</b></td>
            </tr>
            <tr>
                <td class="title">হোল্ডিং নম্বরঃ</td>
                <td class="birth_cirt"><span>{{ @$presentAddress->pre_holding ?? 'N/A' }}</span></td>
                <td class="title">মহল্লাঃ</td>
                <td class="village"><span>{{ @$presentAddress->preVillage->name ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">ওয়ার্ড নংঃ</td>
                <td class="ward_no"><span>{{ en2bn(@$presentAddress->preWard->name) }}</span></td>
                <td class="title">ডাকঘরঃ</td>
                <td class="post_office"><span>{{ @$presentAddress->prePostOffice->name ?? 'N/A' }}</span></td>
            </tr>
            <tr>
                <td class="title">থানা</td>
                <td class="sub_dist"><span>{{ @$presentAddress->preUpazila->name ?? 'N/A' }}</span></td>
                <td class="title">জেলাঃ</td>
                <td class="district"><span>{{ @$presentAddress->preDistrict->name ?? 'N/A' }}</span></td>
            </tr>
        </table>
        <div class="table-footer">
            <p> {{ getOption('app_name')  }},{{ getOption('app_district')  }}</p>
        </div>
    </div>
</div>
</body>
</html>
