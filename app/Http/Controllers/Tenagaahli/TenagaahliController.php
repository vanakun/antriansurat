<?php

namespace App\Http\Controllers\Tenagaahli;

use App\Http\Controllers\Controller;
use App\Models\SuratHubunganMasyarakat;
use App\Models\SuratHukum;
use App\Models\SuratKepegawaian;
use App\Models\SuratKetatausahaanDanKerumahtangaan;
use App\Models\SuratKeuangan;
use App\Models\SuratLog;
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
    
    $surathk = SuratHukum::where('user_id', $userId)->paginate(5);

    $suratpw = SuratPengawasan::where('user_id', $userId)->paginate(5);

    $suratti = SuratTeknologiInformasi::where('user_id', $userId)->paginate(5);
    //dd($suratPengawasanPemilus);
    return view('pages.user.index', compact('suratti','suratpw','surathk','suratPengawasanPemilus','suratpp','suratps','suratpr','suratot','suratka','suratku','suratpl',"surathm",'suratkp','suratrt'));
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
    public function createsurathk()
    {
        return view ('pages/user/surat/createhk');
    }

    public function createsuratrt()
    {
        return view ('pages/user/surat/creatert');
    }

    public function createsuratpw()
    {
        return view ('pages/user/surat/createpw');
    }

    public function createsuratti()
    {
        return view ('pages/user/surat/createti');
    }

    public function tolakSurat(Request $request, $id)
    {
        // Ambil data surat berdasarkan ID
        $surat = SuratPengawasanPemilu::findOrFail($id);
    
        // Ubah status surat menjadi "reject"
        $surat->status = 'reject';
        $surat->save();
    
        // Redirect atau berikan respon yang sesuai
        return response()->json(['message' => 'Status surat berhasil diubah menjadi reject']);
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
    $surat = SuratPengawasanPemilu::create($validatedData);

    // Log the creation of the surat
    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratPengawasanPemilu::class,
    ]);

    // Juga bisa log ke file
    \Log::info('Surat PM created', [
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratPengawasanPemilu::class,
        'timestamp' => now(),
    ]);

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
    
    $userId = auth()->id();

   
    $validatedData['user_id'] = $userId;

    $validatedData['j_surat'] = 'Penanganan Pelangaran dan Sengketa Pemilu (PP)';

    // Create the record
    $surat = SuratPenangananPelanggaranSengketaPemilu::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratPenangananPelanggaranSengketaPemilu::class,
    ]);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }

    public function showsuratpmuser($id)
    {
        $suratPengawasanPemilus = SuratPengawasanPemilu::findOrFail($id);
        // Tampilkan halaman edit surat
        return view('pages/user/surat/show-surat/showpm', compact('suratPengawasanPemilus'));
    }

    public function showsuratppuser($id)
    {
        $surat = SuratPenangananPelanggaranSengketaPemilu::findOrFail($id);
        // Tampilkan halaman edit surat
        return view('pages/user/surat/show-surat/showpp', compact('surat'));
    }

    public function showsuratpsuser($id)
    {
        $surat = SuratPenyelesaianSengketa::findOrFail($id);
        // Tampilkan halaman edit surat
        return view('pages/user/surat/show-surat/showps', compact('surat'));
    }

    public function showsuratpruser($id)
    {
        $surat = SuratPerencanaan::findOrFail($id);
        // Tampilkan halaman edit surat
        return view('pages/user/surat/show-surat/showpr', compact('surat'));
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

    $validatedData['user_id'] = $userId;

    // Create the record

    $surat = SuratPenyelesaianSengketa::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratPenyelesaianSengketa::class,
    ]);
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

    
    $validatedData['user_id'] = $userId;

    // Create the record


    $surat = SuratPerencanaan::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratPerencanaan::class,
    ]);

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

    $validatedData['user_id'] = $userId;

    // Create the record

    $surat = SuratOrganisasiDanTataLaksana::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratOrganisasiDanTataLaksana::class,
    ]);

    

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
   
    $validatedData['user_id'] = $userId;

    // Create the record

    $surat = SuratPersuratanDanKearsipan::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratPersuratanDanKearsipan::class,
    ]);

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

   
    $validatedData['user_id'] = $userId;

    // Create the record
    

    $surat = SuratKeuangan::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratKeuangan::class,
    ]);

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

    $validatedData['user_id'] = $userId;

    // Create the record
    

    $surat = SuratPerlengkapan::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratPerlengkapan::class,
    ]);

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

    $validatedData['user_id'] = $userId;

    // Create the record

    $surat = SuratHubunganMasyarakat::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratHubunganMasyarakat::class,
    ]);

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
    
    $validatedData['user_id'] = $userId;

    // Create the record
   

    $surat = SuratKepegawaian::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratKepegawaian::class,
    ]);

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

   
    $validatedData['user_id'] = $userId;

    // Create the record
   

    $surat = SuratKetatausahaanDanKerumahtangaan::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratKetatausahaanDanKerumahtangaan::class,
    ]);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }

    public function storesurathk(Request $request)
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

    $validatedData['j_surat'] = 'HUKUM(HK)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
   
    $validatedData['user_id'] = $userId;

    // Create the record
   

    $surat = SuratHukum::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratHukum::class,
    ]);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }

    public function storesuratpw(Request $request)
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

    $validatedData['j_surat'] = 'PENGAWASAN(PW)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
   
    $validatedData['user_id'] = $userId;

    // Create the record
    $surat = SuratPengawasan::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratPengawasan::class,
    ]);


    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }

    public function storesuratti(Request $request)
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

    $validatedData['j_surat'] = 'TEKNOLOGI INFORMASI(TI)';

    // Ambil ID pengguna yang sedang masuk
    $userId = auth()->id();

    // Ambil nomor surat terakhir dari database
   
    $validatedData['user_id'] = $userId;

    // Create the record
   

    $surat = SuratTeknologiInformasi::create($validatedData);

    SuratLog::create([
        'user_id' => $userId,
        'surat_id' => $surat->id,
        'surat_type' => SuratTeknologiInformasi::class,
    ]);

    // Redirect to success page or do any other operation upon successful submission
    return redirect()->route('tenagaahliDashboard');
    }
}
