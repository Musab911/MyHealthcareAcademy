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
    
        // Check for duplicate fields within the same city and industry
        $fieldSet = [];
        foreach ($cities as $index => $city) {
            if (!isset($fields[$index])) {
                continue; // Skip if fields for the city are not set
            }
    
            foreach ($fields[$index] as $field) {
                $key = $industryName . '|' . $city . '|' . $field;
                if (isset($fieldSet[$key])) {
                    return redirect()->back()->with('error', "Duplicate field '$field' found in city '$city' for industry '$industryName'.");
                }
                $fieldSet[$key] = true;
    
                // Check for duplicates in the database
                $existingIndustry = Industry::where('name', $industryName)
                                            ->where('city', $city)
                                            ->where('field', $field)
                                            ->first();
                if ($existingIndustry) {
                    return redirect()->back()->with('error', "Field '$field' already exists in city '$city' for industry '$industryName' in the database.");
                }
            }
        }
    
        // Iterate over cities and fields to create Industry entries
        foreach ($cities as $index => $city) {
            if (!isset($fields[$index])) {
                continue; // Skip if fields for the city are not set
            }
    
            foreach ($fields[$index] as $field) {
                // Create new Industry entry
                Industry::create([
                    'name' => $industryName,
                    'city' => $city,
                    'field' => $field,
                ]);
            }
        }
    
        // Redirect with success message
        return redirect()->back()->with('success', 'Industries added successfully!');
    }
    

    
}
