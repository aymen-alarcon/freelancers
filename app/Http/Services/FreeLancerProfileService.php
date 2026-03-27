<?php

namespace App\Http\Services;

use App\Models\FreeLancerProfile;
use Illuminate\Support\Facades\Auth;

class FreeLancerProfileService
{
    public function createFreelancerProfile($request)
    {
        $data = $request->validate([
            "competences" => "required",
            "tarif_journalier" => "required",
            "portfolio" => "required",
            "experience" => "required",
            "evaluation_moyenne" => "required",
        ]);

        $data["user_id"] = Auth::id();

        return FreeLancerProfile::create($data);
    }
}