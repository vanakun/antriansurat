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

    //Surat PM
    public function indexAntrianpm()
    {
    $suratPengawasanPemilus = SuratPengawasanPemilu::where('status', 'waiting')
                                                    ->paginate(5);
    $suratPengawasanPemilusdone = SuratPengawasanPemilu::where('status', 'done')
                                                    ->paginate(5);
    return view('pages/admin/pm/showpm', compact('suratPengawasanPemilus','suratPengawasanPemilusdone'));
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
        'status' => $request->status,
        'surat' => $request->surat,
        'tanggal' => $request->tanggal,
        'nama' => $request->nama,
        'perihal' => $request->perihal,
        'tujuan' => $request->tujuan,
        'jenis_surat' => $request->jenis_surat,
        'keterangan' => $request->keterangan,
        'nomor_surat' => $no_surat, // Gunakan nomor surat baru
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
    $suratPengawasanPemilus->no_surat = $no_surat;
    $suratPengawasanPemilus->save();
    //dd($no_surat);
    // Redirect ke halaman yang sesuai setelah pembaruan
    return redirect()->route('adminDashboard')->with('success', 'Surat berhasil diperbarui.');
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
        'nomor_surat' => $request->no_surat, // Gunakan nomor surat baru
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
    //dd($no_surat);
    // Redirect ke halaman yang sesuai setelah pembaruan
    return redirect()->route('adminDashboard')->with('success', 'Surat berhasil diperbarui.');
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
