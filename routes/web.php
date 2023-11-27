<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/galleries', \App\Livewire\Gallery::class)->name('gallery.index');

// user
Route::get('/login', [UserController::class, 'login'])->middleware('check-login')->name('login');
Route::post('/login', [UserController::class, 'login_check'])->name('login-check');
Route::controller(UserController::class)->prefix('admin')->middleware('auth-i')->group(function () {
    Route::post('/log-out', 'logout')->name('profile_');
    Route::get('/myprofile', 'index')->name('users.index');
    Route::patch('/updateprofile/{user}', 'update')->name('users.update');
});
Route::controller(AdminController::class)->prefix('admin')->middleware('auth-i')->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/skills', 'list_skill')->name('skill.index');
    Route::post('/skills', 'post_skil')->name('skill.store');
    Route::patch('/skills', 'edit_skill')->name('skill.edit');
    Route::delete('/skills/{skill}', 'delete_skill')->name('skill.delete');
    Route::get('/archivement', 'list_archive')->name('archivements.index');
    Route::post('/archivement', 'add_archive')->name('archivements.store');
    Route::get('/archivement/{archivement}/edit', 'edit_archive')->name('archivements.edit');
    Route::patch('/archivement/{archivement}', 'update_archive')->name('archivements.update');
    Route::delete('/archivement/{archivement}', 'delete_archive')->name('archivements.delete');
});

Route::controller(EducationController::class)->prefix('admin')->middleware('auth-i')->group(function () {
    Route::get('/educations', 'index')->name('educations.index');
    Route::post('/educations', 'store')->name('educations.store');
    Route::delete('/educations/{education}', 'destroy')->name('educations.delete');
});

Route::controller(GalleryController::class)->prefix('admin')->middleware('auth-i')->group(function () {
    Route::get('/galleries', 'index')->name('galleries.index');
    Route::post('/galleries', 'store')->name('galleries.store');
    Route::delete('/galleries/{gallery}', 'destroy')->name('galleries.delete');
    Route::get('/categorygallery', 'list_category')->name('category.index');
    Route::post('/categorygallery', 'add_category')->name('category.store');
    Route::delete('/categorygallery/{categoryGallery}', 'delete_category')->name('category.delete');
    Route::patch('/categorygallery', 'edit_category')->name('category.edit');
});
