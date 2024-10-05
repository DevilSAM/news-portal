<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckVerified;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', CheckVerified::class])->group(function () {

    // редирект домашней страницы сразу на новости
    Route::get('/', function(){
        return redirect('/news');
    })->name('home');

    // новости
    Route::prefix('news')->group(static function () {
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('{news}', [NewsController::class, 'show'])->name('news.show');
    });

    // панель управления
    Route::prefix('control-panel')->group(static function () {
        Route::get('/', [ControlPanelController::class, 'verified'])->name('control-panel');
        Route::get('unverified', [ControlPanelController::class, 'unverified'])->name('control-panel.unverified');
        Route::get('news', [ControlPanelController::class, 'news'])->name('control-panel.news');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::middleware(['auth'])->group(function () {

    // адреса для верификации по коду из телеги
    Route::get('/verify', [VerificationController::class, 'showVerifyForm'])->name('tg-verification.notice');
    Route::post('/verify', [VerificationController::class, 'verifyCode'])->name('tg-verification.verify');

});


require __DIR__.'/auth.php';
