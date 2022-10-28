<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/pdf/css/style.css') }}">
    <title>{{ getOption('app_name') }}</title>
  </head>
  <body>
    <button id="printPageButton" onClick="window.print();">Print</button>
    <header class="header header-2">
      <div class="container">
        <div class="header-content">
          <h1>{{ getOption('app_name') }}</h1>
          <h4>{{ getOption('app_district') }}</h4>
          <h5>নাগরিকত্ব সনদ পেমেন্ট রশিদ</h5>
        </div>
      </div>
    </header>
    <div class="city-logo money-slip-logo">
      <div class="container">
        <img src="{{ asset(getOption('app_logo')) }}" alt="logo">
      </div>
    </div>

    <div class="invoice-body">
      <div class="container">
        <div class="invoice-topbar">
          <div class="invoice-top-left-area">
            <h5>INVOICE TO:</h5>
            <h6 id="name">{{ $citizenship->name }}</p>
          </div>
          <div class="invoice-top-right-area">
            <h5>INVOICE WR-{{ $citizenship->id }}</h5>
            <h6>Date Of Invoice: <span id="date">{{ date('M d, Y', strtotime($citizenship->created_at)) }}</span></p>
          </div>
        </div>
        <table class="invoice-table">
          <tr>
            <td>#</td>
            <td>Description</td>
            <td>Certificate Fee</td>
            <td>Information Centre Fee</td>
            <td>Mobile Banking Charge Fee</td>
            <td>TOTAL</td>
          </tr>
          <tr>
            <td>01</td>
            <td>Certificate of Citizenship</td>
            <td>{{ $citizenship->certificate_fee }}</td>
            <td>{{ $citizenship->information_centre_fee }}</td>
            <td>{{ $citizenship->mobile_banking_charge_fee }}</td>
            <td>{{ $citizenship->total_fee }}</td>
          </tr>
          <tr>
            <td class="total" colspan="5">Grand Total</td>
            <td>{{ $citizenship->total_fee }}</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="invoice-footer">
      <div class="container">
        <div class="invoice-footer-left-area">
          <h3>Payment Information:</h3>
          <ul>
            <li>মেথডঃ <span>
                    @if($citizenship->payment_method == 'cash')
                        ক্যাশ
                    @elseif($citizenship->payment_method == 'nagad')
                        নগদ
                    @elseif($citizenship->payment_method == 'bkash')
                        বিকাশ
                    @elseif($citizenship->payment_method == 'bankDraft')
                        পে অর্ডার / ব্যাংক ড্রাফট
                    @endif
                    </span>
            </li>
              @if($citizenship->payment_method == 'bkash' || $citizenship->payment_method == 'nagad')
                  <li>লেনদেন নম্বরঃ <b class="text-black">{{ $citizenship->mobile_banking_number }}</b></li>
                  <li>ট্রানস্যাকশন আইডিঃ <b class="text-black">{{ $citizenship->trx_id }}</b></li>
              @elseif($citizenship->payment_method == 'cash')
                  <li>রশিদ নম্বরঃ <b class="text-black">{{ $citizenship->rashid_no }}</b></li>
                  <li>সিরিয়াল নংঃ <b class="text-black">{{ $citizenship->serial_no }}</b></li>
              @endif
            <li>টাকার পরিমাণ # <span>{{ en2bn($citizenship->total_fee) }}</span> টাকা</li>
            <li>তারিখঃ <span>{{ getBanglaDateFormat($citizenship->created_at) }}</span></li>
          </ul>
        </div>
        <div class="invoice-paid-seal">
          <img src="{{ asset('assets/pdf/images/paid.png') }}" alt="seal">
        </div>
      </div>
    </div>

  </body>
</html>
