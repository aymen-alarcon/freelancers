<?php

namespace App\Http\Controllers;

use App\Http\Services\MissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    protected $service;

    public function __construct(MissionService $service)
    {
        $this->service = $service;
    }
    public function store(Request $request)
    {
        if(Auth::user()->role === "client"){
            $mission = $this->service->createMission($request);

            return response()->json([
                "success" => true,
                "message" => "You have just created a new mission successfully",
                "data" => $mission,
            ], 201);
        }else{
            return response()->json([
                "success" => false,
                "message" => "You don't have the correct permissions to do this action"
            ], 401);
        }
    }
}