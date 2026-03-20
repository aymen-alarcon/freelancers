<?php

namespace App\Http\Controllers;

use App\Models\ClientProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProfileController extends Controller
{
    public function store(Request $request)
    {
        $roleValidate = $request->validate([
            "entreprise" => "required",
            "description" => "required",
            "historique_missions" => "required",
        ]);

        $roleValidate["user_id"] = Auth::user()->id;

        ClientProfile::create($roleValidate);

        return response()->json([
            "success" => true,
            "message" => "your profile have been created successfully",
        ], 201);
    }
}