<?php

namespace App\Http\Services;

use App\Models\Review;
use App\Models\FreeLancerProfile;
use Illuminate\Support\Facades\Auth;

class ReviewService
{
    public function createReview($request, $freelancer)
    {
        $data = $request->validate([
            "rating" => "required|numeric|min:0|max:5"
        ]);

        $data["target_id"] = $freelancer->id;
        $data["author_id"] = Auth::id();

        Review::create($data);

        $average = Review::where("target_id", $freelancer->id)->average("rating");

        $profile = FreeLancerProfile::where("user_id", $freelancer->id)->firstOrFail();
        $profile->update(["evaluation_moyenne" => $average]);
    }
}