<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPengawasanPemilu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Step;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages/perusahaan/dashboard');
    }

    public function indexAntrian()
    {
        $userId = Auth::id();

        // Cari surat pengawasan pemilu yang terkait dengan pengguna yang saat ini masuk
        $suratPengawasanPemilus = SuratPengawasanPemilu::where('user_id', $userId)->get();

        return view('pages/admin/index', compact('suratPengawasanPemilus'));
    }

    public function indexAntrianpm()
    {
    $suratPengawasanPemilus = SuratPengawasanPemilu::where('status', 'waiting')
                                                    ->paginate(5);
    $suratPengawasanPemilusdone = SuratPengawasanPemilu::where('status', 'done')
                                                    ->paginate(5);
    return view('pages/admin/showpm', compact('suratPengawasanPemilus','suratPengawasanPemilusdone'));
    }
    
    public function indexAntrianpp()
    {
    $suratpp = SuratPengawasanPemilu::where('status', 'waiting')
                                                    ->paginate(5);
    $suratppdone = SuratPengawasanPemilu::where('status', 'done')
                                                    ->paginate(5);
    return view('pages/admin/showpp', compact('suratpp','suratppdone'));
    }


    
}
