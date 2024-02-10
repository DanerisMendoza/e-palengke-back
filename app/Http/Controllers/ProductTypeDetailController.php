<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTypeDetail;
use App\Models\ProductType;

class ProductTypeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve a list of ProductTypeDetails from the database and return it as JSON

        $ProductTypeDetails = ProductTypeDetail::get()
            ->each(function ($q) {
                if ($q->pic_path != null) {
                    $image_type = substr($q->pic_path, -3);
                    $image_format = '';
                    if ($image_type == 'png' || $image_type == 'jpg') {
                        $image_format = $image_type;
                    }
                    $base64str = '';
                    $base64str = base64_encode(file_get_contents(public_path($q->pic_path)));
                    $q->base64img = 'data:image/' . $image_format . ';base64,' . $base64str;
                }
            });
        return $ProductTypeDetails;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method should display a form for creating a new ProductTypeDetail
        // You can return a view here to render the form.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules for your fields
        ]);

        // Create a new ProductTypeDetail instance and save it to the database
        $ProductTypeDetail = new ProductTypeDetail([
            'name' => $request->input('name'),
            // Map other request data to your model fields
        ]);
        $ProductTypeDetail->save();

        // Return a response, e.g., a success message or a redirect
        // return response()->json(['message' => 'ProductTypeDetail created successfully']);
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve a specific ProductTypeDetail by ID from the database
        $ProductTypeDetail = ProductTypeDetail::find($id);

        if (!$ProductTypeDetail) {
            // Return a response if the resource was not found
            return response()->json(['message' => 'ProductTypeDetail not found'], 404);
        }

        // Return the ProductTypeDetail as JSON
        return response()->json($ProductTypeDetail);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // This method should display a form for editing an existing ProductTypeDetail
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
            // Add more validation rules for your fields
        ]);

        // Retrieve the ProductTypeDetail by ID from the database
        $ProductTypeDetail = ProductTypeDetail::find($id);

        if (!$ProductTypeDetail) {
            // Return a response if the resource was not found
            return response()->json(['message' => 'ProductTypeDetail not found'], 404);
        }

        // Update the fields of the ProductTypeDetail instance
        $ProductTypeDetail->name = $request->input('name');
        // Map other request data to your model fields
        $ProductTypeDetail->save();

        // Return a response, e.g., a success message or a redirect
        // return response()->json(['message' => 'ProductTypeDetail updated successfully']);
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \Log::info($id);
        // Retrieve the ProductTypeDetail by ID from the database
        $ProductTypeDetail = ProductTypeDetail::find($id);

        if (!$ProductTypeDetail) {
            //     // Return a response if the resource was not found
            return response()->json(['message' => 'ProductTypeDetail not found'], 404);
        }

        // // Delete the ProductTypeDetail
        $ProductTypeDetail->delete();

        // // Return a response, e.g., a success message or a redirect
        // return response()->json(['message' => 'ProductTypeDetail deleted successfully']);
        return 'success';
    }
}
