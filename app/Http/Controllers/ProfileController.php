<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    function index($id){
        $user = User::findOrFail($id);

        return view('profile/index', compact('user'));
    }
}
