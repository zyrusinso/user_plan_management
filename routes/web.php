<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AuthTest;
use App\Http\Livewire\AuthUserComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\UserComponent;
use App\Http\Livewire\Settings;
use App\Http\Livewire\Messages;
use App\Http\Livewire\AboutUs;
use App\Http\Livewire\GameComponent as Game;
use App\Http\Controllers\TestController;

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', HomeComponent::class)->name('/');
Route::get('/about-us', AboutUs::class)->name('about-us');
Route::get('/test', [TestController::class, 'index'])->name('test.index');
Route::get('/credit', [TestController::class, 'credit'])->name('updateCredit');
Route::get('/timeNow', [TestController::class, 'timeNow'])->name('timeNow');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', AuthUserComponent::class)->name('home');
    Route::get('/chat', Messages::class)->name('chat');
    Route::get('/game', Game::class)->name('game');
    Route::get('/settings', Settings::class)->name('settings');
});


Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/', DashboardComponent::class)->name('dashboard');
    Route::get('/user', UserComponent::class)->name('dashboard.user');
});
