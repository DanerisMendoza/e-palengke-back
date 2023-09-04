<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\ApplicantCredential;
use App\Models\RequirementDetail;
use Illuminate\Support\Facades\DB;


class UserRoleController extends Controller
{

    public function SubmitApplicantCrendential(Request $request){
        $applicantCredential = json_decode($request['applicantCredential'], true);
        $userRole = new UserRole();
        $userRole->user_id  = $request['user_id' ];
        $userRole->name = $request['user_role_name'];
        $userRole->requirement_id = $request['requirement_id'];
        $userRole->status = $request['status'];
        $userRole->save();
    

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
                
                $i++;
            }
        }
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

    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // Retrieve a list of user roles from the database
        $userRoles = UserRole::all();

        // Return the list of user roles as a JSON response
        return response()->json($userRoles);
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
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Retrieve the user role by ID from the database
        $userRole = UserRole::find($id);

        if (!$userRole) {
            // Return a response if the user role was not found
            return response()->json(['message' => 'User role not found'], 404);
        }

        // Update the fields of the user role instance
        $userRole->name = $request->input('name');
        // Map other request data to your model fields
        $userRole->save();

        // Return a success response
        return response()->json(['message' => 'User role updated successfully']);
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
