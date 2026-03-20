<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::user()->role === "client"){
            $validate = $request->validate([
                "title" => "required|string|max:12",
                "description" => "required|string|max:500",
                "budget" => "required|numeric",
                "duree" => "required",
                "type" => "required|in:web,mobile,desktop",
                "status" => "required|in:Ouverte,En cours,Terminée,Annulée",
                "category" => "required|in:Développement Web,Développement Mobile,Développement Desktop,Full-Stack,DevOps,UI/UX",
            ]);

            $validate["client_id"] = Auth::user()->id;

            $mission = Mission::create($validate);

            return response()->json([
                "success" => true,
                "message" => "You have just created a new mission successfully",
                "data" => $mission,
            ], 201);
        }else{
            return response()->json([
                "success" => false,
                "message" => "You don't have the correct permissions to do this action"
            ], 401);
        }
    }
}