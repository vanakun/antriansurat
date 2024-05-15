<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPenangananPelanggaranSengketaPemilu;
use App\Models\SuratPengawasanPemilu;
use App\Models\SuratPenyelesaianSengketa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Step;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
{
    // Surat Pengawasan Pemilu
    $suratCountsPM = SuratPengawasanPemilu::select(DB::raw('count(*) as total, status'))
                        ->groupBy('status')
                        ->get();

    $statusespm = $suratCountsPM->pluck('status');
    $totalspm = $suratCountsPM->pluck('total');

    $lastSuratPM = SuratPengawasanPemilu::orderBy('no_surat', 'desc')->first();
    $noSuratTerakhirPM = $lastSuratPM ? $lastSuratPM->no_surat : 'Belum ada surat';

    // Surat Penanganan Pelanggaran dan Sengketa Pemilu
    $suratCountsPP = SuratPenangananPelanggaranSengketaPemilu::select(DB::raw('count(*) as total, status'))
                        ->groupBy('status')
                        ->get();

    $statusespp = $suratCountsPP->pluck('status');
    $totalspp = $suratCountsPP->pluck('total');

    $lastSuratPP = SuratPenangananPelanggaranSengketaPemilu::orderBy('no_surat', 'desc')->first();
    $noSuratTerakhirPP = $lastSuratPP ? $lastSuratPP->no_surat : 'Belum ada surat';

    // Surat Penanganan Penyelesaian Sengketa Pemilu
    $suratCountsPs = SuratPenyelesaianSengketa::select(DB::raw('count(*) as total, status'))
                        ->groupBy('status')
                        ->get();

    $statusesps = $suratCountsPs->pluck('status');
    $totalsps = $suratCountsPs->pluck('total');

    $lastSuratPs = SuratPenyelesaianSengketa::orderBy('no_surat', 'desc')->first();
    $noSuratTerakhirPs = $lastSuratPs ? $lastSuratPs->no_surat : 'Belum ada surat';

    return view('pages/perusahaan/dashboard', compact('statusespm', 'totalspm', 'noSuratTerakhirPM', 'statusespp', 'totalspp', 'noSuratTerakhirPP','statusesps', 'totalsps', 'noSuratTerakhirPs'));
}



    public function indexAntrian()
    {
        $userId = Auth::id();

        // Cari surat pengawasan pemilu yang terkait dengan pengguna yang saat ini masuk
        $suratPengawasanPemilus = SuratPengawasanPemilu::where('user_id', $userId)->get();

        return view('pages/admin/index', compact('suratPengawasanPemilus'));
    }

    //Surat PM
    public function indexAntrianpm()
    {
    $suratPengawasanPemilus = SuratPengawasanPemilu::where('status', 'waiting')
                                                    ->paginate(5);
    $suratPengawasanPemilusdone = SuratPengawasanPemilu::where('status', 'done')
                                                    ->paginate(5);
    $suratPengawasanPemilusqueue = SuratPengawasanPemilu::where('status', 'queue')
                                                    ->paginate(5);
    return view('pages/admin/pm/showpm', compact('suratPengawasanPemilus','suratPengawasanPemilusdone','suratPengawasanPemilusqueue'));
    }
    public function editsuratpm($id)
    {
    $suratPengawasanPemilus = SuratPengawasanPemilu::findOrFail($id);
    // Tampilkan halaman edit surat
    return view('pages/admin/pm/editpm', compact('suratPengawasanPemilus'));
    }
    public function updatepm(Request $request, $id)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'status' => 'required',
        'surat' => 'required',
        'tanggal' => 'required|date',
        'nama' => 'required',
        'perihal' => 'required',
        'tujuan' => 'required',
        'jenis_surat' => 'required',
        'keterangan' => 'required',
        'file_surat' => 'nullable|file|mimes:pdf|max:2048', // Validasi untuk file surat (opsional)
        'substantif' => 'required', // Validasi untuk substantif
        'kota' => 'required', // Validasi untuk kota
    ]);

    // Ambil nomor surat terakhir dari database
    $lastSuratNumber = SuratPengawasanPemilu::max('no_surat');

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

    // Cari surat pengawasan pemilu berdasarkan ID
    $suratPengawasanPemilus = SuratPengawasanPemilu::findOrFail($id);

    // Perbarui data surat dengan data yang diterima dari formulir
    $suratPengawasanPemilus->update([
        'status' => 'waiting', // Set the status to 'waiting' initially
        'surat' => $request->surat,
        'tanggal' => $request->tanggal,
        'nama' => $request->nama,
        'perihal' => $request->perihal,
        'tujuan' => $request->tujuan,
        'jenis_surat' => $request->jenis_surat,
        'keterangan' => $request->keterangan,
        'no_surat' => $no_surat, // Gunakan nomor surat baru
    ]);
    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); // Simpan file ke direktori yang diinginkan

        // Simpan nama file surat dalam database
        $suratPengawasanPemilus->file_surat = $fileName;
        $suratPengawasanPemilus->status = 'done'; // Ubah status menjadi 'done'
        $suratPengawasanPemilus->save();
    }
   //dd($suratPengawasanPemilus);

    // Save the updated model
    $suratPengawasanPemilus->save();

    // Redirect ke halaman yang sesuai setelah pembaruan
    return redirect()->route('indexAntrianpm')->with('success', 'Surat berhasil diperbarui.');
}

    public function editsuratpmdone($id)
    {
    $suratPengawasanPemilus = SuratPengawasanPemilu::findOrFail($id);
    // Tampilkan halaman edit surat
    return view('pages/admin/pm/editpmdone', compact('suratPengawasanPemilus'));
    }
    public function updatepmdone(Request $request, $id)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'status' => 'required',
        'surat' => 'required',
        'tanggal' => 'required|date',
        'nama' => 'required',
        'perihal' => 'required',
        'tujuan' => 'required',
        'jenis_surat' => 'required',
        'keterangan' => 'required',
        'file_surat' => 'nullable|file|mimes:pdf|max:2048', // Validasi untuk file surat (opsional)
        'substantif' => 'required', // Validasi untuk substantif
        'kota' => 'required', // Validasi untuk kota
        'nomor_surat' => 'required',
    ]);


    // Cari surat pengawasan pemilu berdasarkan ID
    $suratPengawasanPemilus = SuratPengawasanPemilu::findOrFail($id);

    // Perbarui data surat dengan data yang diterima dari formulir
    $suratPengawasanPemilus->update([
        'status' => $request->status,
        'surat' => $request->surat,
        'tanggal' => $request->tanggal,
        'nama' => $request->nama,
        'perihal' => $request->perihal,
        'tujuan' => $request->tujuan,
        'jenis_surat' => $request->jenis_surat,
        'keterangan' => $request->keterangan,
        'nomor_surat' => $request->nomor_surat, // Gunakan nomor surat baru
    ]);

    // Jika ada file surat yang diunggah, simpan file tersebut
    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); // Simpan file ke direktori yang diinginkan

        // Simpan nama file surat dalam database
        $suratPengawasanPemilus->file_surat = $fileName;
        $suratPengawasanPemilus->status = 'done'; // Ubah status menjadi 'done'
        $suratPengawasanPemilus->save();
    }
    $suratPengawasanPemilus->save();
    //dd($suratPengawasanPemilus);
    // Redirect ke halaman yang sesuai setelah pembaruan
    return redirect()->route('indexAntrianpm')->with('success', 'Surat berhasil diperbarui.');
    }


    public function indexAntrianpp()
    {
    $suratpp = SuratPenangananPelanggaranSengketaPemilu::where('status', 'waiting')
                                                    ->paginate(5);
    $suratppdone = SuratPenangananPelanggaranSengketaPemilu::where('status', 'done')
                                                    ->paginate(5);
    $suratppqueue = SuratPenangananPelanggaranSengketaPemilu::where('status', 'queue')
                                                    ->paginate(5);
    return view('pages/admin/pp/showpp', compact('suratpp','suratppdone','suratppqueue'));
    }

    public function editsuratpp($id)
    {
    $suratpp = SuratPenangananPelanggaranSengketaPemilu::findOrFail($id);
    // Tampilkan halaman edit surat
    return view('pages/admin/pp/editpp', compact('suratpp'));
    }

    public function editsuratppdone($id)
    {
    $suratpp = SuratPenangananPelanggaranSengketaPemilu::findOrFail($id);
    // Tampilkan halaman edit surat
    return view('pages/admin/pp/editppdone', compact('suratpp'));
    }

    public function updatepp(Request $request, $id){
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'status' => 'required',
        'surat' => 'required',
        'tanggal' => 'required|date',
        'nama' => 'required',
        'perihal' => 'required',
        'tujuan' => 'required',
        'jenis_surat' => 'required',
        'keterangan' => 'required',
        'file_surat' => 'nullable|file|mimes:pdf|max:2048', // Validasi untuk file surat (opsional)
        'substantif' => 'required', // Validasi untuk substantif
        'kota' => 'required', // Validasi untuk kota
    ]);

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

    // Cari surat pengawasan pemilu berdasarkan ID
    $suratpp = SuratPenangananPelanggaranSengketaPemilu::findOrFail($id);

    // Perbarui data surat dengan data yang diterima dari formulir
    $suratpp->update([
        'status' => 'waiting', // Set the status to 'waiting' initially
        'surat' => $request->surat,
        'tanggal' => $request->tanggal,
        'nama' => $request->nama,
        'perihal' => $request->perihal,
        'tujuan' => $request->tujuan,
        'jenis_surat' => $request->jenis_surat,
        'keterangan' => $request->keterangan,
        'no_surat' => $no_surat, // Gunakan nomor surat baru
    ]);
    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); // Simpan file ke direktori yang diinginkan

        // Simpan nama file surat dalam database
        $suratpp->file_surat = $fileName;
        $suratpp->status = 'done'; // Ubah status menjadi 'done'
        $suratpp->save();
    }
   //dd($suratPengawasanPemilus);

    // Save the updated model
    $suratpp->save();

    // Redirect ke halaman yang sesuai setelah pembaruan
    return redirect()->route('indexAntrianpp')->with('success', 'Surat berhasil diperbarui.');
    }
    public function updateppdone(Request $request, $id)
    {
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'status' => 'required',
        'surat' => 'required',
        'tanggal' => 'required|date',
        'nama' => 'required',
        'perihal' => 'required',
        'tujuan' => 'required',
        'jenis_surat' => 'required',
        'keterangan' => 'required',
        'file_surat' => 'nullable|file|mimes:pdf|max:2048', // Validasi untuk file surat (opsional)
        'substantif' => 'required', // Validasi untuk substantif
        'kota' => 'required', // Validasi untuk kota
        'nomor_surat' => 'required',
    ]);


    // Cari surat pengawasan pemilu berdasarkan ID
    $suratpp = SuratPenangananPelanggaranSengketaPemilu::findOrFail($id);

    // Perbarui data surat dengan data yang diterima dari formulir
    $suratpp->update([
        'status' => $request->status,
        'surat' => $request->surat,
        'tanggal' => $request->tanggal,
        'nama' => $request->nama,
        'perihal' => $request->perihal,
        'tujuan' => $request->tujuan,
        'jenis_surat' => $request->jenis_surat,
        'keterangan' => $request->keterangan,
        'nomor_surat' => $request->nomor_surat, // Gunakan nomor surat baru
    ]);

    // Jika ada file surat yang diunggah, simpan file tersebut
    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); // Simpan file ke direktori yang diinginkan

        // Simpan nama file surat dalam database
        $suratpp->file_surat = $fileName;
        $suratpp->status = 'done'; // Ubah status menjadi 'done'
        $suratpp->save();
    }
    $suratpp->save();
    //dd($suratPengawasanPemilus);
    // Redirect ke halaman yang sesuai setelah pembaruan
    return redirect()->route('indexAntrianpp')->with('success', 'Surat berhasil diperbarui.');
    }

    public function indexAntrianps()
    {
    $suratps = SuratPenyelesaianSengketa::where('status', 'waiting')
                                                    ->paginate(5);
    $suratpsdone = SuratPenyelesaianSengketa::where('status', 'done')
                                                    ->paginate(5);
    $suratpsqueue = SuratPenyelesaianSengketa::where('status', 'queue')
                                                    ->paginate(5);
    return view('pages/admin/ps/showps', compact('suratps','suratpsdone','suratpsqueue'));
    }

    public function editsuratps($id)
    {
    $suratps = SuratPenyelesaianSengketa::findOrFail($id);
    // Tampilkan halaman edit surat
    return view('pages/admin/ps/editps', compact('suratps'));
    }

    public function editsuratpsdone($id)
    {
    $suratps = SuratPenyelesaianSengketa::findOrFail($id);
    // Tampilkan halaman edit surat
    return view('pages/admin/ps/editpsdone', compact('suratps'));
    }
    public function updatesuratps(Request $request, $id){
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'status' => 'required',
            'surat' => 'required',
            'tanggal' => 'required|date',
            'nama' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'jenis_surat' => 'required',
            'keterangan' => 'required',
            'file_surat' => 'nullable|file|mimes:pdf|max:2048', // Validasi untuk file surat (opsional)
            'substantif' => 'required', // Validasi untuk substantif
            'kota' => 'required', // Validasi untuk kota
        ]);
    
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
    
        // Cari surat pengawasan pemilu berdasarkan ID
        $suratps = SuratPenyelesaianSengketa::findOrFail($id);
    
        // Perbarui data surat dengan data yang diterima dari formulir
        $suratps->update([
            'status' => 'waiting', // Set the status to 'waiting' initially
            'surat' => $request->surat,
            'tanggal' => $request->tanggal,
            'nama' => $request->nama,
            'perihal' => $request->perihal,
            'tujuan' => $request->tujuan,
            'jenis_surat' => $request->jenis_surat,
            'keterangan' => $request->keterangan,
            'no_surat' => $no_surat, // Gunakan nomor surat baru
        ]);
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName); // Simpan file ke direktori yang diinginkan
    
            // Simpan nama file surat dalam database
            $suratps->file_surat = $fileName;
            $suratps->status = 'done'; // Ubah status menjadi 'done'
            $suratps->save();
        }
        //dd($suratps);
    
        // Save the updated model
        $suratps->save();
    
        // Redirect ke halaman yang sesuai setelah pembaruan
        return redirect()->route('indexAntrianps')->with('success', 'Surat berhasil diperbarui.');
        }
    
        public function updatepsdone(Request $request, $id)
    {
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'status' => 'required',
        'surat' => 'required',
        'tanggal' => 'required|date',
        'nama' => 'required',
        'perihal' => 'required',
        'tujuan' => 'required',
        'jenis_surat' => 'required',
        'keterangan' => 'required',
        'file_surat' => 'nullable|file|mimes:pdf|max:2048', // Validasi untuk file surat (opsional)
        'substantif' => 'required', // Validasi untuk substantif
        'kota' => 'required', // Validasi untuk kota
        'nomor_surat' => 'required',
    ]);


    // Cari surat pengawasan pemilu berdasarkan ID
    $suratps = SuratPenyelesaianSengketa::findOrFail($id);

    // Perbarui data surat dengan data yang diterima dari formulir
    $suratps->update([
        'status' => $request->status,
        'surat' => $request->surat,
        'tanggal' => $request->tanggal,
        'nama' => $request->nama,
        'perihal' => $request->perihal,
        'tujuan' => $request->tujuan,
        'jenis_surat' => $request->jenis_surat,
        'keterangan' => $request->keterangan,
        'nomor_surat' => $request->nomor_surat, // Gunakan nomor surat baru
    ]);

    // Jika ada file surat yang diunggah, simpan file tersebut
    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); // Simpan file ke direktori yang diinginkan

        // Simpan nama file surat dalam database
        $suratps->file_surat = $fileName;
        $suratps->status = 'done'; // Ubah status menjadi 'done'
        $suratps->save();
    }
    $suratps->save();
    dd($suratps);
    // Redirect ke halaman yang sesuai setelah pembaruan
    return redirect()->route('indexAntrianps')->with('success', 'Surat berhasil diperbarui.');
    }
}
