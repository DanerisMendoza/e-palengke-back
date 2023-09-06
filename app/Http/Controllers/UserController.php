<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function logout(Request $request){
        $user = $request->user();
        $user->token()->revoke();
        return 'success';
    }

    public function getUserDetails(){
        $userId = Auth::user()->id;
        $userDetail = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->where('users.id', '=', $userId)
            ->select('users.username', 'user_details.*')
            ->first();
        return $userDetail;
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username'    => 'required',
            'password' => 'required'
        ]);
        $login = DB::table('users')
            ->select('password', 'username')
            ->where('username', $request->username)
            ->first();
        if ($login) {
            if (Hash::check($request->password, $login->password)) {
                $passwordGrantClient = Client::where('password_client', 1)->first();
                $response = [
                    'grant_type'    => 'password',
                    'client_id'     => $passwordGrantClient->id,
                    'client_secret' => $passwordGrantClient->secret,
                    'username'      => $request->username,
                    'password'      => $request->password,
                    'scope'         => '*',
                ];
                if (Auth::attempt($credentials)) {
                    $tokenrequest = Request::create('/oauth/token', 'post', $response);
                    return app()->handle($tokenrequest);
                }
            } else {
                return response()->json(
                    [
                        'message' => 'Incorrect Password.'
                    ],
                    Response::HTTP_NOT_ACCEPTABLE
                );
            }
        } else {
            return response()->json(
                [
                    'message' => 'The username were incorrect'
                ],
                Response::HTTP_NOT_ACCEPTABLE
            );
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
