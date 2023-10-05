<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;

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
        if (!\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong email or password.');
        }
    }

    public function registerView()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        // Inisialisasi variabel-variabel berdasarkan karakteristik password
        $password = $request->input('password');
        $passwordContainsUppercase = preg_match('/[A-Z]/', $password);
        $passwordContainsDigit = preg_match('/\d/', $password);
        $passwordLength = strlen($password);
        $passwordContainsSpecialChar = preg_match('/[^a-zA-Z\d]/', $password);

        // Validasi input dari form pendaftaran
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
            // Tambahkan validasi lainnya sesuai kebutuhan Anda
        ]);


        if ($validator->fails()) {
            // Validasi gagal, kembalikan pesan error ke formulir pendaftaran
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proses pendaftaran user dan lainnya
        // ...
            
        return redirect('/dashboard'); // Redirect ke halaman dashboard setelah pendaftaran berhasil
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
