<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\FreeLancerProfileController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post("Login", [AuthController::class, "login"]);
Route::post("Register", [AuthController::class, "register"]);
Route::middleware("auth:sanctum")->group(function(){
    Route::get("Logout", [AuthController::class, "logout"]);
    Route::post("Freelancer/Profile/Register", [FreeLancerProfileController::class, "store"]);
    Route::post("Client/Profile/Register", [ClientProfileController::class, "store"]);
    Route::get("Profile", [UserController::class, "index"]);
    Route::post("Mission/create", [MissionController::class, "store"]);
    Route::post("Mission/{mission}/Candidature/create", [CandidatureController::class, "store"]);
    Route::put("Mission/Candidature/{candidature}/update", [CandidatureController::class, "update"]);
    Route::post("Freelancer/{freelancer}/Rating", [ReviewController::class, "store"]);
    Route::put("Users/{user}/update", [UserController::class, "update"]);
    Route::delete("Users/{user}/delete", [UserController::class, "destroy"]);
    Route::get("Dashboard", [UserController::class, "dashboard"]);
});