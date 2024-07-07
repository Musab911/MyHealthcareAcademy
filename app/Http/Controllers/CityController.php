<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
   
    public function display()
    {
        $cities = City::all(); // Fetch all cities
    return view('allcities', compact('cities'));
    }
 
    public function store(Request $request)
{
    // Dump and die to inspect request data before validation
    // dd($request->all());

    // Custom error messages
    $messages = [
        'city.unique' => 'The city name already exists. Please enter a different city name.',
        'accommodation_price.required_if' => 'The accommodation price is required when accommodation is provided.',
        'accommodation_price.numeric' => 'The accommodation price must be a number.',
    ];

    // Validate the request data with custom error messages
    $validatedData = $request->validate([
        'city' => 'required|string|max:255|unique:cities,city', // Ensure the city name is unique
        'accommodation' => 'boolean',
        'accommodation_price' => 'required_if:accommodation,true|nullable|numeric',
    ], $messages);

    // Create the city
    City::create([
        'city' => $validatedData['city'],
        'accommodation' => $request->has('accommodation'),
        'accommodation_price' => $request->accommodation ? $validatedData['accommodation_price'] : null,
    ]);

    // Redirect back to the form with a success message
    return redirect()->route('form')->with('success', 'City created successfully.');
}

    
public function getPrice(Request $request)
{
    $city = $request->input('city');

    $accommodation = City::where('city', $city)->first();

    if ($accommodation && $accommodation->accommodation_price) {
        return response()->json(['price' => $accommodation->accommodation_price]);
    } else {
        return response()->json(['price' => null]);
    }
}
}