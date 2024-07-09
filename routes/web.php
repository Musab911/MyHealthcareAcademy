<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\admin;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/intern', [admin::class, 'index']);
//Route::get('/intern/{id}', [admin::class, 'index'])->name('intern.show');
Route::get('/intern/{id}', [Admin::class, 'show'])->name('intern.show');



Route::post('/applications/store', [Admin::class, 'save'])->name('applications.store');

Route::get('/applications/show', [Admin::class, 'display_applications'])->name('applications.show');

Route::post('/get-industries', [admin::class, 'getIndustries'])->name('get-industries');
Route::post('/get-internships', [admin::class, 'fetchInternships']);
Route::get('/practice', [admin::class, 'fahad']);
Route::get('/aboutus', [admin::class, 'aboutus'])->name('about.us');



Route::post('/get-fields', [admin::class, 'getFields'])->name('get.fields');
Route::get('/admin', [admin::class, 'dashboard'])->name('admin');
Route::get('/index', [admin::class, 'homepage'])->name('index');
Route::get('/form', [admin::class, 'form'])->name('form');
Route::get('/icons', [admin::class, 'icon'])->name('icons');
Route::get('/login', [admin::class, 'login'])->name('login');
Route::get('/register', [admin::class, 'register'])->name('register');
Route::get('/passwordreset', [admin::class, 'passwordreset'])->name('passwordreset');
Route::get('/industry', [admin::class, 'add_industry'])->name('add.industry');
Route::get('/profile', [admin::class, 'profile'])->name('profile');
use App\Http\Controllers\CityController;
Route::post('/get-accommodation-price', [CityController::class, 'getPrice'])->name('get-accommodation-price');

Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
Route::get('/cities', [CityController::class, 'display'])->name('allcities');
use  App\Http\Controllers\authenticaton;
Route::post('/signup', [authenticaton::class, 'signup'])->name('signup');
Route::post('/login', [authenticaton::class, 'login'])->name('login.user');

use App\Http\Controllers\IndustryController;

Route::post('/industries', [IndustryController::class, 'store'])->name('industries.store');
Route::get('/industries', [IndustryController::class, 'index'])->name('index.industry');



Route::get('/internshipform', [admin::class, 'userform'])->name('user');

Route::post('/internships/store', [admin::class, 'store'])->name('internships.store');

Route::post('/fetch-internships', [admin::class, 'fetchMatchingInternships'])->name('internships.fetch');
use App\Http\Controllers\user;
Route::get('/contact', [User::class, 'contact'])->name('contact.us');


//Route::post('/get-industries', [admin::class, 'getIndustries']);
Route::post('/get-internships', [admin::class, 'fetchInternships']);
Route::get('/practice', [admin::class, 'fahad']);
Route::get('/internshipform', [admin::class, 'userform'])->name('user');
Route::get('/internform', [user::class, 'internform'])->name('internform');
Route::get('/locations', [user::class, 'location'])->name('locations');

