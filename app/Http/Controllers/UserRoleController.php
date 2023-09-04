<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;


class UserRoleController extends Controller
{

  

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
