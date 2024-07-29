<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class user extends Controller
{
   public function  internform(){

   return view('internform');
   }
   
    public function  location(){

   return view('locations');
   }

   public function contact(){

      return view('contact');
      
   }
   public function contact_us(Request $request)
   {
       // Validate the input
       $validatedData = $request->validate([
           'first_name' => 'required|string|max:255',
           'last_name' => 'required|string|max:255',
           'email' => 'required|email|max:255',
           'message' => 'required|string',
       ]);
   
       // Uncomment for debugging
       dd($request);
   
       // Create a new contact using the validated data
       Contact::create($validatedData);
   
       // Redirect back with a success message
       return back()->with('success', 'Your message has been sent successfully!');
   }
   
   }
