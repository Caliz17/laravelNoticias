<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class User extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $apiUrl = env('API');

        $response = Http::post($apiUrl . '/login-user', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            session(['api_token' => $data['token']]);

            return redirect()->route('home')->with('success', 'Login successful');
        } else {
            return back()->withErrors(['error' => 'Login failed. Please check your credentials.']);
        }
    }

    public function logout()
    {
        session()->forget('api_token');
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully');
    }
}
