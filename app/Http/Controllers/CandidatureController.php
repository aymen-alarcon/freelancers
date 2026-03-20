<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
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

    /**
     * Display the specified resource.
     */
    public function show(Candidature $candidature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidature $candidature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidature $candidature)
    {
        $validate = $request->validate([
            "status" => "required|in:accepted,refused,on hold",
        ]);

        $candidature->update($validate);

        return response()->json([
            "success" => true,
            "data" => $candidature,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidature $candidature)
    {
        //
    }
}
