<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('login.main', [
            'layout' => 'login'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (
            !\Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ) {
            throw new \Exception('Wrong email or password.');
        }
    }

    public function registerView()
    {
        return view('pages.register');
    }

    public function registerStore(Request $request)
    {
        // Buat pengguna baru
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        // Berhasil mendaftar, alihkan ke halaman masuk (login)
        return redirect()->route('login.index')->with('success', 'Akun Anda telah berhasil dibuat. Silakan masuk.');
    }


    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('login');
    }
}