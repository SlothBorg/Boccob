<?php

// use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
// use App\Livewire\Auth\Passwords\Confirm;
// use App\Livewire\Auth\Passwords\Email;
// use App\Livewire\Auth\Passwords\Reset;
// use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [LoginController::class, "index"])->name("index");
Route::post("login", [LoginController::class, "login"])->name("login");

// Route::middleware("guest")->group(function () {
//     Route::get("login", LoginController::class)->name("login");
// });

// Route::get("password/reset", Email::class)->name("password.request");

// Route::get("password/reset/{token}", Reset::class)->name("password.reset");

// Route::middleware("auth")->group(function () {
//     Route::get("email/verify", Verify::class)
//         ->middleware("throttle:6,1")
//         ->name("verification.notice");

//     Route::get("password/confirm", Confirm::class)->name("password.confirm");
// });

Route::middleware("auth")->group(function () {
    Route::view("/dashboard", "pages.dashboard")->name("dashboard");
    // Route::get("email/verify/{id}/{hash}", EmailVerificationController::class)
    //     ->middleware("signed")
    //     ->name("verification.verify");

    Route::post("logout", [LogoutController::class, "logout"])->name("logout");
});
