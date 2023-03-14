<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    const ACTIVE_ENCODERS = [
        'modified',
        'prefixSuffix',
        'randomSuffix',
        'reversed',
        'uppercase',
        'lowercase',
        'alternatingCase',
        'reversedAlternatingCase',
        'base64Reversed'
    ];

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $encodedScore = $request->input('score'); // Get the encoded score data from the request

            $activeEncoder = self::ACTIVE_ENCODERS[$user->alg] ?? self::ACTIVE_ENCODERS[0];

            // Decode the score using the corresponding decoder function for the active encoder
            switch ($activeEncoder) {
                case 'modified':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('modified-', '', $score);
                    break;
                case 'prefixSuffix':
                    $score = base64_decode($encodedScore);
                    $score = str_replace(['prefix-', '-suffix'], '', $score);
                    break;
                case 'randomSuffix':
                    $score = base64_decode($encodedScore);
                    $score = explode('-', $score)[0];
                    break;
                case 'reversed':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('reversed-', '', $score);
                    $score = strrev($score);
                    break;
                case 'uppercase':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('uppercase-', '', $score);
                    $score = strtolower($score);
                    break;
                case 'lowercase':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('lowercase-', '', $score);
                    $score = strtoupper($score);
                    break;
                case 'alternatingCase':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('alternating-', '', $score);
                    $alternatingCaseScore = '';
                    for ($i = 0; $i < strlen($score); $i++) {
                        if ($i % 2 === 0) {
                            $alternatingCaseScore .= strtolower($score[$i]);
                        } else {
                            $alternatingCaseScore .= strtoupper($score[$i]);
                        }
                    }
                    $score = $alternatingCaseScore;
                    break;
                case 'reversedAlternatingCase':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('reversed-alternating-', '', $score);
                    $reversedAlternatingCaseScore = '';
                    for ($i = 0; $i < strlen($score); $i++) {
                        if ($i % 2 === 0) {
                            $reversedAlternatingCaseScore .= strtoupper($score[$i]);
                        } else {
                            $reversedAlternatingCaseScore .= strtolower($score[$i]);
                        }
                    }
                    $score = $reversedAlternatingCaseScore;
                    break;
                case 'base64Reversed':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('base64-reversed-', '', $score);
                    $score = base64_decode(strrev($score));
                    break;
                default:
                    $score = base64_decode($encodedScore);
            }

            \Log::info('Score value received: '.$score);
            \Log::info('User ID: '.$user->id);

            /*$user->scores()->updateOrCreate(
                [],
                ['score' => $user->scores->sum('score') + $score]
            );*/
            $user->scores()->create([
                'score' => $score
            ]);
            // Increment the user's alg column value by 1, looping back to 0 if it reaches 9
            $user = Auth::user();
            $algValue = $user->alg;
            $algValue++;
            if ($algValue >= 9) {
                $algValue = 0;
            }
            $user->alg = $algValue;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Score added successfully!',
                'algValue' => $algValue // Return the updated alg value in the response for testing purposes
            ]);} catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding score: ' . $e->getMessage()
            ]);
        }
    }
}
