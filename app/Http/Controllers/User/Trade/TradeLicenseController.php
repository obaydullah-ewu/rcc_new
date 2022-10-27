<?php

namespace App\Http\Controllers\User\Trade;

use App\Http\Controllers\Controller;
use App\Models\BusinessManagement;
use App\Models\BusinessNature;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradeLicenseController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'ট্রেড লাইসেন্স';
        $data['navTradeLicenseActiveClass'] = 'hover show';
        $data['subNavTradeLicenseListActiveClass'] = 'active';
//        $data['tradeLicense'] = TradeLicense::where('user_id', Auth::id())->where(function ($q) use ($request) {
//            if ($request->search_status) {
//                $q->where('status',$request->search_status);
//            }
//        })->paginate();
        return view('user.trade_license.list')->with($data);
    }

    public function create()
    {
        $data['pageTitle'] = 'ট্রেড লাইসেন্স';
        $data['navTradeLicenseActiveClass'] = 'hover show';
        $data['subNavCreateTradeLicenseActiveClass'] = 'active';
        $data['businessManagements'] = BusinessManagement::all();
        $data['businessNatures'] = BusinessNature::all();
        $data['businessTypes'] = BusinessType::all();
        return view('user.trade_license.create')->with($data);
    }
}
