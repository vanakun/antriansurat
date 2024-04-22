<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('login.main', [
            'layout' => 'login'
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = \Auth::user();

            if ($user->hasRole('Admin')) {
                return redirect()->route('adminDashboard'); 
            } elseif ($user->hasRole('User')) {
                return redirect()->route('tenagaahliDashboard'); 
            }
        }
        return redirect()->route('login.main')->with('error', 'Email atau password salah.');
    }
}
