<?php

use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
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

Route::resource('podcasts', PodcastController::class)->middleware('auth');

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('microsoft')->redirect();
// });

// Route::get('/auth/callback', function () {
//     $microsoftUser = Socialite::driver('microsoft')->user();

//     $user = User::firstOrCreate([
//         'email' => $microsoftUser->getEmail(),
//     ], [
//         'name' => $microsoftUser->getName(),
//     ]);

//     Auth::login($user);

//     return redirect('/dashboard');
// });

require __DIR__ . '/auth.php';
