<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\Requirement;
use App\Models\Access;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\DeliveryLocation;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{

    public function ApproveUserRole(String $id){
        DB::table('user_roles')
        ->where('id', $id)
        ->update(['status' => 'active']);
        return 'success';
    }
    
    public function DissaproveUserRole(String $id){
        DB::table('user_roles')
        ->where('id', $id)
        ->update(['status' => 'dissaproved']);
        return 'success';
    }
    
    public function SubmitApplicantCrendential(Request $request){
        $applicantCredential = json_decode($request['applicantCredential'], true);
        $UserRole = new UserRole();
        $UserRole->user_id  = $request->user()->id;
        $UserRole->user_role_details_id  = $request['user_role_details_id'];
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
                    'created_at' => now(), 
                ]);
                
                $i++;
            }
        }


        //seller
        if($request['user_role_details_id'] == 3){
            $store = new Store();
            $store->user_role_id = $UserRole->id;
            $store->name = $request['storeName'];
            $store->address = $request['storeAddress'];
            $store->status = $request['pending'];
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
        else if($request['user_role_details_id'] == 4){
            $DeliveryLocation = new DeliveryLocation();
            $DeliveryLocation->user_role_id = $UserRole->id;
            $DeliveryLocation->latitude = $request['latitude'];
            $DeliveryLocation->longitude = $request['longitude'];
            $DeliveryLocation->save();
        }
    }

    public function GetApplicants(){
        $UserRole = UserRole::join('user_details', 'user_details.user_id', 'user_roles.user_id')
        ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
        ->select('user_roles.id as user_role_id','user_roles.status','user_details.gender','user_details.age', 'user_role_details.name as user_role_name', DB::raw("CONCAT_WS(' ', user_details.first_name, user_details.middle_name, user_details.last_name) as applicant_name"))
        ->get();
        return $UserRole;        
    }

    
    public function Get_UserRole_With_Accessess_And_Requirements()
    {
        $userRoles = DB::table('user_role_details')
        ->select('user_role_details.name','user_role_details.id')
        ->get();
        $userRoles->transform(function ($item) {
            $RequirementDetails = Requirement::getQuery()
            ->join('requirement_details', 'requirement_details.id', 'requirements.requirement_details_id')
            ->where('requirements.user_role_details_id', $item->id)
            ->whereNull('requirements.deleted_at') 
            ->whereNull('requirement_details.deleted_at') 
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

  
    public function store(Request $request)
    {
        $userRole = new UserRole([
            'name' => $request->input('name'),
        ]);
        $userRole->save();
        return 'success';
    }


    public function show(string $id)
    {
        $userRole = UserRole::where('user_id', $id)
        ->join('user_role_details','user_role_details.id','user_roles.user_role_details_id')
        ->select('user_roles.id','user_roles.status','user_role_details.name')
        ->get();
        return $userRole;
    }

    public function update(Request $request, string $id)
    {
        // Access::where('user_role_details_id', $id)->delete();
        Requirement::where('user_role_details_id', $id)->delete();
        // for($i=0; $i<sizeof($request['selected_sidenav']); $i++){
        //     $access = new Access();
        //     $access->user_role_details_id = $id;
        //     $access->side_nav_id = $request['selected_sidenav'][$i];
        //     $access->save();
        // }
        for($i=0; $i<sizeof($request['selected_requirement']); $i++){
            $requirement = new Requirement();
            $requirement->user_role_details_id = $id;
            $requirement->requirement_details_id = $request['selected_requirement'][$i];
            $requirement->save();
        }
        return 'success';
    }

   
    public function destroy(string $id)
    {
        $userRole = UserRole::find($id);

        if (!$userRole) {
            return response()->json(['message' => 'User role not found'], 404);
        }

        $userRole->delete();

        return response()->json(['message' => 'User role deleted successfully']);
    }
}
