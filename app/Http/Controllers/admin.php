<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\City; // Import the City model
use App\Models\Industry;
use App\Models\internship;
use App\Models\Application;

class admin extends Controller
{
  
    public function dashboard() {
        return view('home');
    }
    public function internpage()
    {
        $cities = Industry::select('city')->distinct()->get();
        return view('form', compact('cities'));
    }

    
    
    public function form()
    {
        $cities = City::all(); 
        return view('addcity', compact('cities'));
    }

    public function icon()
    {
        return view('icons');
    }

    public function login()
    {
        return view('admin/login');
    }

    public function profile()
    {
        return view('profile');
    }

    public function register()
    {
        return view('register');
    }

    public function passwordreset()
    {
        return view('reset-password');
    }

    public function add_industry()
    {
        $cities = City::all();
        return view('addindustry', compact('cities'));
    }
    public function homepage(){
        return view('index');
    }
    public function aboutus(){
        return view('aboutus');
    }
    public function show($id)
    {
        $internship = Internship::findOrFail($id);
        return view('intern', compact('internship'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration_weeks' => 'required|integer',
            'city' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'positions' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        $internship = new Internship;
        $internship->name = $validatedData['name'];
        $internship->start_date = $validatedData['start_date'];
        $internship->duration = $validatedData['duration_weeks'];
        $internship->city = $validatedData['city'];
        $internship->industry = $validatedData['industry'];
        $internship->positions = $validatedData['positions'];
        $internship->price = $validatedData['price'];
        $internship->save();

        return redirect()->route('user', $internship->id)
                         ->with('success', 'Internship created successfully!');
    }
    
    
    public function getFields(Request $request)
    {
        $city = $request->input('city');
        $industryName = $request->input('industry_name');
    
        $fields = Industry::where('city', $city)
                          ->where('name', $industryName)
                          ->select('field')
                          ->distinct()
                          ->get();
    
        return response()->json(['fields' => $fields]);
    }
     
    public function userform(){
        $cities = Industry::select('city')->distinct()->get();
        return view('internpage', compact('cities'));
    }
     
   
   
    public function fetchMatchingInternships(Request $request)
    {
        $validatedData = $request->validate([
            'city' => 'required|string',
            'industry' => 'required|string',
            'weeks' => 'required|integer|min:4|max:24',
        ]);
    
        $internships = Internship::where('city', $validatedData['city'])
            ->where('industry', $validatedData['industry'])
            ->where('duration_weeks', $validatedData['weeks'])
            ->get();
    
        return response()->json($internships);
    }
    
    public function fahad(){
        $cities = Industry::select('city')->distinct()->get();
        return view('practice', compact('cities'));
    }

    public function getIndustries(Request $request)
    {
        $industries = Industry::where('city', $request->city)->distinct('name')->get(['name']);
        return response()->json($industries);
    }

    public function fetchInternships(Request $request)
{
    // Validate the request data
    $request->validate([
        'city' => 'required|string',
        'industry' => 'required|string',
        'duration' => 'required|integer',
    ]);

    // Fetch internships based on the input criteria
    $city = $request->input('city');
    $industry = $request->input('industry');
    $duration = $request->input('duration');

    // Example: Assuming you have an Internship model
    $internships = Internship::where('city', $city)
        ->where('industry', $industry)
        ->where('duration', $duration)
        ->get();

    return response()->json($internships);
}

public function save(Request $request)
{
    try {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'internship_name' => 'required|string',
            'first_industry' => 'required|string',
            'first_field1' => 'nullable|string',
            'first_field2' => 'nullable|string',
            'first_field3' => 'nullable|string',
            'first_field4' => 'nullable|string',
            'first_field5' => 'nullable|string',
            'second_industry' => 'nullable|string',
            'second_field1' => 'nullable|string',
            'second_field2' => 'nullable|string',
            'second_field3' => 'nullable|string',
            'second_field4' => 'nullable|string',
            'second_field5' => 'nullable|string',
            'city' => 'required|string',
            'duration_weeks' => 'required|integer',
            'start_date' => 'required|date',
            'price' => 'required|numeric',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'dateOfBirth' => 'required|date',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'phone' => 'required|string',
            'emailAddress' => 'required|email',
            'nativeLanguage' => 'required|string',
            'englishLevel' => 'required|string',
            'motivation' => 'required|string',
            'degree' => 'required|string',
        ]);

        // Create a new Application record using validated data
        Application::create($validatedData);

        // Redirect to a route after successful submission
        return redirect()->back()->with('success', 'Application submitted successfully!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Redirect back with validation errors
        return redirect()->back()->withErrors($e->validator)->withInput();
    } catch (\Exception $e) {
        // Redirect back with a generic error message
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}

}