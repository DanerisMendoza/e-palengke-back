<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function loginUser(Request $request){
        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Authentication successful
            return response()->json($user);
        } else {
            // Authentication failed
            return 'invalid';
        }
     
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // You can optionally implement this if needed.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'regex:/^[A-Za-z0-9]+$/','unique:users,username'],
            'password' => 'required|min:3',
        ]);
        
        if ($validator->fails()) {
            $errorMessages = $validator->errors()->all();
            return $errorMessages[0];
        }

        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return 'User not found';
        }
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // You can optionally implement this if needed.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request)
    {
        $user = User::where('id',$id)->first();
        $user ->username = $request->input('username');
        $user ->password = bcrypt($request->input('password'));
        $user->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return 'User not found';
        }
        // Delete the user
        $user->delete();
        return 'success';
    }
}
