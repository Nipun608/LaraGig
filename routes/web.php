<?php

use App\Models\Listings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;



//all listing
Route::get('/', [ListingController::class ,'index'] );



//show create route
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

//store
Route::post('/listings', [ListingController::class , 'store']) ->middleware('auth');


//show edit
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');


//update listing
Route::put('/listings/{listing}' ,[ListingController::class,'update'])->middleware('auth');


//Delete Listing
Route::delete('/listings/{listing}',[ListingController::class,'delete'])->middleware('auth');



//single listings
Route::get('/listings/{listing}', [ListingController::class , 'show']);





//Register from 
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users', [UserController::class , 'store']);

//User logout
Route::post('/logout',[UserController::class , 'logout']);

//Show login form
Route::get('/login',[UserController::class , 'login'])->name('login')->middleware('guest');

//Log in user
Route::post('/users/authenticate',[UserController::class , 'authenticate']);



//Manage listings
// Route::get()