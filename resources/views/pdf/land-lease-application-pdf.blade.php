<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/application_view.css') }}"/>
    <title>Application</title>
</head>
</html>
<button type="button" class="btn btn-info pull-right printBtn " style="color: white" onclick="printPage('PrintDiv');">
    <i class="fa fa-fw fa-print"></i> প্রিন্ট করুন
</button>
<html id="PrintDiv">
<body style="margin-left: 50px;margin-right: 50px;margin-top: 50px">
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <form id="formValidate" class="form-horizontal" action="" method="post">
            <div id="tableToPrint">
                <h4 class="text-center"><b><u> বরাদ্দকৃত জমি নবায়নের আবেদন </u></b></h4>
                <div class="box-body">
                    <table class="table-borderless">
                        <tr>
                            <td>
                                বরাবর <br/>
                                চেয়ারম্যান <br/>
                                জেলা পরিষদ, নারায়ণগঞ্জ।<br/>
                                <br/>
                                <b> বিষয়: জমি নবায়নের আবেদন আবেদন ।</b><br>
                            </td>
                            <td class="text-right">
                                <img src="{{ getFile($landLease->applicant_image)  }}" alt="passport image" width="180"
                                     height="180">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">মহোদয়,</td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                আমি নিম্ম স্বাক্ষরকারী জেলা পরিষদের মালিকানাধীন নিম্ম তফসিল বর্ণিত জমি অস্থায়ী ইজারা
                                গ্রহণে আগ্রহী। তাই আমার পরিচিত ও কাঙ্খিত জমির তফসিল নিম্মে উপস্থাপন করা হলো।
                            </td>
                        </tr>
                    </table>
                    &nbsp;
                    <h4>(১) আবেদনকারীর ঠিকানা :</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <table style="margin-top: 10px">
                                <tr>
                                    <td width="3%"><b>০১.</b></td>
                                    <td style=""><b>আবেদনকারী নাম (বাংলায়)</b></td>
                                    <td style="width:43%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->applicant_name_bn }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>আবেদনকারী নাম (ইংরেজীতে)</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->applicant_name_en }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:3%;"><b>০২.</b></td>
                                    <td><b>স্বামী/পিতার নাম</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->father_name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:3%;"><b>০৩.</b></td>
                                    <td><b>মোবাইল নম্বর</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->mobile_number }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:3%;"><b>০৪.</b></td>
                                    <td><b>জাতীয় পরিচয় পত্র নাম্বার</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->nid }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table style="margin-top: 10px">
                                <tr>
                                    <td style="width:3%;"><b>০৫.</b></td>
                                    <td><b>জন্ম তারিখ</b></td>
                                    <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ date('d-m-Y', strtotime($landLease->birth_of_date)) }} </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:3%;"><b>০৬.</b></td>
                                    <td><b>জেলা</b></td>
                                    <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            style="">{{ @$landLease->village->postOffice->upazila->district->name }}  </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:3%;"><b>০৭.</b></td>
                                    <td><b>উপজেলা</b></td>
                                    <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ @$landLease->village->postOffice->upazila->name }}  </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:3%;"><b>০৮.</b></td>
                                    <td><b>পোস্ট অফিস</b></td>
                                    <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ @$landLease->village->postOffice->name }}  </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:3%;"><b>০৯.</b></td>
                                    <td><b>গ্রাম</b></td>
                                    <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ @$landLease->village->name }} </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <table id="myTable1" class="table1" width="100%">
                        <h4>(২) প্রার্থিত জমির তফসিল :</h4>
                        <tbody>
                        <tr>
                            <th style=" border: 1px solid black;text-align: center">উপজেলা নাম</th>
                            <th style=" border: 1px solid black;text-align: center">মৌজার নাম</th>
                            <th style=" border: 1px solid black;text-align: center">খতিয়ান নং</th>
                            <th style=" border: 1px solid black;text-align: center">দাগ নং</th>
                            <th style=" border: 1px solid black;text-align: center">ইজারার জন্য জমির পরিমান</th>
                        </tr>

                        <tr style=" border: 1px solid black;">
                            <td style=" border: 1px solid black;text-align: center"> {{ $landLease->landSpotNo->landLedgerNo->mouza->upazila->name }} </td>
                            <td style=" border: 1px solid black;text-align: center"> {{ $landLease->landSpotNo->landLedgerNo->mouza->name }} </td>
                            <td style=" border: 1px solid black;text-align: center"> {{ $landLease->landSpotNo->landLedgerNo->ledger_no }} </td>
                            <td style=" border: 1px solid black;text-align: center"> {{ $landLease->landSpotNo->spot_no }} </td>
                            <td style=" border: 1px solid black;text-align: center"> {{ $landLease->landAmount->amount }} {{$landLease->landNature->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <h4>(৩) জমির চৌহদ্দি:</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td style="width:3%;"></td>
                                    <td><b>উত্তর</b></td>
                                    <td  style="width:43%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->land_north }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>দক্ষিণ</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->land_south }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>পূর্ব</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->land_east }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>পশ্চিম</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{ $landLease->land_west }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table width="100%">
                                <tr>
                                    <td></td>
                                    <td><b>প্রথম ইজারার তারিখ</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>{{$landLease->first_date_of_lease}}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>প্রথম সেশন ইয়ার</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{$landLease->first_session_lease}}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>শেষ ইজারার তারিখ</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{$landLease->last_date_of_lease}}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>শেষ সেশন ইয়ার</b></td>
                                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="">{{$landLease->last_session_lease }}
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <table>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="">
                                অতএব, মহোদয়ের নিকট আমার আকুল আবেদন বর্ণিত বিষয়ে বিবেচনা করে আমার অনুকূলে কাঙ্খিত জমি
                                ইজারা প্রদান করা হলে আমি জেলা পরিষদ কর্তৃক জারিকৃত সকল নিয়ম কানুন মেনে চলতে বাধ্য থাকিব
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width:45%;"><b>আবেদনকারীর স্বাক্ষর</b></td>
                            <td> &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <img src="{{ getFile($landLease->applicant_signature) }}" alt="signature" width="300"
                                     height="50">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:45%;"> <b>আবেদনকারীর নাম</b></td>
                            <td style=""> &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span> {{ $landLease->applicant_name_bn ?? $landLease->applicant_name_en }}  </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                    </table>

                </div>


                <br/>
            </div>

        </form>
    </div><!-- /.box -->
</section><!-- /.content -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script>
    //for print
    "use strict"

    function printPage(id) {
        $('.printBtn').addClass('d-none');
        var html = "<html>";
        html += document.getElementById(id).innerHTML;

        html += "</html>";

        var printWin = window.open('', '', '');
        printWin.document.write(html);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        printWin.close();
        $('.printBtn').removeClass('d-none');
    }
</script>
</body>
</html>


