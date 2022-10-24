<?php

namespace App\Http\Controllers\Admin\Trade;

use App\Http\Controllers\Controller;
use App\Models\BusinessManagement;
use Illuminate\Http\Request;

class BusinessManagementController extends Controller
{
    public function index(Request $request)
    {
        $data['pageTitle'] = 'ব্যবসা ব্যবস্থাপনা';
        $data['navTradeActiveClass'] = 'hover show';
        $data['subNavBusinessManagementActiveClass'] = 'active';
        $data['businessManagements'] = BusinessManagement::paginate();
        return view('admin.trade.business-management-list')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'market_branch' => 'required',
            'ward_no' => 'required',
            'location' => 'required',
            'market_name' => 'required',
            'status' => 'required',
        ]);

        $businessManagement = new BusinessManagement();
        $businessManagement->market_branch = $request->market_branch;
        $businessManagement->ward_no = $request->ward_no;
        $businessManagement->location = $request->location;
        $businessManagement->market_name = $request->market_name;
        $businessManagement->status = $request->status;
        $businessManagement->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'market_branch' => 'required',
            'ward_no' => 'required',
            'location' => 'required',
            'market_name' => 'required',
            'status' => 'required',
        ]);

        $businessManagement = BusinessManagement::findOrFail($id);
        $businessManagement->market_branch = $request->market_branch;
        $businessManagement->ward_no = $request->ward_no;
        $businessManagement->location = $request->location;
        $businessManagement->market_name = $request->market_name;
        $businessManagement->status = $request->status;
        $businessManagement->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function delete($id)
    {
        BusinessManagement::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
}
