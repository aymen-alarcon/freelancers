<?php

namespace App\Http\Controllers;

use App\Http\Services\ClientProfileService;
use Illuminate\Http\Request;

class ClientProfileController extends Controller
{
    protected $service;

    public function __construct(ClientProfileService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $this->service->createClientProfile($request);

        return response()->json([
            "success" => true,
            "message" => "your profile have been created successfully",
        ], 201);
    }
}