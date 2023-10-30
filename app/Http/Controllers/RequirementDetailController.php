<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequirementDetail;
use App\Models\Requirement;


class RequirementDetailController extends Controller
{
    public function index()
    {
        $requirementDetails = RequirementDetail::all();
        return $requirementDetails;
    }

    public function store(Request $request)
    {
        $requirementDetail = new RequirementDetail();
        $requirementDetail->name =$request->input('name');
        $requirementDetail->save();
        return 'success';
    }

    public function show(string $id)
    {
        $Requirement = Requirement::getQuery()
        ->join('requirement_details', 'requirement_details.id', 'requirements.requirement_details_id')
        ->where('user_role_details_id', $id)
        ->whereNull('requirements.deleted_at')
        ->select('requirement_details.*')
        ->get();
        return $Requirement;
    }

    public function GET_REQUIREMENT_DETAIL_BY_USER_ROLE_DETAILS_ID(String $id)
    {
        $Requirement = Requirement::getQuery()
        ->join('requirement_details', 'requirement_details.id', 'requirements.requirement_details_id')
        ->where('user_role_details_id', $id)
        ->whereNull('requirements.deleted_at')
        ->whereNull('requirement_details.deleted_at')
        ->select('requirement_details.*')
        ->get();
        return $Requirement;
    }

    public function update(Request $request, string $id)
    {
        $requirementDetail = RequirementDetail::findOrFail($id);
        $requirementDetail->update($request->all());
        return 'success';
    }

    public function destroy(string $id)
    {
        $requirementDetail = RequirementDetail::findOrFail($id);
        $requirementDetail->delete();
        return 'success';
    }
}
