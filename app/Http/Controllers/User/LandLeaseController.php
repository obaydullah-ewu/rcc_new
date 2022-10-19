<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\LandLease;
use App\Models\LandNature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandLeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'জমি লিজ';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavLandLeaseIndexActiveCLass'] = 'active';
        $data['landLeases'] = LandLease::where('user_id', Auth::id())->paginate();
        return view('user.land_lease.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'জমি লিজ';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavAddLandLeaseActiveCLass'] = 'active';
        $data['divisions'] = Division::all();
        $data['landNatures'] = LandNature::all();
        return view('user.land_lease.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'applicant_name_en' => 'required',
            'applicant_name_bn' => 'required',
            'father_name' => 'required',
            'applicant_email' => 'required',
            'nid' => 'required',
            'birth_of_date' => 'required',
            'mobile_number' => 'required',
        ]);

        $land_lease = new LandLease();
        $land_lease->user_id = Auth::id();
        $land_lease->applicant_name_en = $request->applicant_name_en;
        $land_lease->applicant_name_bn = $request->applicant_name_bn;
        $land_lease->father_name = $request->father_name;
        $land_lease->applicant_email = $request->applicant_email;
        $land_lease->nid = $request->nid;
        $land_lease->birth_of_date = $request->birth_of_date;
        $land_lease->mobile_number = $request->mobile_number;

        if ($request->has('applicant_image')){
            $land_lease->applicant_image = saveImage('LandLease', $request->applicant_image);
        }

        if ($request->has('applicant_signature')){
            $land_lease->applicant_signature = saveImage('LandLease', $request->applicant_signature);
        }

        $land_lease->applicant_division_id = $request->applicant_division_id;
        $land_lease->applicant_district_id = $request->applicant_district_id;
        $land_lease->applicant_upazila_id = $request->applicant_upazila_id;
        $land_lease->applicant_post_office_id = $request->applicant_post_office_id;
        $land_lease->applicant_village_id = $request->applicant_village_id;
        $land_lease->land_division_id = $request->land_division_id;
        $land_lease->land_district_id = $request->land_district_id;
        $land_lease->land_upazila_id = $request->land_upazila_id;
        $land_lease->land_mouza_id = $request->land_mouza_id;
        $land_lease->land_ledger_no_id = $request->land_ledger_no_id;
        $land_lease->land_spot_no_id = $request->land_spot_no_id;
        $land_lease->land_nature_id = $request->land_nature_id;
        $land_lease->land_amount_id = $request->land_amount_id;
        $land_lease->land_north = $request->land_north;
        $land_lease->land_south = $request->land_south;
        $land_lease->land_east = $request->land_east;
        $land_lease->land_west = $request->land_west;
        $land_lease->first_date_of_lease = $request->first_date_of_lease;
        $land_lease->first_session_lease = $request->first_session_lease;
        $land_lease->last_date_of_lease = $request->last_date_of_lease;
        $land_lease->last_session_lease = $request->last_session_lease;
        $land_lease->status = 'pending';
        $land_lease->save();

        return redirect()->route('user.land-lease.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pageTitle'] = 'জমি লিজ';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavLandLeaseIndexActiveCLass'] = 'active';
        $data['landLease'] = LandLease::whereUserId(Auth::id())->where('id',$id)->first();
        return view('user.land_lease.show')->with($data);
    }

    public function leaseApplication($id)
    {
        $data['pageTitle'] = 'Land Lease';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavLandLeaseIndexActiveCLass'] = 'active';
        $data['landLease'] = LandLease::whereUserId(Auth::id())->where('id',$id)->first();
        return view('user.land_lease.application-pdf')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeRenewalStatus(Request $request)
    {
        $landLease = LandLease::findOrFail($request->id);
        $landLease->approval_cycle_id = 1;
        $landLease->renewal_status = $request->renewal_status;
        $landLease->save();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
