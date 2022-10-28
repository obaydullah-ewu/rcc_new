<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CouncilorSignature;
use Illuminate\Http\Request;

class CouncilorSignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'কাউন্সিলর তালিকা';
        $data['navCitizenshipActiveClass'] = 'hover show';
        $data['subNavCouncilorSignatureActiveCLass'] = 'active';
        $data['councilorSignatures'] = CouncilorSignature::paginate(15);
        return view('admin.councilor_signature.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Signature';
        $data['navCitizenshipActiveClass'] = 'hover show';
        $data['subNavCouncilorSignatureActiveCLass'] = 'active';
        return view('admin.councilor_signature.add')->with($data);
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
            'ward_no' => 'required|unique:councilor_signatures,ward_no',
            'creator_signature' => 'required|file',
            'councilor_signature' => 'required|file',
        ]);

        $signature = new CouncilorSignature();
        $signature->ward_no = $request->ward_no;

        if ($request->has('creator_signature')){
            $creator_signature = saveImage('CouncilorSignature', $request->creator_signature);
            $signature->creator_signature = $creator_signature;
        }

        if ($request->has('councilor_signature')){
            $councilor_signature = saveImage('CouncilorSignature', $request->councilor_signature);
            $signature->councilor_signature = $councilor_signature;
        }

        $signature->save();

        return redirect()->route('admin.councilor-signature.index')->with('success', 'Created Successfully');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Signature';
        $data['navCitizenshipActiveClass'] = 'hover show';
        $data['subNavCouncilorSignatureActiveCLass'] = 'active';
        $data['signature'] = CouncilorSignature::find($id);
        return view('admin.councilor_signature.edit')->with($data);
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
        $request->validate([
            'ward_no' => 'required|unique:councilor_signatures,ward_no,'.$id,
        ]);

        $signature = CouncilorSignature::find($id);
        $signature->ward_no = $request->ward_no;

        if ($request->has('creator_signature')){
            deleteFile($signature->creator_signature);
            $creator_signature = saveImage('CouncilorSignature', $request->creator_signature);
            $signature->creator_signature = $creator_signature;
        }

        if ($request->has('councilor_signature')){
            deleteFile($signature->councilor_signature);
            $councilor_signature = saveImage('CouncilorSignature', $request->councilor_signature);
            $signature->councilor_signature = $councilor_signature;
        }

        $signature->save();

        return redirect()->route('admin.councilor-signature.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $signature = CouncilorSignature::find($id);
        deleteFile($signature->creator_signature);
        deleteFile($signature->councilor_signature);
        $signature->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
