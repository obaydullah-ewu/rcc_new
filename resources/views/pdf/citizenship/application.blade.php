<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/pdf/css/style.css') }}">
    <title>Rajshahi City Corporation</title>
  </head>
  <body>
    <button id="printPageButton" onClick="window.print();">Print</button>
    <header class="header">
      <div class="container">
        <div class="header-content">
          <h1>রাজশাহী সিটি কর্পোরেশন</h1>
          <h4>রাজশাহী</h4>
        </div>
      </div>
    </header>
    <div class="city-logo">
      <div class="container">
        <img src="{{ asset('assets/pdf/images/rajshahi-city-corporation.png') }}" alt="logo">
      </div>
    </div>
    <div class="form-area">
      <div class="container">
        <h4>নাগরিকত্ব সনদ এর আবেদন পত্র</h4>
        <table class="citizen-app-table">
          <tr>
            <td class="title">নামঃ</td>
            <td class="app-name" colspan="4"><span>Md. Riaz Uddin Khan</span></td>
          </tr>
          <tr>
            <td class="title">পিতার নামঃ</td>
            <td class="f_name"><span></span></td>
            <td class="title">মাতার নামঃ</td>
            <td class="m_name"><span></span></td>
          </tr>
          <tr>
            <td class="title">গ্রামঃ</td>
            <td class="village"><span></span></td>
            <td class="title">ডাকঘরঃ</td>
            <td class="post_office"><span></span></td>
          </tr>
          <tr>
            <td class="title">ওয়ার্ড নংঃ</td>
            <td class="ward_no"><span></span></td>
            <td class="title">উপজেলাঃ</td>
            <td class="sub_dist"><span></span></td>
          </tr>
          <tr>
            <td class="title">জেলাঃ</td>
            <td class="district"><span></span></td>
            <td class="title">মোবাইলঃ</td>
            <td class="phone"><span></span></td>
          </tr>
          <tr>
            <td class="title">জন্ম নিবন্ধন নংঃ </td>
            <td class="birth_cirt"><span></span></td>
            <td class="title">জাতীয় পরিচয় পত্র নংঃ</td>
            <td class="nid"><span></span></td>
          </tr>
        </table>
        <div class="table-footer">
         <p> রাজশাহী সিটি কর্পোরেশন,রাজশাহী</p>
        </div>
      </div>
    </div>
  </body>
</html>
