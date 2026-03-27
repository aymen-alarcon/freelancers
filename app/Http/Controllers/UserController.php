<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === "freelance") {
            return response()->json([
                "name" => $user->name,
                "email" => $user->email,
                "role" => $user->role,
                "competences" => $user->freelancerProfile->competences,
                "tarif_journalier" => $user->freelancerProfile->tarif_journalier,
                "portfolio" => $user->freelancerProfile->portfolio,
                "experience" => $user->freelancerProfile->experience,
                "evaluation_moyenne" => $user->freelancerProfile->evaluation_moyenne,
                "technologies" => $user->freelancerProfile->technologies->pluck("name"),
            ]);
        }else if($user->role === "client"){
            return response()->json([
                "name" => $user->name,
                "email" => $user->email,
                "role" => $user->role,
                "entreprise" => $user->clientProfile?->entreprise,
                "description" => $user->clientProfile?->description,
                "historique_missions" => $user->clientProfile?->missions->pluck("title"),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashboard()
    {
        $data = $this->service->dashboard();

        return response()->json([
            "success" => true,
            "data" => [
                "users count" => $data["users_count"],
                "missions" => $data["missions"],
                "candidatures" => $data["candidatures"],
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->role === "admin") {
            $this->service->updateStatus($request, $user);

            return response()->json([
                "status" => true,
                "message" => "You have just updated this user successfully",
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Only admins can update users",
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::user()->role === "admin") {
            $user->delete();

            return response()->json([
                "success" => true,
                "message" => "You have just deleted a user successfully",
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Only admins can update users",
            ]);
        }
        
    }
}
