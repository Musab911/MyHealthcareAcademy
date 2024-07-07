<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class authenticaton extends Controller
{
  
    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Attempt to authenticate the user
        $credentials = $request->only('name', 'password');
    
        if (Auth::attempt($credentials, $request->remember)) {
            // Authentication successful, redirect to the intended page
            return redirect()->intended('profile');
        }
    
        // If authentication fails for default user model, try Admin model
        $adminCredentials = [
            'name' => $credentials['name'],
            'password' => $credentials['password'],
        ];
    
        if (Auth::guard('admin')->attempt($adminCredentials, $request->remember)) {
            // Authentication successful, redirect to the intended page
            return view("home");
        }
    
        // Authentication failed, display an error message
        return redirect()->route('login')->withErrors(['error' => 'Invalid username or password'])->withInput();
    }
    
    

    
    public function signup(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'mobile' => 'required|string|max:15',
        'password' => 'required|string|min:8|confirmed',
        'terms_accepted' => 'accepted',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Create a new user
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->mobile = $request->mobile;
    $user->password = Hash::make($request->password);
    $user->terms_accepted = $request->has('terms_accepted'); // Set to true if checkbox is checked
    $user->save();

    // Redirect to home with a success message
    return redirect()->route('login')->with('success', 'Registration successful!');
}


}
