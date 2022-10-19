<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\LandKhotiyan;
use App\Models\Mouza;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\Request;

class LandKhotiyanController extends Controller
{
    use ResponseStatusTrait;
    public function index(Request $request)
    {
        $data['pageTitle'] = 'জমি খতিয়ান তালিকা';
        $data['navLandInformationActiveCLass'] = 'hover show';
        $data['subNavLandKhotiyanActiveCLass'] = 'active';

        $data['landKhotiyans'] = LandKhotiyan::where(function ($q) use ($request){
            if ($request->search_string) {
                $q->where('name', 'like', "%{$request->search_string}%");
            }
        })->paginate();

        return view('admin.land_information.land_khotiyans')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $land_khotiyan = new LandKhotiyan();
        $land_khotiyan->name = $request->name;
        $land_khotiyan->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $land_khotiyan = LandKhotiyan::find($id);
        $land_khotiyan->name = $request->name;
        $land_khotiyan->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function delete($id)
    {
        LandKhotiyan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }

    public function getMouza(Request $request)
    {
        $response['mouzas'] = Mouza::select('id','name')->where('upazila_id', $request->upazila_id)->get();
        $response['mouza_id'] = $request->mouza_id;
        return $this->successApiResponse($response);
    }
}
