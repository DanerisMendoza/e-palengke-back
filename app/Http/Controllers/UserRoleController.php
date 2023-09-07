<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\RequirementDetail;
use App\Models\Requirement;
use App\Models\Access;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{

  

    /**
     * Display a listing of the resource.
     */
    
    public function index()
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
            ->select(
                'requirements.id as requirement_id',
                'requirement_details.name as requirement_detailsName',
            )
            ->get();
            $item->RequirementDetails = $RequirementDetails; 
            
            $Accesses = Access::getQuery()
            ->join('side_navs', 'side_navs.id', 'accesses.side_nav_id')
            ->where('accesses.user_role_details_id', $item->id)
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
