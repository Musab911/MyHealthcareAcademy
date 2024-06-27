<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industry;
use App\Models\City;

class IndustryController extends Controller
{

    public function index()
    {
        // Fetch all industries from the database
        $industries = Industry::all();

        // Pass the industries data to the view
        return view('allindustry', compact('industries'));
    }
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'industry' => 'required|string|max:255',
            'cities' => 'required|array',
            'cities.*' => 'required|string|max:255',
            'fields' => 'required|array',
            'fields.*' => 'required|array',
            'fields.*.*' => 'required|string|max:255',
            'accommodations' => 'nullable|array',
            'accommodations.*' => 'nullable',
        ]);

        // Check if cities already exist in the City model
        foreach ($validatedData['cities'] as $cityName) {
            $cityExists = City::where('city', $cityName)->exists();
            if (!$cityExists) {
                return redirect()->back()->with('error', "City '$cityName' does not exist.");
            }
        }

        // Extract validated data
        $industryName = $validatedData['industry'];
        $cities = $validatedData['cities'];
        $fields = $validatedData['fields'];
        $accommodations = $validatedData['accommodations'] ?? [];

        // Iterate over cities and fields
        foreach ($cities as $index => $city) {
            // Ensure fields array has the current index
            if (!isset($fields[$index])) {
                continue; // Skip if fields for the city are not set
            }

            // Determine accommodation status for the city
            $accommodation = isset($accommodations[$index]) && $accommodations[$index] == "on" ? true : false;

            foreach ($fields[$index] as $field) {
                // Create new Industry entry
                Industry::create([
                    'name' => $industryName,
                    'city' => $city,
                    'field' => $field,
                    'accommodation' => $accommodation,
                ]);
            }
        }

        // Redirect with success message
        return redirect()->back()->with('success', 'Industries added successfully!');
    }
}
