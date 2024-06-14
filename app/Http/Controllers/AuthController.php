<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $users = User::all();
        return view('auth.login', compact('users'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'password' => 'required',
        ]);

        $user = User::find($request->user_id);

        if ($user && Auth::attempt(['id' => $user->id, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'user_id' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}