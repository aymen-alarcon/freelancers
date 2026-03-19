<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
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
        if(Auth::user()->role === "client"){
            $validate = $request->validate([
                "title" => "required|string|max:12",
                "description" => "required|string|max:500",
                "budget" => "required|numeric",
                "duree" => "required",
                "type" => "required|in:web,mobile,desktop",
                "status" => "required",
                "category_id" => "required|exists:categories,id",
            ]);

            $validate["client_id"] = Auth::user()->id;

            $mission = Mission::create($validate);

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

    /**
     * Display the specified resource.
     */
    public function show(Mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mission $mission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mission $mission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mission $mission)
    {
        //
    }
}
