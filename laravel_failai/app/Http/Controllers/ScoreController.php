<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $score = $request->input('score');

            \Log::info('Score value received: '.$score);
            \Log::info('User ID: '.$user->id);

            $user->scores()->updateOrCreate(
                [],
                ['score' => $user->scores->sum('score') + $score]
            );

            \Log::info('Score updated for user: '.$user->id);

            return response()->json([
                'success' => true,
                'message' => 'Score added successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding score: ' . $e->getMessage()
            ]);
        }
    }
}
