<?php

use App\Actions\GetBackground;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/github', function () {
    return view('text_builder.github');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('text-builder', function () {
        return view('sites.text-builder');
    })->name('text builder');

    Route::get('app-list', function () {
        return view('sites.app-list');
    })->name('app list');

    Route::get('/flow', function () {
        return view('sites.flow');
    })->name('flow');

    Route::get('/settings', function () {
        GetBackground::make();
        $bg = GetBackground::run();
        return view('settings', compact('bg'));
    })->name('settings');

    Route::resource('background', BackgroundController::class)->only('store');
    Route::resource('media', MediaController::class);

});
