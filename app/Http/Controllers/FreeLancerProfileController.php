<?php

namespace App\Http\Controllers;

use App\Http\Services\FreeLancerProfileService;
use Illuminate\Http\Request;

class FreeLancerProfileController extends Controller
{
    protected $service;

    public function __construct(FreeLancerProfileService $service)
    {
        $this->service = $service;    
    }

    public function store(Request $request)
    {
        $this->service->createFreelancerProfile($request);
        
        return response()->json([
            "success" => true,
            "message" => "your profile have been created successfully",
        ], 201);
    }
}