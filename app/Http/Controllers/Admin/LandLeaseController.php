<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\LandKhotiyan;
use App\Models\LandLease;
use App\Models\LandNature;
use App\Models\User;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\Request;

class LandLeaseController extends Controller
{
    use ResponseStatusTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'বরাদ্ধপ্রাপ্তদের তালিকা';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavLandLeaseIndexActiveCLass'] = 'active';
        $data['landLeases'] = LandLease::applicationApproved()->paginate();
        return view('admin.land_lease.index')->with($data);
    }

    public function cancelledLandLeaseList()
    {
        $data['pageTitle'] = 'বাতিল বরাদ্ধপ্রাপ্তদের তালিকা';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavCancelledLandLeaseIndexActiveCLass'] = 'active';
        $data['landLeases'] = LandLease::applicationCancelled()->paginate();

        return view('admin.land_lease.cancelled-list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'বরাদ্ধপ্রাপ্তদের ডাটা এন্ট্রি ফর্ম';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavAddLandLeaseActiveCLass'] = 'active';
        $data['divisions'] = Division::all();
        $data['landKhotiyans'] = LandKhotiyan::all();
        $data['users'] = User::all();
        return view('admin.land_lease.create')->with($data);
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
            'user_id' => 'required',
            'applicant_name_en' => 'required',
            'applicant_name_bn' => 'required',
            'father_name' => 'required',
            'applicant_email' => 'required',
            'nid' => 'required',
            'birth_of_date' => 'required',
            'mobile_number' => 'required',
        ]);

        $land_lease = new LandLease();
        $land_lease->user_id = $request->user_id;
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
        $land_lease->land_khotiyan_id = $request->land_khotiyan_id;
        $land_lease->land_dag_id = $request->land_dag_id;
        $land_lease->land_nature = $request->land_nature;
        $land_lease->land_amount_id = $request->land_amount_id;

        $land_lease->land_north = $request->land_north;
        $land_lease->land_south = $request->land_south;
        $land_lease->land_east = $request->land_east;
        $land_lease->land_west = $request->land_west;
        $land_lease->first_date_of_lease = $request->first_date_of_lease;
        $land_lease->first_session_lease = $request->first_session_lease;
        $land_lease->last_date_of_lease = $request->last_date_of_lease;
        $land_lease->last_session_lease = $request->last_session_lease;
        $land_lease->application_status = LAND_LEASE_APPLICATION_STATUS_APPROVED;
        $land_lease->save();

        return redirect()->route('admin.land-lease.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function leaseApplication($id)
    {
        $data['pageTitle'] = 'Land Lease';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavLandLeaseIndexActiveCLass'] = 'active';
        $data['landLease'] = LandLease::find($id);
        return view('pdf.land-lease-application-pdf')->with($data);
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

    public function userInfo(Request $request)
    {
        $response['user'] = User::find($request->user_id);
        return $this->successApiResponse($response);
    }
}
