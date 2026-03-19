<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\FreeLancerProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post("Freelancer/Profile/Register", [FreeLancerProfileController::class, "store"]);
Route::post("Client/Profile/Register", [ClientProfileController::class, "store"]);
Route::get("Profile", [UserController::class, "index"]);
Route::post("Login", [AuthController::class, "login"]);
Route::post("Register", [AuthController::class, "register"]);
Route::get("Logout", [AuthController::class, "logout"])->middleware("auth:sanctum");