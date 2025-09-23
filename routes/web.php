<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return Inertia::render("Welcome");
})->name("home");

Route::get('/about', function () {
    return Inertia::render("About");
})->name("about");

Route::get('contact', [ContactController::class, 'index'])->name("contact.index");
