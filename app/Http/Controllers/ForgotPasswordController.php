<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ForgotPasswordController extends Controller
{
    public function sendResetCode(Request $request)
    {
        // Fetch the user based on the provided email
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response()->json([
                'title' => 'Warning',
                'message' => 'User not found',
                'icon' => 'warning'
            ]);
        }

        // Now, perform a join operation with the user_details table
        $userWithDetails = User::join('user_details', 'users.id', '=', 'user_details.user_id')
            ->where('users.id', $user->id)
            ->select('users.*', 'user_details.email')
            ->first();

        $userDetailsEmail = $userWithDetails->email;
        // Generate a random code
        $code = Str::random(6); // Adjust the length as needed

        // Store the code in the database
        $user->update(['reset_code' => $code]);

        // Send the code via email
        $this->sendResetCodeEmail($userDetailsEmail, $code);

        return response()->json([
            'title' => 'Success',
            'message' => 'Reset code sent to your email',
            'icon' => 'success',
            'status' => 1
        ]);
    }

    private function sendResetCodeEmail($userDetailsEmail, $code)
    {
        Mail::to($userDetailsEmail)->send(new ResetPasswordMail($code));
    }

    public function checkVerificationCode(Request $request){
        $requestCode = $request->code;
      
        
        $user = User::where('reset_code', $requestCode)
        ->where('username', $request->username) // Add your additional condition here
        ->first();
        
        if (!$user) {
            return response()->json([
                'title' => 'Warning',
                'message' => 'Wrong Code, please check your email',
                'icon' => 'warning',
                'status' => 0
            ]);
        } else {
            return response()->json([
                'title' => 'Successful',
                'message' => 'Correct code',
                'icon' => 'success',
                'status' => 1
            ]);
        }
    }

    public function changePassword(Request $request){
        $user = User::where('reset_code', $request->code)
        ->where('username', $request->username)
        ->first();

        if ($user) {
            // Update the user's password
            $user->password = bcrypt($request->password);
        
            // Save the changes
            if($user->save()){
                $user_detail = User::where('username',  $request->username)
                ->where('reset_code', $request->code)
                ->join('user_details','users.id', '=', 'user_details.user_id')
                ->select(DB::raw("CONCAT_WS(' ',user_details.first_name, ' ', user_details.middle_name, ' ', user_details.last_name) as full_name"))
                ->first();
                return response()->json([
                    'title' => 'Successful',
                    'message' => 'Password updated successfully',
                    'icon' => 'success',
                    'status' => 1
                ]);
            }else{
                return response()->json([
                    'title' => 'Error',
                    'message' => 'Password didnt update',
                    'icon' => 'error',
                    'status' => 0
                ]);
            }
        } else {
            // Handle the case where no user is found with the specified conditions
            return response()->json(['message' => 'User not found'], 404);
        }

    }
    
}

