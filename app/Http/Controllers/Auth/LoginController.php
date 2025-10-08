<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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

    public function login(LoginRequest $request)
    {
        if (Auth::check()) {
            return redirect()->route("dashboard");
        }

        if (Auth::attempt($request->only("email", "password"))) {
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
