<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantCredential;
use Illuminate\Support\Facades\DB;

class ApplicantCredentialController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
