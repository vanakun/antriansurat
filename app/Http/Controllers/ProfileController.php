<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function index(User $user){
        if (auth()->user()->id !== $user->id) {
            return redirect()->route('setting', auth()->user()->id)->with('error', 'Unauthorized access.');
        }
        return view('profile/index', compact('user'));
    }

    function accountSet(User $user){
        if (auth()->user()->id !== $user->id) {
            return redirect()->route('accountSet', auth()->user()->id)->with('error', 'Unauthorized access.');
        }
        return view('profile/account-set', compact('user'));
    }

    public function requestChange(Request $request)
    {
        // Validasi input email baru
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        // Generate verification code (Anda dapat menggunakan cara lain sesuai kebutuhan)
        $verificationCode = str_random(16);

        // Simpan perubahan email dan kode verifikasi dalam tabel user_email_changes
        $user = auth()->user(); // Sesuaikan dengan autentikasi Anda
        $userEmailChange = new User;
        $userEmailChange->user_id = $user->id;
        $userEmailChange->email = $request->email;
        $userEmailChange->verification_code = $verificationCode;
        $userEmailChange->save();

        // Kirim email verifikasi
        Mail::to($userEmailChange->new_email)->send(new EmailVerification($verificationCode));

        return redirect()->route('email-verification.form');
    }

    function changePw(User $user){
        if (auth()->user()->id !== $user->id) {
            return redirect()->route('changePw', auth()->user()->id)->with('error', 'Unauthorized access.');
        }
        return view('profile/change-pw', compact('user'));
    }

    function updateAccount(Request $request, $id)
    {
        $user = User::find(auth()->user()->id);

        $user->name = $request->input('name');

        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        // Validasi dan format ulang nomor telepon
        $phone = $request->input('phone');
        if (!preg_match('/^(\+62|0)/', $phone)) {
            // Jika nomor telepon tidak dimulai dengan +62 atau 0, tambahkan +62
            $phone = '+62' . ltrim($phone, '0');
        }

        $user->phone = $phone;
        if ($request->has('role')) {
            $user->role = $request->input('role');
        }

        $user->gender = $request->input('gender');

        $user->save();

        return redirect()->route('setting', $user->id)->with('success', 'Profile updated successfully.');
    }


    public function updatePassword(Request $request, $id)
    {
        $user = User::find(auth()->user()->id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('changePw', $user->id)
                ->withErrors($validator)
                ->withInput();
        }

        // Memeriksa apakah old password benar
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->route('changePw', $user->id)
                ->with('error', 'The old password is incorrect.');
        }

        // Mengganti kata sandi jika old password valid
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('changePw', $user->id)->with('success', 'Password updated successfully.');
    }
}
