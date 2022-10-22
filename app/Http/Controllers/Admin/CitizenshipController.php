<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CitizenshipCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitizenshipController extends Controller
{
    public function list(Request $request)
    {
        $data['pageTitle'] = 'নাগরিকত্ব আবেদন তালিকা';
        $data['navCitizenshipActiveClass'] = 'hover show';
        $data['subNavCitizenshipListActiveClass'] = 'active';
        $data['citizenships'] = CitizenshipCertificate::where(function ($q) use ($request) {
            if ($request->search_status) {
                $q->where('status',$request->search_status);
            }
        })->paginate();
        return view('admin.citizenship.list')->with($data);
    }

    public function changeStatus(Request $request)
    {
        CitizenshipCertificate::find($request->id)->update(['status' => $request->status]);
        return response()->json([
            'status' => 200
        ]);
    }

}
