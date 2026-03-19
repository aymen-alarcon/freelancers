<?php

namespace App\Http\Controllers;

use App\Models\FreeLancerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreeLancerProfileController extends Controller
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
        $freelanceValidate = $request->validate([
            "competences" => "required",
            "tarif_journalier" => "required",
            "portfolio" => "required",
            "experience" => "required",
            "evaluation_moyenne" => "required",
        ], 201);

        $freelanceValidate["user_id"] = Auth::user()->id;

        FreeLancerProfile::create($freelanceValidate);
    }

    /**
     * Display the specified resource.
     */
    public function show(FreeLancerProfile $freeLancerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FreeLancerProfile $freeLancerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FreeLancerProfile $freeLancerProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FreeLancerProfile $freeLancerProfile)
    {
        //
    }
}
