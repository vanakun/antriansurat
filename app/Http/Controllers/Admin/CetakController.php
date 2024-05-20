<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\SuratPengawasanPemilu;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetakpm()
    {
        $suratPengawasanPemilus = SuratPengawasanPemilu::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.pm.cetakpm', compact('suratPengawasanPemilus'));
    }


}
