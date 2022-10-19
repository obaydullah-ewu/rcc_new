<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\LandDag;
use App\Models\LandKhotiyan;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\Request;

class LandDagController extends Controller
{
    use ResponseStatusTrait;
    public function index(Request $request)
    {
        $data['pageTitle'] = 'জমি দাগ নং তালিকা';
        $data['navLandInformationActiveCLass'] = 'hover show';
        $data['subNavLandDagActiveCLass'] = 'active';

        $data['landDags'] = LandDag::where(function ($q) use ($request){
            if ($request->search_string) {
                $q->where('dag_no', 'LIKE', "%{$request->search_string}%");
            }
        })->paginate();


        $data['divisions'] = Division::all();
        $data['landKhotiyans'] = LandKhotiyan::all();

        return view('admin.land_information.land_dags')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'mouza_id' => 'required',
            'land_khotiyan_id' => 'required',
            'dag_no' => 'required',
        ]);

        $land_spot = new LandDag();
        $land_spot->division_id = $request->division_id;
        $land_spot->district_id = $request->district_id;
        $land_spot->upazila_id = $request->upazila_id;
        $land_spot->mouza_id = $request->mouza_id;
        $land_spot->land_khotiyan_id = $request->land_khotiyan_id;
        $land_spot->dag_no = $request->dag_no;
        $land_spot->save();

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
            'dag_no' => 'required'
        ]);

        $land_spot = LandDag::find($id);
        $land_spot->division_id = $request->division_id;
        $land_spot->district_id = $request->district_id;
        $land_spot->upazila_id = $request->upazila_id;
        $land_spot->mouza_id = $request->mouza_id;
        $land_spot->land_khotiyan_id = $request->land_khotiyan_id;
        $land_spot->dag_no = $request->dag_no;
        $land_spot->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function delete($id)
    {
        LandDag::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
}
