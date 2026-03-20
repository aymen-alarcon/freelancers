<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
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
    public function store(Request $request, User $freelancer)
    {
        if ($freelancer->id !== Auth::user()->id) {
            $validate = $request->validate([
                "rating" => "required|numeric|min:0|max:5"
            ]);

            $validate["target_id"] = $freelancer->id;
            $validate["author_id"] = Auth::user()->id;

            Review::create($validate);

            return response()->json([
                "success" => true,
                "message" => "Your rating have been submitted successfully",
            ], 201);        
        }else{
            return response()->json([
                "success" => false,
                "message" => "You can rate Yourself",
            ], 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
