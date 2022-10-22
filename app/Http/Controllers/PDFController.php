<?php

namespace App\Http\Controllers;

use App\Models\CitizenshipCertificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function citizenshipPaymentDetailsPDF($id)
    {

        $data['pageTitle'] = 'নাগরিকত্ব সনদ পেমেন্ট রশিদ';
        $data['citizenship'] = CitizenshipCertificate::where(['status' => 1, 'id' => $id])->firstOrFail();
//        $pdf = PDF::loadView('pdf.citizenship-payment-details',  $data);
//        return $pdf->stream('citizenship_payment.' . '.pdf');
        return view('pdf.citizenship-payment-details',$data);
    }
}
