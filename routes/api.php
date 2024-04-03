<?php

use App\Http\Controllers\Api\V1\JobApplicationController;
use App\Http\Controllers\Api\V1\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('job-listings', ListingController::class);
    Route::apiResource('job-applications', JobApplicationController::class);
});
