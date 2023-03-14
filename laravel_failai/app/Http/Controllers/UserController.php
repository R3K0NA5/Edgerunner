<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateSpriteId(Request $request)
    {
        $user = auth()->user();
        $spriteId = $request->input('sprite_id');
        $user->update(['sprite_id' => $spriteId]);

        return response()->json(['message' => 'Sprite ID updated successfully']);
    }
    public function getUserPreference()
    {
        $userAlg = Auth::user()->alg; // assume the user's alg is stored in a column called "alg"

        // use the user's alg value to determine the encoding type
        switch ($userAlg) {
            case 0:
                $encodingType = 'modified';
                break;
            case 1:
                $encodingType = 'prefixSuffix';
                break;
            case 2:
                $encodingType = 'randomSuffix';
                break;
            case 3:
                $encodingType = 'reversed';
                break;
            case 4:
                $encodingType = 'uppercase';
                break;
            case 5:
                $encodingType = 'lowercase';
                break;
            case 6:
                $encodingType = 'alternatingCase';
                break;
            case 7:
                $encodingType = 'reversedAlternatingCase';
                break;
            case 8:
                $encodingType = 'base64Reversed';
                break;
            default:
                $encodingType = 'btoa'; // default to btoa encoding
        }

        return response()->json(['encodingType' => $encodingType]);
    }
}
