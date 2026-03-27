<?php

namespace App\Http\Services;

use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;

class CandidatureService
{
    public function createCandidature($request, $mission)
    {
        $data = $request->validate([
            "lettre_de_motivation" => "required|file|max:10240",
            "tarif_propose" => "required|numeric|min:0",
        ]);

        $data["lettre_de_motivation"] = $request->file("lettre_de_motivation")->store("files", "public");
        $data["status"] = "on hold";
        $data["freelancer_id"] = Auth::id();
        $data["mission_id"] = $mission->id;

        return Candidature::create($data);
    }

    public function updateCandidature($request, Candidature $candidature)
    {
        $data = $request->validate([
            "status" => "required|in:accepted,refused,on hold",
        ]);

        $candidature->update($data);

        return $candidature;
    }
}