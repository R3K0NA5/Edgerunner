<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Sprite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function changeSprite(Request $request)
    {
        $user = $request->user();
        $spriteId = $request->input('sprite_id');

        // Check if the user has enough score to change sprite
        $score = $user->scores()->sum('score');
        if ($score < 200) {
            return redirect()->back()->with('error', 'You do not have enough score to change sprite');
        }

        // Update the user's sprite_id
        $user->sprite_id = $spriteId;
        $user->save();

        // Subtract 100 points from the user's score
        $user->scores()->create(['score' => -100]);

        return redirect()->back()->with('success', 'Sprite changed successfully');
    }
    public function showChangeSpriteForm()
    {
        $sprites = Sprite::all();
        return view('change_sprite', compact('sprites'));
    }
}
