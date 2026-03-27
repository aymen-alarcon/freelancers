<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }
    public function store(Request $request, User $freelancer)
    {
        if ($freelancer->id !== Auth::user()->id) {
            $this->service->createReview($request, $freelancer);

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