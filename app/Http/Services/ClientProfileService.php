<?php

namespace App\Http\Services;

use App\Models\ClientProfile;
use Illuminate\Support\Facades\Auth;

class ClientProfileService
{
    public function createClientProfile($request)
    {
        $data = $request->validate([
            "entreprise" => "required",
            "description" => "required",
            "historique_missions" => "required",
        ]);

        $data["user_id"] = Auth::id();

        return ClientProfile::create($data);
    }
}
