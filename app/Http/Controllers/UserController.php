<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserRole;
use App\Models\SideNav;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authenticate(Request $request){
        $user = $request->user();
        $result = DB::table('users')
        ->join('user_roles', 'user_roles.user_id', 'users.id')
        ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
        ->join('accesses', 'accesses.user_role_details_id', 'user_role_details.id')
        ->rightJoin('side_navs', 'side_navs.id', 'accesses.side_nav_id')
        ->where('user_roles.user_id', $user->id)
        ->whereNull('accesses.deleted_at') 
        ->select('side_navs.*')
        ->get();
        return $result;
    }

    public function GetSideNav(Request $request){
        $user = $request->user();
        \Log::info($user->id);
        $result = DB::table('users')
        ->join('user_roles', 'user_roles.user_id', 'users.id')
        ->join('user_role_details', 'user_role_details.id', 'user_roles.user_role_details_id')
        ->join('accesses', 'accesses.user_role_details_id', 'user_role_details.id')
        ->rightJoin('side_navs', 'side_navs.id', 'accesses.side_nav_id')
        ->where('user_roles.user_id', $user->id)
        ->whereNull('accesses.deleted_at') 
        ->select('side_navs.*')
        ->distinct('side_navs.name') 
        ->get();
        return $result;
    }

    public function GetAllSideNav(Request $request){
        $SideNav = SideNav::all();
        return $SideNav;
    }

    public function Register(Request $request){
        \Log::info($request);
        $User = new User();
        $User->username = $request->input('username');
        $User->password = bcrypt($request->input('password'));
        $User->save();
        $UserDetail = new UserDetail();
        $UserDetail->user_id = $User->id;
        $UserDetail->name = $request->input('name');
        $UserDetail->gender = $request->input('gender');
        $UserDetail->age = $request->input('age');
        $UserDetail->phone_number = $request->input('phone_number');
        $UserDetail->address = $request->input('address');
        $UserDetail->email = $request->input('email');
        $UserDetail->save();
        return 'success';
    }

    public function Logout(Request $request){
        $user = $request->user();
        $user->token()->revoke();
        return 'success';
    }

    public function GetUserDetails(){
        $userId = Auth::user()->id;
        $userDetail = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->where('users.id', '=', $userId)
            ->select('users.username', 'user_details.*')
            ->first();
        return $userDetail;
    }

    public function Login(Request $request)
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
                    $tokenRequest = Request::create('/oauth/token', 'post', $response);
                    $response = app()->handle($tokenRequest);
                    $data = json_decode($response->getContent());
                    $token = $data->access_token;
                    $responseContent = [
                        'message' => 'success',
                        'token' => $token,
                    ];
                    return response()->json($responseContent, 200);
                }
            } 
            else {
                return response()->json(
                    [
                        'message' => 'Incorrect Password.'
                    ],
                );
            }
        } else {
            return response()->json(
                [
                    'message' => 'The username were incorrect'
                ],
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
