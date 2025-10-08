<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get("/", function () {
    return view("pages.welcome");
})->name("home");

Route::view("dashboard", "dashboard")
    ->middleware(["auth", "verified"])
    ->name("dashboard");

// Route::get("/", [LoginController::class, "index"])->name("home");
// Route::post("/login", [LoginController::class, "login"])->name("login");

// Route::middleware(["auth"])->group(function () {
//     Route::redirect("settings", "settings/profile");

//     Volt::route("settings/profile", "settings.profile")->name("profile.edit");
//     Volt::route("settings/password", "settings.password")->name(
//         "password.edit",
//     );
//     Volt::route("settings/appearance", "settings.appearance")->name(
//         "appearance.edit",
//     );

//     Volt::route("settings/two-factor", "settings.two-factor")
//         ->middleware(
//             when(
//                 Features::canManageTwoFactorAuthentication() &&
//                     Features::optionEnabled(
//                         Features::twoFactorAuthentication(),
//                         "confirmPassword",
//                     ),
//                 ["password.confirm"],
//                 [],
//             ),
//         )
//         ->name("two-factor.show");
// });

require __DIR__ . "/auth.php";
