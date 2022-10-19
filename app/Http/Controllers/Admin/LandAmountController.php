<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\LandAmount;
use App\Models\LandDag;
use App\Models\LandKhotiyan;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\Request;

class LandAmountController extends Controller
{
    use ResponseStatusTrait;
    public function index(Request $request)
    {
        $data['pageTitle'] = 'জমির পরিমান';
        $data['navLandInformationActiveCLass'] = 'hover show';
        $data['subNavLandAmountActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['landAmounts'] = LandAmount::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else {
            $data['landAmounts'] = LandAmount::paginate();
        }

        $data['divisions'] = Division::all();
        $data['landKhotiyans'] = LandKhotiyan::all();

        return view('admin.land_information.land_amounts')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'mouza_id' => 'required',
            'land_khotiyan_id' => 'required',
            'land_dag_id' => 'required',
            'land_nature' => 'required',
            'amount' => 'required',
        ]);

        $land_amount = new LandAmount();
        $land_amount->division_id = $request->division_id;
        $land_amount->district_id = $request->district_id;
        $land_amount->upazila_id = $request->upazila_id;
        $land_amount->mouza_id = $request->mouza_id;
        $land_amount->land_khotiyan_id = $request->land_khotiyan_id;
        $land_amount->land_dag_id = $request->land_dag_id;
        $land_amount->land_nature = $request->land_nature;
        $land_amount->amount = $request->amount;
        $land_amount->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'mouza_id' => 'required',
            'land_khotiyan_id' => 'required',
            'land_dag_id' => 'required',
            'land_nature' => 'required',
            'amount' => 'required',
        ]);

        $land_amount = LandAmount::find($id);
        $land_amount->division_id = $request->division_id;
        $land_amount->district_id = $request->district_id;
        $land_amount->upazila_id = $request->upazila_id;
        $land_amount->mouza_id = $request->mouza_id;
        $land_amount->land_khotiyan_id = $request->land_khotiyan_id;
        $land_amount->land_dag_id = $request->land_dag_id;
        $land_amount->land_nature = $request->land_nature;
        $land_amount->amount = $request->amount;
        $land_amount->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function delete($id)
    {
        LandAmount::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }

    public function getLandDag(Request $request)
    {
        $response['landDags'] = LandDag::select('id','dag_no')
            ->where(['upazila_id' => $request->upazila_id, 'mouza_id' => $request->mouza_id, 'land_khotiyan_id' => $request->land_khotiyan_id])->get();
        $response['land_dag_id'] = $request->land_dag_id;
        return $this->successApiResponse($response);
    }

    public function getLandAmount(Request $request)
    {
        $response['landAmounts'] = LandAmount::select('id','amount')
            ->where(['upazila_id' => $request->upazila_id, 'mouza_id' => $request->mouza_id, 'land_khotiyan_id' => $request->land_khotiyan_id, 'land_dag_id' => $request->land_dag_id])->get();
        $response['land_dag_id'] = $request->land_dag_id;
        return $this->successApiResponse($response);
    }
}
