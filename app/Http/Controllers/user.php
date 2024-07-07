<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
   public function  internform(){

   return view('internform');
   }
   
    public function  location(){

   return view('locations');
   }
}