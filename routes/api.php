<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Backend\AuthAdminController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProductByUserTypeController;
use App\Http\Controllers\UserType\UserTypeController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {});

Route::post('login', LoginController::class);
Route::post('Registration', RegistrationController::class);
Route::resource('users', UserController::class);
Route::get('userTypes', UserTypeController::class);
Route::resource('product', ProductController::class);
Route::prefix('products')->group(function () {
    Route::get('index',[ProductByUserTypeController::class,'index'])->middleware('auth:sanctum');
});
