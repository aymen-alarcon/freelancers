<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CandidatureService;

class CandidatureController extends Controller
{
    protected $service;

    public function __construct(CandidatureService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request, Mission $mission)
    {
        $candidature = $this->service->createCandidature($request, $mission);

        return response()->json([
            "success" => true,
            "message" => "Your candidature has been sent successfully",
            "data" => $candidature,
        ], 201);
    }

    public function update(Request $request, Candidature $candidature)
    {
        if (Auth::user()->role !== "client") {
            return response()->json([
                "success" => false,
                "message" => "Only clients can do that"
            ]);
        }

        $updated = $this->service->updateCandidature($request, $candidature);

        return response()->json([
            "success" => true,
            "data" => $updated,
        ]);
    }
}