<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function updateSpriteId(Request $request)
    {
        $user = auth()->user();
        $spriteId = $request->input('sprite_id');
        $user->update(['sprite_id' => $spriteId]);

        return response()->json(['message' => 'Sprite ID updated successfully']);
    }
}
