<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequirementDetail;
use App\Models\Requirement;


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
        \Log::info($request);
        $requirementDetail = new RequirementDetail();
        // $requirementDetail->requirement_details_id= $request->input('requirement_id');
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
            // ->where('requirement_details.id', $id)
            ->whereNull('deleted_at')
            ->select('requirement_details.name','requirement_details.id')
            ->get();
        
        // Return JSON response
        return response()->json($requirementDetails);
    }
    public function GET_REQUIREMENT_DETAIL_BY_USER_ROLE_DETAILS_ID(String $id)
    {
        $Requirement = Requirement::getQuery()
        ->join('requirement_details', 'requirement_details.id', 'requirements.requirement_details_id')
        ->where('user_role_details_id', $id)
        ->whereNull('requirements.deleted_at')
        ->select('requirement_details.*')
        ->get();
        return $Requirement;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $name = $request->input('name');

        try {
            // Find the existing RequirementDetail by its ID
            $requirementDetail = RequirementDetail::findOrFail($id);
    
            // Update the RequirementDetail with the validated data
            $requirementDetail->name = $name;
            $requirementDetail->save();
    
            // Return a success response
            return response()->json(['message' => 'RequirementDetail updated successfully']);
        } catch (\Exception $e) {
            // Handle any errors and return an error response
            return response()->json(['error' => 'Failed to update RequirementDetail'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        \Log::info($request);
        \Log::info($id);
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
