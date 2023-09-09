<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\RequirementDetail;
use App\Models\Requirement;
use App\Models\Access;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\DeliveryLocation;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{

    public function SubmitApplicantCrendential(Request $request){
        \Log::info($request);
        $applicantCredential = json_decode($request['applicantCredential'], true);
        $UserRole = new UserRole();
        $UserRole->user_id  = $request->user()->id;
        $UserRole->user_role_details_id  = $request['user_role_deitals_id'];
        $UserRole->status  = 'pending';
        $UserRole->save();
    

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
                    'user_role_id' => $UserRole->id,
                    'picture_path' => '/applicant_credentials/' . $name,
                    'created_at' => now(), // Set the created_at timestamp to the current date and time
                ]);
                
                $i++;
            }
        }


        // //seller
        if($request['user_role_deitals_id'] == 3){
            $store = new Store();
            $store->user_role_id = $UserRole->user_id;
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
        else if($request['user_role_deitals_id'] == 4){
            $DeliveryLocation = new DeliveryLocation();
            $DeliveryLocation->user_role_id = $UserRole->user_id;
            $DeliveryLocation->latitude = $request['latitude'];
            $DeliveryLocation->longitude = $request['longitude'];
            $DeliveryLocation->save();
        }
    }

    public function GetApplicants(){
        $UserRole = UserRole::where('status', 'pending')
        ->join('user_details', 'user_details.user_id', 'user_roles.user_id')
        ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
        ->select('user_roles.id as user_role_id','user_roles.status','user_details.gender','user_details.age','user_details.name as applicant_name','user_role_details.name as user_role_name')
        ->get();
        return $UserRole;        
    }

    
    public function Get_UserRole_With_Accessess_And_Requirements()
    {
        $userRoles = DB::table('user_roles')
        ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
        ->distinct('user_roles.user_role_details_id') 
        ->select('user_role_details.name','user_role_details.id')
        ->get();
        $userRoles->transform(function ($item) {
            $RequirementDetails = Requirement::getQuery()
            ->join('requirement_details', 'requirement_details.id', 'requirements.requirement_details_id')
            ->where('requirements.user_role_details_id', $item->id)
            ->whereNull('requirements.deleted_at') 
            ->select(
                'requirement_details.name as requirement_detailsName',
                'requirement_details.id as requirement_details_id',
            )
            ->get();
            $item->RequirementDetails = $RequirementDetails; 
            
            $Accesses = Access::getQuery()
            ->join('side_navs', 'side_navs.id', 'accesses.side_nav_id')
            ->where('accesses.user_role_details_id', $item->id)
            ->whereNull('accesses.deleted_at') 
            ->select(
                'side_navs.id as sidenav_id',
                'side_navs.name as side_nav_name',
            )
            ->get();
            $item->Accesses = $Accesses; 
            return $item;
        });
        return $userRoles;
    }
    
    public function index()
    {
        $UserRole = UserRole::where('status', '!=', 'active')->get();
        return $UserRole;        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method is typically used to display a form for creating a new user role.
        // You can return a view here to render the form.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userRole = new UserRole([
            'name' => $request->input('name'),
        ]);
        $userRole->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve a specific user role by ID from the database
        $userRole = UserRole::find($id);

        if (!$userRole) {
            // Return a response if the user role was not found
            return response()->json(['message' => 'User role not found'], 404);
        }

        // Return the user role as a JSON response
        return response()->json($userRole);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // This method is typically used to display a form for editing an existing user role.
        // You can return a view here to render the edit form.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Access::where('user_role_details_id', $id)->delete();
        Requirement::where('user_role_details_id', $id)->delete();
        for($i=0; $i<sizeof($request['selected_sidenav']); $i++){
            $access = new Access();
            $access->user_role_details_id = $id;
            $access->side_nav_id = $request['selected_sidenav'][$i];
            $access->save();
        }
        for($i=0; $i<sizeof($request['selected_requirement']); $i++){
            $requirement = new Requirement();
            $requirement->user_role_details_id = $id;
            $requirement->requirement_details_id = $request['selected_requirement'][$i];
            $requirement->save();
        }
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the user role by ID from the database
        $userRole = UserRole::find($id);

        if (!$userRole) {
            // Return a response if the user role was not found
            return response()->json(['message' => 'User role not found'], 404);
        }

        // Delete the user role
        $userRole->delete();

        // Return a success response
        return response()->json(['message' => 'User role deleted successfully']);
    }
}
