<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/editskill/{id}', [\App\Http\Controllers\AdminController::class, 'data_skill']);
Route::get('/editcategory/{id}', [\App\Http\Controllers\GalleryController::class, 'data_category']);
