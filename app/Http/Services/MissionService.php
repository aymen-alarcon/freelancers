<?php

namespace App\Http\Services;

use App\Models\Mission;
use Illuminate\Support\Facades\Auth;

class MissionService
{
    public function createMission($request)
    {
        $data = $request->validate([
            "title" => "required|string|max:12",
            "description" => "required|string|max:500",
            "budget" => "required|numeric",
            "duree" => "required",
            "type" => "required|in:web,mobile,desktop",
            "status" => "required|in:Ouverte,En cours,Terminée,Annulée",
            "category" => "required|in:Développement Web,Développement Mobile,Développement Desktop,Full-Stack,DevOps,UI/UX",
        ]);

        $data["client_id"] = Auth::id();

        return Mission::create($data);
    }
}