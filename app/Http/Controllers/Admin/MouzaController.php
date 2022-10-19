<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Mouza;
use Illuminate\Http\Request;

class MouzaController extends Controller
{
    public function index(Request $request)
    {
        $data['pageTitle'] = 'Mouza List';
        $data['navLandInformationActiveCLass'] = 'hover show';
        $data['subNavMouzaActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['mouzas'] = Mouza::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['mouzas'] = Mouza::paginate();
        }

        $data['divisions'] = Division::all();

        return view('admin.land_information.mouzas')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'name' => 'required',
            'land_nature_filled_present_rate' => 'required',
            'land_nature_pond_present_rate' => 'required',
        ]);

        $mouza = new Mouza();
        $mouza->division_id = $request->division_id;
        $mouza->district_id = $request->district_id;
        $mouza->upazila_id = $request->upazila_id;
        $mouza->name = $request->name;
        $mouza->land_nature_filled_present_rate = $request->land_nature_filled_present_rate;
        $mouza->land_nature_pond_present_rate = $request->land_nature_pond_present_rate;
        $mouza->land_nature_filled_recommended_rate = $request->land_nature_filled_recommended_rate;
        $mouza->land_nature_pond_recommended_rate = $request->land_nature_pond_recommended_rate;
        $mouza->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'name' => 'required',
            'land_nature_filled_present_rate' => 'required',
            'land_nature_pond_present_rate' => 'required',
        ]);

        $mouza = Mouza::find($id);
        $mouza->division_id = $request->division_id;
        $mouza->district_id = $request->district_id;
        $mouza->upazila_id = $request->upazila_id;
        $mouza->name = $request->name;
        $mouza->land_nature_filled_present_rate = $request->land_nature_filled_present_rate;
        $mouza->land_nature_pond_present_rate = $request->land_nature_pond_present_rate;
        $mouza->land_nature_filled_recommended_rate = $request->land_nature_filled_recommended_rate;
        $mouza->land_nature_pond_recommended_rate = $request->land_nature_pond_recommended_rate;
        $mouza->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function delete($id)
    {
        Mouza::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
}
