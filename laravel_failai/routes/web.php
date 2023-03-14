<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SpriteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user-preference', [UserController::class, 'getUserPreference']);
Route::middleware('auth')->post('/change-sprite', [ProfileController::class, 'changeSprite'])->name('change.sprite');
Route::middleware('auth')->get('/change-sprite', [ProfileController::class, 'showChangeSpriteForm'])->name(
    'change.sprite.form'
);
Route::middleware('auth')->get('/user/sprite-id', function (Request $request) {
    $user = $request->user();
    if (!$user) {
        return response()->json(['message' => 'User not authenticated']);
    }

    $spriteId = $user->sprite_id;
    if (!$spriteId) {
        return response()->json(['message' => 'User does not have a sprite ID']);
    }

    return response()->json(['sprite_id' => $spriteId]);
});

Route::get('/', function () {return view('welcome');})->name('homepage');
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');
Route::get('/connect', function () {
    return view('welcome_login');
});
Route::get('/game', function () {
    return view('game');
})->name('game');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/sprite/{sprite}', [SpriteController::class, 'index'])->name('score');
Route::post('/score', [ScoreController::class, 'store'])->name('score.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


















/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';*/
