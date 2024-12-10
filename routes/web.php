<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', _SiteController::class)->name('index');

Route::middleware(['auth'])->group(function () {
    Route::resource('/contacts', ContactController::class)->names('contacts');
    Route::post('/contacts/{contact}/force-delete', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');
    Route::post('/contacts/{contact}/restore', [ContactController::class, 'restore'])->name('contacts.restore');
});

require __DIR__ . '/auth.php';
