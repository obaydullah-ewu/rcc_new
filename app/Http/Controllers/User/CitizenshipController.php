<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CitizenshipCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitizenshipController extends Controller
{
    public function list(Request $request)
    {
        $data['pageTitle'] = 'নাগরিকত্ব তালিকা';
        $data['navCitizenshipActiveClass'] = 'hover show';
        $data['subNavCitizenshipListActiveClass'] = 'active';
        $data['citizenships'] = CitizenshipCertificate::where('user_id', Auth::id())->where(function ($q) use ($request) {
            if ($request->search_status) {
                $q->where('status',$request->search_status);
            }
        })->paginate();
        return view('user.citizenship.list')->with($data);
    }

    public function addCitizenshipApplication()
    {
        $data['pageTitle'] = 'নাগরিকত্ব সনদপত্রের জন্য আবেদন';
        $data['navCitizenshipActiveClass'] = 'hover show';
        $data['subNavAddCitizenshipActiveClass'] = 'active';
        return view('user.citizenship.add-certificate')->with($data);
    }

    public function citizenshipApplicationStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'mobile_number' => 'required',
            'birth_certificate_no' => 'required_without:nid',
            'district' => 'required',
            'upazila' => 'required',
            'union' => 'required',
            'post_office' => 'required',
            'ward_no' => 'required',
            'village' => 'required',
            'payment_method' => 'required',
            'certificate_fee' => 'required',
            'information_centre_fee' => 'required',
            'total_fee' => 'required',
            'date' => 'required',
        ],[
            'birth_certificate_no.required_without' => 'জাতীয় পরিচয় পত্র নম্বর অথবা জন্ম সনদ নম্বর দিতে হবে'
        ]);

        if ($request->payment_method == 'bankDraft') {
            $request->validate([
                'bank_draft_no' => 'required',
                'bank_name' => 'required',
                'branch_name' => 'required',
            ]);
        } elseif (($request->payment_method == 'nagad') || ($request->payment_method == 'bkash')) {
            $request->validate([
                'mobile_banking_number' => 'required',
                'trx_id' => 'required',
            ]);
        } elseif ($request->payment_method == 'cash') {
            $request->validate([
                'rashid_no' => 'required',
                'serial_no' => 'required',
            ]);
        }

        $citizen = CitizenshipCertificate::where('user_id', Auth::id())->first();
        if (!$citizen) {
            $citizen = new CitizenshipCertificate();
        }
        $citizen->user_id = Auth::id();
        $citizen->name = $request->name;
        $citizen->father_name = $request->father_name;
        $citizen->mother_name = $request->mother_name;
        $citizen->mobile_number = $request->mobile_number;
        $citizen->nid = $request->nid;
        $citizen->birth_certificate_no = $request->birth_certificate_no;
        $citizen->district = $request->district;
        $citizen->upazila = $request->upazila;
        $citizen->union = $request->union;
        $citizen->post_office = $request->post_office;
        $citizen->ward_no = $request->ward_no;
        $citizen->village = $request->village;
        $citizen->holding_no = $request->holding_no;
        $citizen->payment_method = $request->payment_method;
        $certificate_fee = (empty(getOption('certificate_fee')) ? 0 : getOption('certificate_fee'));
        $information_centre_fee = (empty(getOption('information_centre_fee')) ? 0 : getOption('information_centre_fee'));
        $mobile_banking_charge_fee = (empty(getOption('mobile_banking_charge_fee')) ? 0 : getOption('mobile_banking_charge_fee'));
        $citizen->certificate_fee = $certificate_fee;
        $citizen->information_centre_fee = $information_centre_fee;
        $citizen->mobile_banking_charge_fee = $mobile_banking_charge_fee;
        if ($request->payment_method == 'bkash'|| $request->payment_method == 'nagad') {
            $citizen->total_fee = $certificate_fee + $information_centre_fee;
        } else {
            $citizen->total_fee = $certificate_fee + $information_centre_fee + $mobile_banking_charge_fee;
        }
        $citizen->date = $request->date;
        $citizen->bank_draft_no = $request->bank_draft_no;
        $citizen->bank_name = $request->bank_name;
        $citizen->branch_name = $request->branch_name;
        if ($request->file('bank_slip')) {
            deleteFile(@$citizen->image);
            $bank_slip = saveImage('User', $request->bank_slip);
            $citizen->bank_slip = $bank_slip;
        }
        $citizen->mobile_banking_number = $request->mobile_banking_number;
        $citizen->trx_id = $request->trx_id;
        $citizen->rashid_no = $request->rashid_no;
        $citizen->serial_no = $request->serial_no;
        $citizen->save();

        return redirect()->back()->with('success', 'Created Successfully');

    }
}
