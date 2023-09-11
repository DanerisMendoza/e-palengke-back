<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Models\RequirementDetail;

class RequirementController extends Controller
{
    // Display a listing of the requirements.
    public function index()
    {
        $requirements = Requirement::all();
        // $requirements->transform(function ($item) {
        //     $requirementDetails = RequirementDetail::getQuery()
        //     ->whereNull('deleted_at')
        //     ->where('requirement_id', $item->id)
        //     ->select('requirement_details.name','requirement_details.id')
        //     ->get();
        //     $item->requirementDetails = $requirementDetails; // Count the related data items
        //     return $item;
        // });
        return $requirements;
    }

    // Show the form for creating a new requirement.
    public function create()
    {
        // You can optionally implement this if needed.
    }

    // Store a newly created requirement in storage.
    public function store(Request $request)
    {
        //pumpasok sya dito hahaha
        // \Log::info('dito');
        $requirement = Requirement::create($request->all());
        return response()->json($requirement, 201);
    }

    // Display the specified requirement.
    public function show($id)
    {
        $requirement = Requirement::findOrFail($id);
        return response()->json($requirement);
    }

    // Show the form for editing the specified requirement.
    public function edit($id)
    {
        // You can optionally implement this if needed.
    }

    // Update the specified requirement in storage.
    public function update(Request $request, $id)
    {
        $requirement = Requirement::findOrFail($id);
        $requirement->update($request->all());
    }

    // Remove the specified requirement from storage.
    public function destroy($id)
    {
        $requirement = Requirement::findOrFail($id);
        $requirement->delete();
        return response()->json(null, 204);
    }

}
