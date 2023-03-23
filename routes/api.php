<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostsController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SignerController;
use App\Http\Controllers\api\AuthController;


// TODO: Auth needs revising.Check Sanctum/Passport

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::post('login', [AuthController::class,'login']);


Route::middleware([
    'auth:api'
])->group(function () {

    // Route::middleware("HandlePutFormData")->resource("jobposts", JobPostsController::class);
    // Route::get('jobpostssearch', [JobPostsController::class, "search"]);
    
    // // Route::post('license-types/createLicense',[LicenseController::class,'createLicense']);
    // Route::post('upload',[DocumentController::class,'upload']);
    
    // Route::post('createone',[LicenseController::class,'createLicense']);
    Route::post('electronic',[SignerController::class,'electronic']);

});