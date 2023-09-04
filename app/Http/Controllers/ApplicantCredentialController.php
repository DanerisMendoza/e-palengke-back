<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantCredential;
use App\Models\UserRole;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\RequirementDetail;
use App\Models\DeliveryLocation;
use Illuminate\Support\Facades\DB;

class ApplicantCredentialController extends Controller
{
    public function SubmitApplicantCrendential(Request $request){
        $applicantCredential = json_decode($request['applicantCredential'], true);
        $userRole = new UserRole();
        $userRole->user_id  = $request['user_id' ];
        $userRole->name = $request['user_role_name'];
        $userRole->requirement_id = $request['requirement_id'];
        $userRole->status = $request['status'];
        $userRole->save();
    

        $requirement_id = null;
        if ($request->hasFile('files')) {
            $i=0;
            foreach ($request->file('files') as $file) {
                $file_name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $name = explode('.', $file_name)[0] . '-' . uniqid() . '.' . $ext;
                $name = str_replace(' ', '', $name);
                $file->move(public_path('applicant_credentials'), $name);

                DB::table('applicant_credentials')->insert([
                    'requirement_details_id' => $applicantCredential[$i]['id'],
                    'user_role_id' => $userRole->id,
                    'picture_path' => '/applicant_credentials/' . $name,
                ]);
                $requirement_id =  $applicantCredential[$i]['id'];
                $i++;
            }
        }


        //seller
        if($request['requirement_id'] == 1){
            $store = new Store();
            $store->user_role_id = $userRole->user_id;
            $store->name = $request['storeName'];
            $store->latitude = $request['latitude'];
            $store->longitude = $request['longitude'];
            $store->save();

            foreach (json_decode($request->storeType, true) as $id) {
                $storeType = new StoreType();
                $storeType->store_id = $store->id;
                $storeType->store_type_details_id = $id;
                $storeType->save();
            }
        }
        // delivery
        else if($request['requirement_id'] == 2){
            $DeliveryLocation = new DeliveryLocation();
            $DeliveryLocation->user_role_id = $userRole->user_id;
            $DeliveryLocation->latitude = $request['latitude'];
            $DeliveryLocation->longitude = $request['longitude'];
            $DeliveryLocation->save();
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
