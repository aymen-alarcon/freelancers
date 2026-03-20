<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    public function store(Request $request, Mission $mission)
    {
        $validate = $request->validate([
            "lettre_de_motivation" => "required|file|max:10240",
            "tarif_propose" => "required|numeric|min:0",
        ]);

        $validate["lettre_de_motivation"] = $request->file("lettre_de_motivation")->store("files", "public");
        $validate["status"] = "on hold";
        $validate["freelancer_id"] = Auth::user()->id;
        $validate["mission_id"] = $mission->id;

        $candidature = Candidature::create($validate);

        return response()->json([
            "success" => true,
            "message" => "Your candidature has been sent successfully",
            "data" => $candidature,
        ], 201);
    }


    public function update(Request $request, Candidature $candidature)
    {
        if(Auth::user()->role === "client"){
            $validate = $request->validate([
                "status" => "required|in:accepted,refused,on hold",
            ]);

            $candidature->update($validate);

            return response()->json([
                "success" => true,
                "data" => $candidature,
            ]);        
        }else{
            return response()->json([
                "success" => false,
                "message" => "Only clients can do that"
            ]);        
        }
    }
}