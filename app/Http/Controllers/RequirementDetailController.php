<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequirementDetail;

class RequirementDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requirementDetails = RequirementDetail::all();
        return $requirementDetails;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method typically shows a form for creating a new resource.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requirementDetail = new RequirementDetail();
        $requirementDetail->requirement_id = $request->input('requirement_id');
        $requirementDetail->name =$request->input('name');
        $requirementDetail->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the RequirementDetail by its ID
        $requirementDetails = RequirementDetail::getQuery()
            ->where('requirement_id', $id)
            ->whereNull('deleted_at')
            ->select('requirement_details.name','requirement_details.id')
            ->get();
        
        // Return JSON response
        return response()->json($requirementDetails);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // This method typically shows a form for editing an existing resource.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the RequirementDetail by its ID
        $requirementDetail = RequirementDetail::findOrFail($id);
        // // Update the RequirementDetail with the validated data
        $requirementDetail->update($request->all());
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the RequirementDetail by its ID and delete it
        $requirementDetail = RequirementDetail::findOrFail($id);
        $requirementDetail->delete();
        return 'success';
    }
}
