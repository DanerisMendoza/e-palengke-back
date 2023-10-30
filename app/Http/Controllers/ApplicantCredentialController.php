<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ApplicantCredentialController extends Controller
{
    public function show(string $id)
    {
        $ApplicantCredential = DB::table('applicant_credentials')
        ->join('requirement_details','requirement_details.id','applicant_credentials.requirement_details_id')
        ->where('user_role_id', $id)
        ->get()
        ->each(function ($q){
            $image_type = substr($q->picture_path, -3);
            $image_format = '';
            if ($image_type == 'png' || $image_type == 'jpg') {
                $image_format = $image_type;
            }
            $base64str = '';
            $base64str = base64_encode(file_get_contents(public_path($q->picture_path)));
            $q->base64img = 'data:image/' . $image_format . ';base64,' . $base64str;
        });
        return $ApplicantCredential;
    }
}
