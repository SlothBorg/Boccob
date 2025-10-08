<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route("dashboard");
        } else {
            return view("pages.login");
        }
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route("dashboard");
        }

        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("dashboard");
        }

        return back()
            ->withErrors([
                "login" => "These credentials do not match our records.",
            ])
            ->onlyInput("email");
    }
}
