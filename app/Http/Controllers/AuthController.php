<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        Auth::login($user);

        return redirect()->route('sauces.index')->with('success', 'Compte créé avec succès');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Vérifier si l'email existe
        $user = User::where('email', $credentials['email'])->first();

        // Si aucun utilisateur avec cet email
        if (!$user) {
            return back()->withErrors([
                'email' => 'Aucun compte n\'est associé à cet email.'
            ])->onlyInput('email');
        }

        // Tentative de connexion
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('sauces.index')->with('success', 'Connexion réussie');
        }

        // Si le mot de passe est incorrect
        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Déconnexion réussie');
    }
}