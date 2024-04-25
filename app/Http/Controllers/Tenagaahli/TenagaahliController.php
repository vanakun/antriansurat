<?php

namespace App\Http\Controllers\Tenagaahli;

use App\Http\Controllers\Controller;
use App\Models\SuratHubunganMasyarakat;
use App\Models\SuratKepegawaian;
use App\Models\SuratKetatausahaanDanKerumahtangaan;
use App\Models\SuratKeuangan;
use App\Models\SuratOrganisasiDanTataLaksana;
use App\Models\SuratPenangananPelanggaranSengketaPemilu;
use App\Models\SuratPengawasanPemilu;
use App\Models\SuratPenyelesaianSengketa;
use App\Models\SuratPerencanaan;
use App\Models\SuratPerlengkapan;
use App\Models\SuratPersuratanDanKearsipan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TenagaahliController extends Controller
{
   

public function index()
{
    // Ambil ID pengguna yang saat ini masuk
    $userId = Auth::id();

    // Cari surat pengawasan pemilu yang terkait dengan pengguna yang saat ini masuk
    $suratPengawasanPemilus = SuratPengawasanPemilu::where('user_id', $userId)->paginate(5);

    $suratpp = SuratPenangananPelanggaranSengketaPemilu::where('user_id', $userId)->paginate(5);

    $suratps = SuratPenyelesaianSengketa::where('user_id', $userId)->paginate(5);

    $suratpr = SuratPerencanaan::where('user_id', $userId)->paginate(5);

    $suratot = SuratOrganisasiDanTataLaksana::where('user_id', $userId)->paginate(5);
    
    $suratka = SuratPersuratanDanKearsipan::where('user_id', $userId)->paginate(5);
    // Kirim data ke tampilan
    $suratku = SuratKeuangan::where('user_id', $userId)->paginate(5);

    $suratpl = SuratPerlengkapan::where('user_id', $userId)->paginate(5);

    $surathm = SuratHubunganMasyarakat::where('user_id', $userId)->paginate(5);

    $suratkp = SuratKepegawaian::where('user_id', $userId)->paginate(5);
    
    $suratrt = SuratKetatausahaanDanKerumahtangaan::where('user_id', $userId)->paginate(5);
    
    return view('pages.user.index', compact('suratPengawasanPemilus','suratpp','suratps','suratpr','suratot','suratka','suratku','suratpl',"surathm",'suratkp','suratrt'));
}


    public function createsurat()
    {
        return view ('pages/user/listsurat');
    }

    public function createsuratpm()
    {
        return view ('pages/user/surat/createpm');
    }

    public function createsuratpp()
    {
        return view ('pages/user/surat/createpp');
    }
    public function createsuratps()
    {
        return view ('pages/user/surat/createps');
    }
    public function createsuratpr()
    {
        return view ('pages/user/surat/createpr');
    }

    public function createsuratot()
    {
        return view ('pages/user/surat/createot');
    }

    public function createsuratka()
    {
        return view ('pages/user/surat/createka');
    }

    public function createsuratku()
    {
        return view ('pages/user/surat/createku');
    }

    public function createsuratpl()
    {
        return view ('pages/user/surat/createpl');
    }

    public function createsurathm()
    {
        return view ('pages/user/surat/createhm');
    }

    public function createsuratkp()
    {
        return view ('pages/user/surat/createkp');
    }

    public function createsuratrt()
    {
        return view ('pages/user/surat/creatert');
    }

    public function storesuratpm(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'substantif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'Pengawasan Pemilu (PM)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

   
    $validatedData['user_id'] = $userId;

    // Create the record
    SuratPengawasanPemilu::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }

    public function storesuratpp(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'substantif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'Penanganan Pelangaran dan Sengketa Pemilu (PP)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratPenangananPelanggaranSengketaPemilu::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['substantif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    SuratPenangananPelanggaranSengketaPemilu::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
}
public function storesuratps(Request $request)
{
// Validasi data input
$validatedData = $request->validate([
    'tanggal' => 'required|date',
    'nama' => 'required|string',
    'perihal' => 'required|string',
    'tujuan' => 'required|string',
    'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
    'keterangan' => 'required|string',
    'kota' => 'required|string',
    'substantif' => 'required|string',
]);

$validatedData['j_surat'] = 'PENYELESAIAN SENGKETA (PS)';

// Ambil ID pengguna yang sedang masuk
$userId = auth()->id();

// Ambil nomor surat terakhir dari database
$lastSuratNumber = SuratPenyelesaianSengketa::max('no_surat');

// Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
if (!$lastSuratNumber) {
    $lastSuratNumber = '001';
} else {
    // Ambil angka dari nomor surat terakhir dan tambahkan 1
    $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
    // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
    $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
}

// Generate nomor surat baru
$no_surat = $lastSuratNumber . '/' . $validatedData['substantif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

// Assign nomor surat dan ID pengguna to validated data
$validatedData['no_surat'] = $no_surat;
$validatedData['user_id'] = $userId;

// Create the record
SuratPenyelesaianSengketa::create($validatedData);

// Redirect to success page or do any other operation upon successful submission
return redirect()->route('tenagaahliDashboard');
}    
    public function storesuratpr(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'fasilitatif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'PERENCANAAN (PR)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratPerencanaan::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['fasilitatif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    SuratPerencanaan::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }    

    
    public function storesuratot(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'fasilitatif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'ORGANISASI DAN TATA LAKSANA (OT)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratOrganisasiDanTataLaksana::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['fasilitatif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    SuratOrganisasiDanTataLaksana::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }
    public function storesuratka(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'fasilitatif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'PERSURATAN DAN KEARSIPAN (KA)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratPersuratanDanKearsipan::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['fasilitatif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    SuratPersuratanDanKearsipan::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }
    public function storesuratku(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'fasilitatif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'KEUANGAN (KU)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratKeuangan::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['fasilitatif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    
    SuratKeuangan::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }

    public function storesuratpl(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'fasilitatif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'PERLENGKAPAN (PL)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratPerlengkapan::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['fasilitatif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    
    SuratPerlengkapan::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }

    public function storesurathm(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'fasilitatif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'HUBUNGAN MASYARAKAT (HM)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratHubunganMasyarakat::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['fasilitatif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    SuratHubunganMasyarakat::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }
    
    public function storesuratkp(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'fasilitatif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'KEPEGAWAIAN (KP)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratKepegawaian::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['fasilitatif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    SuratKepegawaian::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }
    
    public function storesuratrt(Request $request)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string',
        'perihal' => 'required|string',
        'tujuan' => 'required|string',
        'jenis_surat' => 'required|string|in:Surat Masuk,Surat Keluar',
        'keterangan' => 'required|string',
        'kota' => 'required|string',
        'fasilitatif' => 'required|string',
    ]);

    $validatedData['j_surat'] = 'KETATAUSAHAAN DAN KERUMAHTANGGAAN (RT)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratKetatausahaanDanKerumahtangaan::max('no_surat');

    // Jika tidak ada nomor surat sebelumnya, gunakan nomor surat awal "001"
    if (!$lastSuratNumber) {
        $lastSuratNumber = '001';
    } else {
        // Ambil angka dari nomor surat terakhir dan tambahkan 1
        $lastSuratNumber = intval(substr($lastSuratNumber, 0, 3)) + 1;
        // Format nomor surat dengan 3 digit dan tambahkan 0 di depan jika perlu
        $lastSuratNumber = sprintf("%03d", $lastSuratNumber);
    }

    // Generate nomor surat baru
    $no_surat = $lastSuratNumber . '/' . $validatedData['fasilitatif'] . '/' . $validatedData['kota'] . '/' . date('m') . '/' . date('Y');

    // Assign nomor surat dan ID pengguna to validated data
    $validatedData['no_surat'] = $no_surat;
    $validatedData['user_id'] = $userId;

    // Create the record
    SuratKetatausahaanDanKerumahtangaan::create($validatedData);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }

}
