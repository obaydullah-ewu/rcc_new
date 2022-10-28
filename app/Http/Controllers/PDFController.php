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
        $data['citizenship'] = CitizenshipCertificate::findOrFail($id);
//        $pdf = app('dompdf.wrapper');
//        $context = stream_context_create([
//            'ssl' => [
//                'verify_peer' => FALSE,
//                'verify_peer_name' => FALSE,
//                'allow_self_signed' => TRUE,
//            ]
//        ]);
//        $pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
//        $pdf->getDomPDF()->setHttpContext($context);
//        $pdf = PDF::loadView('pdf.citizenship.payment-slip',  $data);
//        $pdf->setPaper('A4', 'landscape');
//        return $pdf->stream('citizenship_payment_slip.' . '.pdf');
        return view('pdf.citizenship.payment-slip',$data);
    }

    public function citizenshipApplicationPDF($id)
    {
        $data['pageTitle'] = 'নাগরিকত্ব সনদ পেমেন্ট রশিদ';
        $data['citizenship'] = CitizenshipCertificate::findOrFail($id);
        return view('pdf.citizenship.application',$data);
    }

    public function citizenshipCertificatePDF($id)
    {
        $data['pageTitle'] = 'নাগরিকত্ব সনদ পেমেন্ট রশিদ';
        $data['citizenship'] = CitizenshipCertificate::where(['status' => CITIZENSHIP_CERTIFICATE_STATUS_APPROVED, 'id' => $id])->firstOrFail();
        return view('pdf.citizenship.certificate',$data);
    }
}
