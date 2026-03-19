<?php

namespace App\Http\Controllers;

use App\Models\ClientProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    /**
     * Display the specified resource.
     */
    public function show(ClientProfile $clientProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientProfile $clientProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientProfile $clientProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientProfile $clientProfile)
    {
        //
    }
}
