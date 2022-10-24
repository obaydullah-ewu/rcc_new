<?php

namespace App\Http\Controllers\Admin\Trade;

use App\Http\Controllers\Controller;
use App\Models\BusinessNature;
use Illuminate\Http\Request;

class BusinessNatureController extends Controller
{
    public function index(Request $request)
    {
        $data['pageTitle'] = 'ব্যবসা প্রকৃতি';
        $data['navTradeActiveClass'] = 'hover show';
        $data['subNavBusinessNatureActiveClass'] = 'active';
        $data['businessNatures'] = BusinessNature::paginate();
        return view('admin.trade.business-nature-list')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'license_fee' => 'required',
            'application_fee' => 'required',
            'new_fee' => 'required',
            'renew_fee' => 'required',
            'signboard_fee' => 'required',
            'license_vat' => 'required',
            'status' => 'required',
        ]);

        $businessNature = new BusinessNature();
        $businessNature->name = $request->name;
        $businessNature->license_fee = $request->license_fee;
        $businessNature->application_fee = $request->application_fee;
        $businessNature->new_fee = $request->new_fee;
        $businessNature->renew_fee = $request->renew_fee;
        $businessNature->signboard_fee = $request->signboard_fee;
        $businessNature->license_vat = $request->license_vat;
        $businessNature->status = $request->status;
        $businessNature->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'license_fee' => 'required',
            'application_fee' => 'required',
            'new_fee' => 'required',
            'renew_fee' => 'required',
            'signboard_fee' => 'required',
            'license_vat' => 'required',
            'status' => 'required',
        ]);

        $businessNature = BusinessNature::findOrFail($id);
        $businessNature->name = $request->name;
        $businessNature->license_fee = $request->license_fee;
        $businessNature->application_fee = $request->application_fee;
        $businessNature->new_fee = $request->new_fee;
        $businessNature->renew_fee = $request->renew_fee;
        $businessNature->signboard_fee = $request->signboard_fee;
        $businessNature->license_vat = $request->license_vat;
        $businessNature->status = $request->status;
        $businessNature->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function delete($id)
    {
        BusinessNature::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
}
