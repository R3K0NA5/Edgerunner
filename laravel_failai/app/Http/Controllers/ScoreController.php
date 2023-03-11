<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    const ACTIVE_ENCODER = 'prefixSuffix';

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $encodedScore = $request->input('score'); // Get the encoded score data from the request

            // Decode the score using the corresponding decoder function for the active encoder
            switch (self::ACTIVE_ENCODER) {
               /* case 'btoa':
                    $score = base64_decode($encodedScore);
                    break;*/
                case 'modified':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('modified-', '', $score);
                    break;
                case 'prefixSuffix':
                    $score = base64_decode($encodedScore);
                    $score = str_replace(['prefix-', '-suffix'], '', $score);
                    break;
                /*case 'randomPrefix':
                    $score = base64_decode($encodedScore);
                    $score = explode('-', $score)[1];
                    break;*/
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
                /*case 'modifiedPrefixBase64Reversed':
                    $score = base64_decode($encodedScore);
                    $score = str_replace('modified-base64-reversed-', '', $score);
                    $score = strrev(base64_decode($score));
                    break;*/
                default:
                    $score = base64_decode($encodedScore);
            }

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
