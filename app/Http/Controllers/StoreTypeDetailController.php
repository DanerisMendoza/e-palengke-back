<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreTypeDetail;

class StoreTypeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve a list of StoreTypeDetails from the database and return it as JSON
        $storeTypeDetails = StoreTypeDetail::all();
        return $storeTypeDetails;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method should display a form for creating a new StoreTypeDetail
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

        // Create a new StoreTypeDetail instance and save it to the database
        $storeTypeDetail = new StoreTypeDetail([
            'name' => $request->input('name'),
            // Map other request data to your model fields
        ]);
        $storeTypeDetail->save();

        // Return a response, e.g., a success message or a redirect
        return response()->json(['message' => 'StoreTypeDetail created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve a specific StoreTypeDetail by ID from the database
        $storeTypeDetail = StoreTypeDetail::find($id);

        if (!$storeTypeDetail) {
            // Return a response if the resource was not found
            return response()->json(['message' => 'StoreTypeDetail not found'], 404);
        }

        // Return the StoreTypeDetail as JSON
        return response()->json($storeTypeDetail);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // This method should display a form for editing an existing StoreTypeDetail
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

        // Retrieve the StoreTypeDetail by ID from the database
        $storeTypeDetail = StoreTypeDetail::find($id);

        if (!$storeTypeDetail) {
            // Return a response if the resource was not found
            return response()->json(['message' => 'StoreTypeDetail not found'], 404);
        }

        // Update the fields of the StoreTypeDetail instance
        $storeTypeDetail->name = $request->input('name');
        // Map other request data to your model fields
        $storeTypeDetail->save();

        // Return a response, e.g., a success message or a redirect
        return response()->json(['message' => 'StoreTypeDetail updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \Log::info($id);
        // Retrieve the StoreTypeDetail by ID from the database
        // $storeTypeDetail = StoreTypeDetail::find($id);
        
        // if (!$storeTypeDetail) {
        //     // Return a response if the resource was not found
        //     return response()->json(['message' => 'StoreTypeDetail not found'], 404);
        // }

        // // Delete the StoreTypeDetail
        // $storeTypeDetail->delete();

        // // Return a response, e.g., a success message or a redirect
        // return response()->json(['message' => 'StoreTypeDetail deleted successfully']);
    }
}
