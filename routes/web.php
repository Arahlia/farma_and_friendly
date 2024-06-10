<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Chat\Index;
use App\Livewire\Chat\Chat;
use App\Livewire\Pharmacies;
use App\Livewire\Information\ProfilePage;
use App\Livewire\Information\ProfileForm;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';

// Route::middleware('auth')->group(function () {

//     Route::get('/chat', Index::class)->name('chat.index');
//     Route::get('/chat/{query}', Chat::class)->name('chat');

//     Route::get('/profile-page/{userId}', ProfilePage::class)->name('information.profile-page');
    
// });

// Route::middleware(['auth', \App\Http\Middleware\NormalUser::class])->group(function () {
    
//     Route::get('/pharmacies', Pharmacies::class)->name('pharmacies');
// });
// Route::middleware(['auth', \App\Http\Middleware\Pharmacy::class])->group(function () {
//     Route::get('/profile-form/{userId}', ProfileForm::class)->name('information.profile-form');
// }); 
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Livewire routes
    Route::get('/chat', Index::class)->name('chat.index');
    Route::get('/chat/{query}', Chat::class)->name('chat');
    Route::get('/profile-page/{userId}', ProfilePage::class)->name('information.profile-page');
    
    // Additional middleware groups
    Route::middleware(\App\Http\Middleware\NormalUser::class)->group(function () {
        Route::get('/pharmacies', Pharmacies::class)->name('pharmacies');
    });

    Route::middleware(\App\Http\Middleware\Pharmacy::class)->group(function () {
        Route::get('/profile-form/{userId}', ProfileForm::class)->name('information.profile-form');
    });
});

require __DIR__ . '/auth.php';