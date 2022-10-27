<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\PostOffice;
use App\Models\Upazila;
use App\Models\Village;
use App\Models\Ward;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    use ResponseStatusTrait;
    //Start:: Division
    public function divisions(Request $request)
    {
        $data['pageTitle'] = 'বিভাগ তালিকা';
        $data['navLocationActiveCLass'] = 'hover show';
        $data['subNavDivisionActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['divisions'] = Division::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['divisions'] = Division::paginate();
        }

        return view('admin.location.divisions')->with($data);
    }

    public function divisionStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:divisions,name'
        ]);

        $division = new Division();
        $division->name = $request->name;
        $division->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function divisionUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:divisions,name,'.$id
        ]);

        $division = Division::find($id);
        $division->name = $request->name;
        $division->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function divisionDelete($id)
    {
        Division::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
    //End:: Division

    //Start:: District
    public function districts(Request $request)
    {
        $data['pageTitle'] = 'জেলা তালিকা';
        $data['navLocationActiveCLass'] = 'hover show';
        $data['subNavDistrictActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['districts'] = District::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['districts'] = District::paginate();
        }

        $data['divisions'] = Division::all();

        return view('admin.location.districts')->with($data);
    }

    public function districtStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'name' => 'required|unique:districts,name'
        ]);

        $district = new District();
        $district->division_id = $request->division_id;
        $district->name = $request->name;
        $district->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function districtUpdate(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'name' => 'required|unique:districts,name,'.$id
        ]);

        $district = District::find($id);
        $district->division_id = $request->division_id;
        $district->name = $request->name;
        $district->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function districtDelete($id)
    {
        District::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
    //End:: District

    //Start:: Upazila
    public function upazilas(Request $request)
    {
        $data['pageTitle'] = 'উপজেলা তালিকা';
        $data['navLocationActiveCLass'] = 'hover show';
        $data['subNavUpazilaActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['upazilas'] = Upazila::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['upazilas'] = Upazila::paginate();
        }

        $data['divisions'] = Division::all();

        return view('admin.location.upazilas')->with($data);
    }

    public function upazilaStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'name' => 'required',
        ]);

        $upazila = new Upazila();
        $upazila->division_id = $request->division_id;
        $upazila->district_id = $request->district_id;
        $upazila->name = $request->name;
        $upazila->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function upazilaUpdate(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'name' => 'required'
        ]);

        $upazila = Upazila::find($id);
        $upazila->division_id = $request->division_id;
        $upazila->district_id = $request->district_id;
        $upazila->name = $request->name;
        $upazila->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function upazilaDelete($id)
    {
        Upazila::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
    //End:: Upazila

    //Start:: Post Office
    public function postOffices(Request $request)
    {
        $data['pageTitle'] = 'পোস্ট অফিসের তালিকা';
        $data['navLocationActiveCLass'] = 'hover show';
        $data['subNavPostOfficeActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['postOffices'] = PostOffice::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['postOffices'] = PostOffice::paginate();
        }

        $data['divisions'] = Division::all();

        return view('admin.location.post-offices')->with($data);
    }

    public function postOfficeStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'name' => 'required',
        ]);

        $postOffice = new PostOffice();
        $postOffice->division_id = $request->division_id;
        $postOffice->district_id = $request->district_id;
        $postOffice->upazila_id = $request->upazila_id;
        $postOffice->name = $request->name;
        $postOffice->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function postOfficeUpdate(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'name' => 'required'
        ]);

        $PostOffice = PostOffice::find($id);
        $PostOffice->division_id = $request->division_id;
        $PostOffice->district_id = $request->district_id;
        $PostOffice->upazila_id = $request->upazila_id;
        $PostOffice->name = $request->name;
        $PostOffice->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function postOfficeDelete($id)
    {
        PostOffice::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
    //End:: Post Office

    //Start:: Ward
    public function wards(Request $request)
    {
        $data['pageTitle'] = 'ওয়ার্ড তালিকা';
        $data['navLocationActiveCLass'] = 'hover show';
        $data['subNavWardActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['wards'] = Ward::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['wards'] = Ward::paginate();
        }

        $data['divisions'] = Division::all();

        return view('admin.location.wards')->with($data);
    }

    public function wardStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'name' => 'required',
        ]);

        $ward = new Ward();
        $ward->division_id = $request->division_id;
        $ward->district_id = $request->district_id;
        $ward->upazila_id = $request->upazila_id;
        $ward->name = $request->name;
        $ward->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function wardUpdate(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'name' => 'required'
        ]);

        $ward = Ward::find($id);
        $ward->division_id = $request->division_id;
        $ward->district_id = $request->district_id;
        $ward->upazila_id = $request->upazila_id;
        $ward->name = $request->name;
        $ward->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function wardDelete($id)
    {
        Ward::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
    //End:: Ward

    //Start:: Village
    public function villages(Request $request)
    {
        $data['pageTitle'] = 'মহল্লা তালিকা';
        $data['navLocationActiveCLass'] = 'hover show';
        $data['subNavVillageActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['villages'] = Village::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['villages'] = Village::paginate();
        }

        $data['divisions'] = Division::all();

        return view('admin.location.villages')->with($data);
    }

    public function villageStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'post_office_id' => 'required',
            'ward_id' => 'required',
            'name' => 'required',
        ]);

        $village = new Village();
        $village->division_id = $request->division_id;
        $village->district_id = $request->district_id;
        $village->upazila_id = $request->upazila_id;
        $village->post_office_id = $request->post_office_id;
        $village->ward_id = $request->ward_id;
        $village->name = $request->name;
        $village->save();

        return redirect()->back()->with('success', 'Created Successful');
    }

    public function villageUpdate(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'post_office_id' => 'required',
            'ward_id' => 'required',
            'name' => 'required'
        ]);

        $village = Village::find($id);
        $village->division_id = $request->division_id;
        $village->district_id = $request->district_id;
        $village->upazila_id = $request->upazila_id;
        $village->post_office_id = $request->post_office_id;
        $village->ward_id = $request->ward_id;
        $village->name = $request->name;
        $village->save();

        return redirect()->back()->with('success', 'Updated Successful');
    }

    public function villageDelete($id)
    {
        Village::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
    //End:: Post Office

    public function getDistricts(Request $request)
    {
        $response['districts'] = District::select('id','name')->where('division_id', $request->division_id)->get();
        $response['district_id'] = $request->district_id;
        return $this->successApiResponse($response);
    }

    public function getUpazilas(Request $request)
    {
        $response['upazilas'] = Upazila::select('id','name')->where('district_id', $request->district_id)->get();
        $response['upazila_id'] = $request->upazila_id;
        return $this->successApiResponse($response);
    }

    public function getPostOffices(Request $request)
    {
        $response['postOffices'] = PostOffice::select('id','name')->where('upazila_id', $request->upazila_id)->get();
        $response['post_office_id'] = $request->post_office_id;
        return $this->successApiResponse($response);
    }

    public function getWards(Request $request)
    {
        $response['wards'] = Ward::select('id','name')->where('upazila_id', $request->upazila_id)->get();
        $response['ward_id'] = $request->ward_id;
        return $this->successApiResponse($response);
    }

    public function getVillages(Request $request)
    {
        $response['villages'] = Village::select('id','name')->where('ward_id', $request->ward_id)->get();
        $response['village_id'] = $request->village_id;
        return $this->successApiResponse($response);
    }
}
