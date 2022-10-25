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
    <header class="header header-2">
      <div class="container">
        <div class="header-content">
          <h1>রাজশাহী সিটি কর্পোরেশন</h1>
          <h4>রাজশাহী</h4>
          <h5>নাগরিকত্ব সনদ পেমেন্ট রশিদ</h5>
        </div>
      </div>
    </header>
    <div class="city-logo money-slip-logo">
      <div class="container">
        <img src="{{ asset('assets/pdf/images/rajshahi-city-corporation.png') }}" alt="logo">
      </div>
    </div>

    <div class="invoice-body">
      <div class="container">
        <div class="invoice-topbar">
          <div class="invoice-top-left-area">
            <h5>INVOICE TO:</h5>
            <h6 id="name">Riaz Uddin Khan</p>
          </div>
          <div class="invoice-top-right-area">
            <h5>INVOICE WR-1</h5>
            <h6>Date Of Invoice: <span id="date">13/02/2022</span></p>
          </div>
        </div>
        <table class="invoice-table">
          <tr>
            <td>#</td>
            <td>DESCRIPTION</td>
            <td>PRICE</td>
            <td>DC PRICE</td>
            <td>TOTAL</td>
          </tr>
          <tr>
            <td>01</td>
            <td>Certificate of Citizenship</td>
            <td>50</td>
            <td>0</td>
            <td>50</td>
          </tr>
          <tr>
            <td class="total" colspan="4">Grand Total</td>
            <td>50</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="invoice-footer">
      <div class="container">
        <div class="invoice-footer-left-area">
          <h3>Payment Information:</h3>
          <ul>
            <li>মেথডঃ <span>ক্যাশ</span></li>
            <li>টাকার পরিমাণ # <span>৫০</span> টাকা</li>
            <li>তারিখঃ <span>৩০-সেপ্টেম্বর-২০২২</span></li>
          </ul>
        </div>
        <div class="invoice-paid-seal">
          <img src="{{ asset('assets/pdf/images/paid.png') }}" alt="seal">
        </div>
      </div>
    </div>

  </body>
</html>
