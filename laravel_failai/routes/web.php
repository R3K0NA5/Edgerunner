<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SpriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoPlayerController;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('homepage');
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');
Route::get('/registernewaccount', function () {
    return view('register_new_account');
});
Route::get('/connect', function () {
    return view('welcome_login');
});
Route::get('/playeris', function () {
    return view('playeris');
});
Route::get('/video_playeris', function () {
    return view('video_playeris');
});








Route::get('/video_playeris_video', function () {
    return view('video_playeris_video');
});
Route::get('/video_playeris_video/{group}', function ($group) {
    $songs = Video::where('group', $group)->get();
    return view('video_playeris_video', ['songs' => $songs]);
});
Route::get('/video_playeris_video', [VideoPlayerController::class, 'videoPlayerisVideo']);
Route::get('/video_playeris_video/{group}', [VideoPlayerController::class, 'videoPlayerisVideoGroup']);







Route::get('/1', function () {
    session()->forget('formData');
    return view('forma');
});
Route::get('/2', function () {
    $formData = session('formData');
    return view('testine', $formData);
});
Route::get('/3', function () {
    $formData = session('formData');
    return view('testine2', $formData);
});
Route::post('/submit-form', 'App\Http\Controllers\FormController@processForm');
Route::get('/generate-pdf', 'App\Http\Controllers\MyTCPDFController@generatePDF');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/statistics', [UserController::class, 'statistics'])->name('statistics');
    Route::get('/score/{user}', [UserController::class, 'scoreDetails'])->name('score.details');
    Route::get('/game', function () {
        return view('game');
    })->name('game');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/sprite/{sprite}', [SpriteController::class, 'index'])->name('score');

    Route::post('/score', [ScoreController::class, 'store'])->name('score.store');

    Route::get('/user-preference', [UserController::class, 'getUserPreference']);

    Route::prefix('change-sprite')->group(function () {
        Route::get('/', [ProfileController::class, 'showChangeSpriteForm'])->name('change.sprite.form');

        Route::post('/', [ProfileController::class, 'changeSprite'])->name('change.sprite');
    });

    Route::get('/user/sprite-id', function (Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated']);
        }

        $spriteId = $user->sprite_id;

        if (!$spriteId) {
            return response()->json(['message' => 'User does not have a sprite ID']);
        }

        return response()->json(['sprite_id' => $spriteId]);
    })->name('user.sprite-id');
});

require __DIR__ . '/auth.php';
