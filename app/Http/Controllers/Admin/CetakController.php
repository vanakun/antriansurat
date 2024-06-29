<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\SuratHubunganMasyarakat;
use App\Models\SuratHukum;
use App\Models\SuratKepegawaian;
use App\Models\SuratKetatausahaanDanKerumahtangaan;
use App\Models\SuratKeuangan;
use App\Models\SuratOrganisasiDanTataLaksana;
use App\Models\SuratPenangananPelanggaranSengketaPemilu;
use App\Models\SuratPengawasan;
use App\Models\SuratPengawasanPemilu;
use App\Models\SuratPenyelesaianSengketa;
use App\Models\SuratPerencanaan;
use App\Models\SuratPerlengkapan;
use App\Models\SuratPersuratanDanKearsipan;
use App\Models\SuratTeknologiInformasi;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetakpm()
    {
        $suratPengawasanPemilus = SuratPengawasanPemilu::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.pm.cetakpm', compact('suratPengawasanPemilus'));
    }
    public function cetakpp()
    {
        $surats = SuratPenangananPelanggaranSengketaPemilu::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.pp.cetakpp', compact('surats'));
    }
    public function cetakps()
    {
        $surats = SuratPenyelesaianSengketa::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.ps.cetakps', compact('surats'));
    }
    public function cetakpr()
    {
        $surats = SuratPerencanaan::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.pr.cetakpr', compact('surats'));
    }
    public function cetakot()
    {
        $surats = SuratOrganisasiDanTataLaksana::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.ot.cetakot', compact('surats'));
    }
    public function cetakka()
    {
        $surats = SuratPersuratanDanKearsipan::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.ka.cetakka', compact('surats'));
    }
    public function cetakku()
    {
        $surats = SuratKeuangan::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.ku.cetakku', compact('surats'));
    }
    public function cetakpl()
    {
        $surats = SuratPerlengkapan::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.pl.cetakpl', compact('surats'));
    }
    public function cetakhk()
    {
        $surats = SuratHukum::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.hk.cetakhk', compact('surats'));
    }
    public function cetakhm()
    {
        $surats = SuratHubunganMasyarakat::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.hm.cetakhm', compact('surats'));
    }
    public function cetakkp()
    {
        $surats = SuratKepegawaian::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.kp.cetakkp', compact('surats'));
    }
    public function cetakrt()
    {
        $surats = SuratKetatausahaanDanKerumahtangaan::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.rt.cetakrt', compact('surats'));
    }
    public function cetakpw()
    {
        $surats = SuratPengawasan::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.pw.cetakpw', compact('surats'));
    }
    public function cetakti()
    {
        $surats = SuratTeknologiInformasi::whereIn('status', ['done', 'waiting'])->get();
        return view('pages.admin.ti.cetakti', compact('surats'));
    }


}
