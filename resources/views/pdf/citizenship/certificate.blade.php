<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/pdf/css/style.css') }}">
    <title>{{ getOption('app_name') }}</title>
</head>
<body class="cc-body">
<button id="printPageButton" onClick="window.print();">Print</button>

<div class="citizenship-certificate">
    <div class="container">
        <div class="cc-header">
            <img src="{{ asset(getOption('app_logo')) }}" alt="logo">
            <h1>{{ getOption('app_name') }}</h1>
        </div>

        <div class="cc-second-area">
            <div class="cc-barcode">
                <p>সিরিয়াল নংঃ {{ en2bn($citizenship->id) }}</p>
                {!! DNS2D::getBarcodeHTML($bar_code_details, 'QRCODE',3,3) !!}
            </div>
            <div class="cc-ward">
                <h5>কাউন্সিলরের কার্যালয়</h5>
                <h5>ওয়ার্ড নং- <span id="cc-ward">{{ en2bn($citizenship->ward_no) }}</span></h5>
            </div>
            <div class="user-img">
                <p>তারিখঃ {{ getBanglaDateFormat($citizenship->created_at ) }} </p>
                @if(@$citizenship->user->image)
                    <img id="user_img" src="{{ getFile(@$citizenship->user->image) }}" alt="image">
                @endif
            </div>
        </div>

        <div class="cc-title">
            <h4>না গ রি ক ত্ব</h4>
            <h3>সনদপত্র</h3>
        </div>

        <div class="cc-main-body">
            <p>প্রত্যয়ন করা যাচ্ছে জনাব/জনাবা <span id="cc_name">  {{ $citizenship->name }}  ।</span> পিতা/স্বামীঃ <span class="cc_father_name"> {{ $citizenship->father_name }} </span>।
                মাতার নামঃ <span id="cc_mother_name">  {{ $citizenship->mother_name }}  </span>।
            আইডি/জন্মনিবন্ধন নংঃ <span
                    class="cc_birth_certificate"> {{ $citizenship->nid ?? $citizenship->birth_certificate_no }}  </span> ।  মহল্লাঃ <span
                    id="cc_vill"> {{ $citizenship->village }} ।</span> হোল্ডিং নংঃ <span id="cc_holding"> {{ $citizenship->holding_no }}</span> ।
            </p>
            <p>@if($citizenship->post_office) ডাকঘরঃ <span id="cc_postOffice"> {{ $citizenship->post_office }}</span> । @endif থানাঃ <span id="cc_thana"> {{ $citizenship->upazila }} </span>।
                জেলাঃ <span id="cc_thana"> {{ $citizenship->district }} </span>।</p>
            <br>
            <p>তিনি আমার পরিচিত। <span id="cc-ward"> {{ en2bn($citizenship->ward_no) }} </span> নং ওয়ার্ডের স্থায়ী বাসিন্ধা। তিনি জন্মসূত্রে বাংলাদেশের নাগরিক ।</p>
            <p>আমার জানামতে তিনি রাষ্ট্র বা আইন শৃংখলা বিরোধী কোন কাজে জড়িত নন ।</p>
            <br>
            <p>আমি তাঁর সার্বিক সাফল্য কামনা করি ।</p>
        </div>

        <div class="certificate-footer">
            <div class="cc_f1">
                <img id="seal_sign" src="{{ asset($councilorSignature->creator_signature) }}" alt="image">
                <p>প্রস্তুতকারীর সাক্ষর ও সীল</p>
            </div>
            <div class="cc_f1">
                <img id="councilor_sign" src="{{ asset($councilorSignature->councilor_signature) }}" alt="image">
                <p>কাউন্সিলর <br> <span id="cc_ward"> {{ en2bn($citizenship->ward_no) }}</span> নং ওয়ার্ড <br> {{ getOption('app_name') }}, {{ getOption('app_district') }}।</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
