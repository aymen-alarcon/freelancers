<?php

namespace App\Http\Controllers;

use App\Models\FreeLancerProfile;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, User $freelancer)
    {
        if ($freelancer->id !== Auth::user()->id) {
            $validate = $request->validate([
                "rating" => "required|numeric|min:0|max:5"
            ]);

            $validate["target_id"] = $freelancer->id;
            $validate["author_id"] = Auth::user()->id;

            Review::create($validate);

            $average = Review::where("target_id", $freelancer->id)->average("rating");

            $freelancerProfile = FreeLancerProfile::where("user_id", $freelancer->id)->firstOrFail();
            $freelancerProfile->update(["evaluation_moyenne" => $average]);

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
}