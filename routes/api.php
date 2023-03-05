<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostsController;
use App\Http\Controllers\LicenseController;


Route::post('license-types/createLicense', [LicenseController::class, 'createLicense']);
