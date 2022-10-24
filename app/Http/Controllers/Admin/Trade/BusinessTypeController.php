<?php

namespace App\Http\Controllers\Admin\Trade;

use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use Illuminate\Http\Request;

class BusinessTypeController extends Controller
{
    public function index(Request $request)
    {
        $data['pageTitle'] = 'ব্যবসা ধরণ';
        $data['navTradeActiveClass'] = 'hover show';
        $data['subNavBusinessTypeActiveClass'] = 'active';
        $data['businessTypes'] = BusinessType::paginate();
        return view('admin.trade.business-type-list')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
            'sub_type_name' => 'required',
            'status' => 'required',
        ]);

        $businessType = new BusinessType();
        $businessType->type_name = $request->type_name;
        $businessType->sub_type_name = $request->sub_type_name;
        $businessType->status = $request->status;
        $businessType->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required',
            'sub_type_name' => 'required',
            'status' => 'required',
        ]);

        $businessType = BusinessType::findOrFail($id);
        $businessType->type_name = $request->type_name;
        $businessType->sub_type_name = $request->sub_type_name;
        $businessType->status = $request->status;
        $businessType->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function delete($id)
    {
        BusinessType::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
}
