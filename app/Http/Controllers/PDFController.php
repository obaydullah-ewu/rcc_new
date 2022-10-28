<?php

namespace App\Http\Controllers;

use App\Models\CitizenshipCertificate;
use App\Models\CouncilorSignature;
use App\Models\UserPermanentAddress;
use App\Models\UserPresentAddress;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function citizenshipApplicationPDF($id)
    {
        $data['pageTitle'] = 'নাগরিকত্ব সনদ পেমেন্ট রশিদ';
        $data['citizenship'] = CitizenshipCertificate::findOrFail($id);
        $data['permanentAddress'] = UserPermanentAddress::where('user_id', $data['citizenship']->user_id)->first();
        $data['presentAddress'] = UserPresentAddress::where('user_id', $data['citizenship']->user_id)->first();
        return view('pdf.citizenship.application',$data);
    }

    public function citizenshipPaymentDetailsPDF($id)
    {
        $data['pageTitle'] = 'নাগরিকত্ব সনদ পেমেন্ট রশিদ';
        $data['citizenship'] = CitizenshipCertificate::findOrFail($id);
        return view('pdf.citizenship.payment-slip',$data);
    }

    public function citizenshipCertificatePDF($id)
    {
        $data['pageTitle'] = 'নাগরিকত্ব সনদ পেমেন্ট রশিদ';
        $data['citizenship'] = CitizenshipCertificate::where(['status' => CITIZENSHIP_CERTIFICATE_STATUS_APPROVED, 'id' => $id])->firstOrFail();
        $data['councilorSignature'] = CouncilorSignature::where('ward_no', $data['citizenship']->ward_no)->first();
        return view('pdf.citizenship.certificate',$data);
    }
}
