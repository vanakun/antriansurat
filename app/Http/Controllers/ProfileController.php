<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    function index($id){
        $user = User::findOrFail($id);

        return view('profile/index', compact('user'));
    }

    function accountSet($id){
        $user = User::findOrFail($id);

        return view('profile/account-set', compact('user'));
    }

    function changePw($id){
        $user = User::findOrFail($id);

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


    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('The '. 'old password' .' is incorrect.');
                }
            }],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $user->password = bcrypt($request->input('new_password'));
        $user->save();
        return redirect("profile/change-pw");
    }
}
