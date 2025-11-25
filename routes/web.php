<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;


/*
Localized routes
*/
Route::get('language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'fr'])) {
        abort(404);
    }
    
    session(['locale' => $locale]);
    return redirect()->back();
})->name('language.switch');

/* 
* Public Routes
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/help', function () {
    return view('help');
})->name('help');


/* 
* Authenticated Routes (requires login)
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('community', 'community')->name('community');
    Route::view('credits', 'credits')->name('credits');
    Route::view('client', 'client')->name('client');
});


/*
* User Settings Routes (requires login)
*/

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
