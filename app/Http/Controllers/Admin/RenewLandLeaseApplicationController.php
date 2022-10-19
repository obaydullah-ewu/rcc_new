<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AssistantComputerInvestigationReport;
use App\Models\LandLease;
use App\Models\SurveyorInvestigationReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RenewLandLeaseApplicationController extends Controller
{
    public function renewLandLeaseApplication(Request $request)
    {
        $data['pageTitle'] = 'জমি ইজারা নবায়ন আবেদনের তালিকা';
        $data['navNewLandLeaseActiveCLass'] = 'hover show';
        $data['subNavNewLandLeaseListActiveCLass'] = 'active';

        $search_string = $request['search_string'];
        $data['landLeases'] = LandLease::applicationApproved()->renewalPending()->where(function ($q) use ($search_string){
            if ($search_string) {
                $q->where('applicant_name_en', 'like', "%{$search_string}%")->orWhere('applicant_name_bn', 'like', "%{$search_string}%");
            }
        })->where('approval_cycle_admin_role_id', Auth::guard('admin')->user()->role_id)->paginate();

        return view('admin.renew_land_lease.index')->with($data);
    }

    public function approvalCycleRoleIdChange(Request $request)
    {
        $land_lease = LandLease::findOrFail($request->land_lease_id);
        $land_lease->approval_cycle_id = $request->approval_cycle_id;
        $land_lease->renewal_status = $request->renewal_status;
        $land_lease->approval_cycle_admin_role_id = $request->approval_cycle_id == 5 ? 1 : $request->approval_cycle_id;
        if ($request->renewal_status == LAND_LEASE_RENEWAL_STATUS_CANCELLED) {
            foreach(Role::all() as $role){
                if($role->id ==  Auth::guard('admin')->user()->role_id){
                    $land_lease->renewal_cancelled_by = $role->name;
                }
            }
        }
        $land_lease->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function surveyorInvestigationReport($land_lease_uuid)
    {
        $data['pageTitle'] = ' তদন্ত প্রতিবেদন তৈরী করুন';
        $data['navNewLandLeaseActiveCLass'] = 'hover show';
        $data['subNavNewLandLeaseListActiveCLass'] = 'active';
        $data['landLease'] = LandLease::where('uuid', $land_lease_uuid)->firstOrFail();
        $data['surveyorReport'] = SurveyorInvestigationReport::where('land_lease_id', $data['landLease']->id)->first();
        return view('admin.renew_land_lease.surveyor-investigation-report')->with($data);
    }

    public function surveyorInvestigationReportStore(Request $request, $land_lease_uuid)
    {
        $request->validate([
          'investigation_english_date' =>  'required',
          'vat' =>  'required',
          'tax' =>  'required',
          'stamp_money' =>  'required',
        ]);

        $landLease = LandLease::where('uuid', $land_lease_uuid)->firstOrFail();
        $surveyor = SurveyorInvestigationReport::where('land_lease_id', $landLease->id)->first();
        if (!$surveyor) {
            $surveyor = new SurveyorInvestigationReport();
        }
        $surveyor->land_lease_id = $landLease->id;
        $surveyor->investigation_english_date = $request->investigation_english_date;
        $surveyor->investigation_bangla_date = $request->investigation_bangla_date;
        $surveyor->last_date_of_renew = $landLease->last_date_of_lease;
        $surveyor->vat = $request->vat;
        $surveyor->tax = $request->tax;
        $surveyor->stamp_money = $request->stamp_money;
        $surveyor->deposit_money_submit_day = $request->deposit_money_submit_day;
        $surveyor->save();

        return redirect()->route('admin.renew-lease-application.index')->with('success', 'Report store successfully');
    }

    public function surveyorInvestigationReportShow($land_lease_uuid)
    {
        $data['landLease'] = LandLease::where('uuid', $land_lease_uuid)->first();
        $data['surveyor'] = SurveyorInvestigationReport::where('land_lease_id', $data['landLease']->id)->firstOrFail();
        $data['admin'] = Admin::whereRoleId(1)->first();

        return view('pdf.pdf-surveyor-investigation-report')->with($data);
    }

    public function assistantComputerInvestigationReportShow($land_lease_uuid)
    {
        $data['landLease'] = LandLease::where('uuid', $land_lease_uuid)->first();
        $data['assistantComputer'] = AssistantComputerInvestigationReport::where('land_lease_id', $data['landLease']->id)->firstOrFail();
        return view('pdf.pdf-assistant-computer-investigation-report')->with($data);
    }

    public function orderSheetShow($land_lease_uuid)
    {
        $data['landLease'] = LandLease::where('uuid', $land_lease_uuid)->first();
        $data['assistantComputer'] = AssistantComputerInvestigationReport::where('land_lease_id', $data['landLease']->id)->firstOrFail();
        return view('pdf.pdf-order-sheet')->with($data);
    }

    public function assistantComputerInvestigationReport($land_lease_uuid)
    {
        $data['pageTitle'] = 'তদন্ত প্রতিবেদন তৈরী করুন';
        $data['navNewLandLeaseActiveCLass'] = 'hover show';
        $data['subNavNewLandLeaseListActiveCLass'] = 'active';
        $data['landLease'] = LandLease::where('uuid', $land_lease_uuid)->firstOrFail();
        $data['assistantComputer'] = AssistantComputerInvestigationReport::where('land_lease_id', $data['landLease']->id)->first();
        return view('admin.renew_land_lease.assistant-computer-investigation-report')->with($data);
    }

    public function assistantComputerInvestigationReportStore(Request $request, $land_lease_uuid)
    {
        $request->validate([
            'investigation_english_date' =>  'required',
            'vat' =>  'required',
            'tax' =>  'required',
            'stamp_money' =>  'required',
        ]);

        $landLease = LandLease::where('uuid', $land_lease_uuid)->firstOrFail();
        $assistantComputer = AssistantComputerInvestigationReport::where('land_lease_id', $landLease->id)->first();
        if (!$assistantComputer) {
            $assistantComputer = new AssistantComputerInvestigationReport();
        }
        $assistantComputer->land_lease_id = $landLease->id;
        $assistantComputer->investigation_english_date = $request->investigation_english_date;
        $assistantComputer->investigation_bangla_date = $request->investigation_bangla_date;
        $assistantComputer->last_date_of_renew = $landLease->last_date_of_lease;
        $assistantComputer->vat = $request->vat;
        $assistantComputer->tax = $request->tax;
        $assistantComputer->stamp_money = $request->stamp_money;
        $assistantComputer->deposit_money_submit_day = $request->deposit_money_submit_day;
        $assistantComputer->save();

        return redirect()->route('admin.renew-lease-application.index')->with('success', 'Report store successfully');
    }

    public function cancelledRenewLandLeaseList()
    {
        $data['pageTitle'] = 'বাতিল নবায়নের বরাদ্ধপ্রাপ্তদের তালিকা';
        $data['navLandLeaseActiveCLass'] = 'hover show';
        $data['subNavCancelledRenewLandLeaseIndexActiveCLass'] = 'active';
        $data['landLeases'] = LandLease::applicationApproved()->renewalCancelled()->paginate();

        return view('admin.renew_land_lease.cancelled-list')->with($data);
    }
}
