<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // Redirect to dashboard if already logged in
        if (Auth::check()) {
            return redirect("/dashboard");
        }

        return view("welcome");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("/dashboard");
        }

        return back()
            ->withErrors([
                "email" => "These credentials do not match our records.",
            ])
            ->onlyInput("email");
    }
}
