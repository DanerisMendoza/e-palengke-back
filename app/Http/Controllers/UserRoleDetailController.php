<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRoleDetail;
use App\Models\UserRole;

class UserRoleDetailController extends Controller
{
    public function SubmitApplicantCrendential(Request $request){
        \Log::info($request);
        // $applicantCredential = json_decode($request['applicantCredential'], true);
        // $UserRole = new UserRole();
        // $UserRole->user_id  = $request->user()->id;
        // $UserRole->user_role_details_id  = $request['user_role_deitals_id'];
        // $UserRole->save();
    

        // $requirement_id = null;
        // if ($request->hasFile('files')) {
        //     $i=0;
        //     foreach ($request->file('files') as $file) {
        //         $file_name = $file->getClientOriginalName();
        //         $ext = $file->getClientOriginalExtension();
        //         $name = explode('.', $file_name)[0] . '-' . uniqid() . '.' . $ext;
        //         $name = str_replace(' ', '', $name);
        //         $file->move(public_path('applicant_credentials'), $name);

        //         DB::table('applicant_credentials')->insert([
        //             'requirement_details_id' => $applicantCredential[$i]['id'],
        //             'user_role_id' => $userRole->id,
        //             'picture_path' => '/applicant_credentials/' . $name,
        //         ]);
        //         $requirement_id =  $applicantCredential[$i]['id'];
        //         $i++;
        //     }
        // }


        // //seller
        // if($request['requirement_id'] == 1){
        //     $store = new Store();
        //     $store->user_role_id = $userRole->user_id;
        //     $store->name = $request['storeName'];
        //     $store->latitude = $request['latitude'];
        //     $store->longitude = $request['longitude'];
        //     $store->save();

        //     foreach (json_decode($request->storeType, true) as $id) {
        //         $storeType = new StoreType();
        //         $storeType->store_id = $store->id;
        //         $storeType->store_type_details_id = $id;
        //         $storeType->save();
        //     }
        // }
        // // delivery
        // else if($request['requirement_id'] == 2){
        //     $DeliveryLocation = new DeliveryLocation();
        //     $DeliveryLocation->user_role_id = $userRole->user_id;
        //     $DeliveryLocation->latitude = $request['latitude'];
        //     $DeliveryLocation->longitude = $request['longitude'];
        //     $DeliveryLocation->save();
        // }
    }

    // List all user role details
    public function index()
    {
        $userRoleDetails = UserRoleDetail::all();
        return $userRoleDetails;
    }

    // Create a new user role detail
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'role_id' => 'required|integer',
            // Add validation rules for other fields here
        ]);

        $userRoleDetail = UserRoleDetail::create($data);

        return $userRoleDetail;
    }

    // Retrieve a specific user role detail
    public function show($id)
    {
        $userRoleDetail = UserRoleDetail::findOrFail($id);
        return $userRoleDetail;
    }

    // Update a user role detail
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'role_id' => 'required|integer',
            // Add validation rules for other fields here
        ]);

        $userRoleDetail = UserRoleDetail::findOrFail($id);
        $userRoleDetail->update($data);

        return $userRoleDetail;
    }

    // Delete a user role detail
    public function destroy($id)
    {
        $userRoleDetail = UserRoleDetail::findOrFail($id);
        $userRoleDetail->delete();

        return null;
    }
}
