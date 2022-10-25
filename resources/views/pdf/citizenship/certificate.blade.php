<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/pdf/css/style.css') }}">
    <title>Citizenship Certificate</title>
  </head>
  <body>
    <button id="printPageButton" onClick="window.print();">Print</button>

    <div class="main-certificate">
      <div class="container">
        <div class="certificate-header">
          <p>সিরিয়াল নংঃ ৩১</p>
          <p>তারিখঃ ১৩-১০-২২ খ্রি.</p>
        </div>
        <div class="certificate-body">
          <p class="main-body">
            এই মর্মে প্রত্যয়ন করা যাইতেছে যে <span id="name"></span>, পিতা/স্বামীঃ <span id="f_name"></span>, মাতাঃ <span id="m_name"></span>, জন্ম নিবন্ধন নংঃ <span id="birth_c_no"></span>, জাতীয় পরিচয়পত্র নংঃ <span id="nid"></span>, গ্রাম/মহল্লাঃ <span id="vill"></span>, ডাকঘরঃ রাজশাহী, উপেজলাঃ রাজশাহী, জেলাঃ রাজশাহী।
          </p>
          <p>তিনি রাজশাহী সিটি কর্পোরেশন এর ৭নং ওয়ার্ডের স্থায়ী বাসিন্দা এবং বাংলাদেশের প্রকৃত নাগরিক।</p>
          <p class="main-body">আমি তাহার উজ্জল ভবিষ্যৎ কামনা করি।</p>
        </div>
        <div class="certificate-footer">
          <p>প্রস্তুতকারীর সাক্ষর ও সীল</p>
          <p>কাউন্সিলর <br> ৭নং ওয়ার্ড <br> রাজশাহী সিটি কর্পোরেশন, রাজশাহী।</p>
        </div>
      </div>
    </div>
  </body>
</html>
