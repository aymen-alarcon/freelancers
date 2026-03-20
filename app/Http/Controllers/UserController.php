<?php

namespace App\Http\Controllers;

use App\Models\ClientProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
                "entreprise" => $user->clientProfile->entreprise,
                "description" => $user->clientProfile->description,
                "historique_missions" => $user->clientProfile->missions->pluck("title"),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->role === "admin") {
            $validate = $request->validate([
                "is_active" => "required|boolean",
            ]);

            $user->update($validate);

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
