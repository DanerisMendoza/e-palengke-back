<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRoleDetail;

class UserRoleDetailController extends Controller
{
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
