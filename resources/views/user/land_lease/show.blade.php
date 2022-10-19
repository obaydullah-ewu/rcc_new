<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/application_view.css') }}" />
    <title>Application</title>
</head>
</html>
<button type="button" class="btn btn-info pull-right printBtn " style="color: white" onclick="printPage('PrintDiv');">
    <i class="fa fa-fw fa-print"></i> প্রিন্ট করুন </button>
<html id="PrintDiv" >
<body style="margin-left: 50px;margin-right: 50px;margin-top: 50px" >
<!-- Main content -->
<section class="content" >
    <!-- Default box -->
    <div class="box" >
        <form id="formValidate" class="form-horizontal" action="" method="post">
            <div id="tableToPrint">
                <div class="box-body">
                    <table style="margin-top: 10px">
                        <h4>(১) আবেদনকারীর ঠিকানা :</h4>
                        <tr>
                            <td width="3%">০১.</td>
                            <td style="">আবেদনকারী নাম  (বাংলায়)</td>
                            <td style="width:43%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->applicant_name_bn }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td >আবেদনকারী নাম  (ইংরেজীতে) </td>
                            <td >:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->applicant_name_en }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:3%;">০২.</td>
                            <td > স্বামী/পিতার নাম </td><td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->father_name }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td style="width:3%;">০৩.</td>
                            <td > মোবাইল নম্বর </td>
                            <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->mobile_number }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td style="width:3%;">০৪. </td>
                            <td >জাতীয় পরিচয় পত্র নাম্বার  </td><td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->nid }}
                            </td>
                        </tr>

                        <tr>
                            <td style="width:3%;">০৫.</td>
                            <td > জন্ম তারিখ  </td>
                            <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ date('d-m-Y', strtotime($landLease->birth_of_date)) }} </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:3%;">০৬.</td>
                            <td >জেলা  </td>
                            <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ @$landLease->village->postOffice->upazila->district->name }}  </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:3%;">০৭.</td>
                            <td > উপজেলা  </td>
                            <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ @$landLease->village->postOffice->upazila->name }}  </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:3%;">০৮.</td>
                            <td > পোস্ট অফিস  </td>
                            <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ @$landLease->village->postOffice->name }}  </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:3%;">০৯.</td>
                            <td > গ্রাম  </td>
                            <td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ @$landLease->village->name }} </span>
                            </td>
                        </tr>

                        <tr><td colspan="2">&nbsp;</td></tr>
                    </table>


                    <table id="myTable1" class="table1 " width="100%" >
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
                            <td style=" border: 1px solid black;text-align: center"> {{ $landLease->land_amount }} {{$landLease->landNature->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <table>
                        <h4>(৩) জমির চৌহদ্দি : :</h4>
                        <tr>
                            <td ></td>
                            <td style="width:20%">উত্তর</td>
                            <td style="width:80%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->land_north }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="width:20%">দক্ষিণ </td>
                            <td style="width:80%">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->land_south }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td ></td>
                            <td style="width:20%;"> পূর্ব </td>
                            <td style="width:80%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->land_east }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td style="width:20%;">পশ্চিম </td>
                            <td style="width:80%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{ $landLease->land_west }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td style="width:20%;">প্রথম ইজারার তারিখ   </td>
                            <td style="width:80%">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span >{{$landLease->first_date_of_lease}}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="width:20%;">প্রথম সেশন ইয়ার   </td>
                            <td style="width:80%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{$landLease->first_session_lease}}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="width:20%;">শেষ ইজারার তারিখ  </td>
                            <td style="width:80%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{$landLease->last_date_of_lease}}
                            </td>
                        </tr> <tr>
                            <td ></td>
                            <td style="width:20%;">শেষ সেশন ইয়ার </td>
                            <td style="width:20%;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">{{$landLease->last_session_lease }}
                            </td>
                        </tr>

                        <tr><td colspan="2">&nbsp;</td></tr>
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script>
    //for print
    "use strict"

    function printPage(id)
    {
        $('.printBtn').addClass('d-none');
        var html="<html>";
        html+= document.getElementById(id).innerHTML;
        html+="</html>";
        var printWin = window.open('','','');
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


