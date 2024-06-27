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
        // Custom error messages
        $messages = [
            'city.unique' => 'The city name already exists. Please enter a different city name.',
        ];
    
        // Validate the request data with custom error messages
        $request->validate([
            'city' => 'required|string|max:255|unique:cities,city', // Ensure the city name is unique
        ], $messages);
    
        // Create the city
        City::create(['city' => $request->city]);
    
        // Redirect back to the form with a success message
        return redirect()->route('form')->with('success', 'City created successfully.');
    }
    

}
