<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\Mission;
use App\Models\Candidature;

class UserService
{
    public function dashboard()
    {
        return [
            "users_count" => User::count(),
            "missions" => Mission::all(),
            "candidatures" => Candidature::all(),
        ];
    }

    public function updateStatus($request, User $user)
    {
        $data = $request->validate([
            "is_active" => "required|boolean",
        ]);

        $user->update($data);
    }
}