<?php

namespace App\Http\Controllers;

use App\Models\FreeLancerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreeLancerProfileController extends Controller
{
    public function store(Request $request)
    {
        $freelanceValidate = $request->validate([
            "competences" => "required",
            "tarif_journalier" => "required",
            "portfolio" => "required",
            "experience" => "required",
            "evaluation_moyenne" => "required",
        ]);

        $freelanceValidate["user_id"] = Auth::user()->id;

        FreeLancerProfile::create($freelanceValidate);
        
        return response()->json([
            "success" => true,
            "message" => "your profile have been created successfully",
        ], 201);
    }
}