<?php

// app/Http/Controllers/JurnalUmumController.php

namespace App\Http\Controllers\Perusahaan;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JurnalUmum;
use App\Models\Jurnal;
use App\Models\KodeApp;

class JurnalUmumController extends Controller
{

    public function createJurnalUmum()
    {
        $kodeAkunList = KodeApp::all();
        $jurnalList = Jurnal::all();


        return view('pages/perusahaan/create', compact('kodeAkunList','jurnalList'));
    }

    public function storeJurnalUmum(Request $request)
{
    $kodeAkunList = KodeApp::all();
    $jurnalList = Jurnal::all();

    $data = $request->validate([
        'tanggal' => 'required|date',
        'bukti_transaksi' => 'required|string',
        'keterangan' => 'required|string',
        'kode_akun' => 'required|string',
        'jurnal_id' => 'required|numeric',
        'debet' => 'nullable|numeric',
        'kredit' => 'nullable|numeric',
    ]);

    //dd($data);
    
    
    // Dapatkan ID kode_akun dari model KodeApp
    $kodeAkun = KodeApp::where('kode', $request->input('kode_akun'))->first();
    $kodejurnal = Jurnal::where('id', $request->input('jurnal_id'))->first();

    // Pastikan kode_akun ditemukan
    if ($kodeAkun && $kodejurnal) {
        $data['kode_app_id'] = $kodeAkun->id;
        $data['jurnal_id'] = $kodejurnal->id; // Assign jurnal_id from the fetched Jurnal

        // Create the JurnalUmum entry
        //dd($data);
        try {
            JurnalUmum::create($data);
            dd('Data Jurnal Umum berhasil disimpan.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('dashboard')->with('success', 'Data Jurnal Umum berhasil disimpan.');
    } else {
        // Handle the case where either kode_akun or jurnal_id is not found
        return redirect()->back()->with('error', 'Kode Akun atau Jurnal tidak valid.');
    }
}

    



    


    public function index()
    {
        $jurnalUmumList = JurnalUmum::with('kodeApp')->get();
        $jurnalUmum = JurnalUmum::all();

        return view('pages/perusahaan/list-project', compact('jurnalUmum'));
    }

    public function show($id)
    {
        $jurnalUmum = JurnalUmum::findOrFail($id);

        return view('jurnal-umum.show', compact('jurnalUmum'));
    }

    // app/Http/Controllers/Perusahaan/JurnalUmumController.php

    public function indexBukuBesar(Request $request)
{
    // Ambil kode akun dan jurnal id dari query string jika ada
    $kodeAkunFilter = $request->query('kode_app_id');
    $jurnalIdFilter = $request->query('jurnal_id');

    // Query berdasarkan kode akun dan jurnal id jika ada
    $query = JurnalUmum::query();
    
    if ($kodeAkunFilter) {
        $query->where('kode_app_id', $kodeAkunFilter);
    }

    if ($jurnalIdFilter) {
        $query->where('jurnal_id', $jurnalIdFilter);
    }

    // Ambil data jurnal umum
    $jurnalUmum = $query->get();

    // Dapatkan semua kode akun dan jurnal untuk filter
    $kodeAkunList = KodeApp::all();
    $jurnalList = Jurnal::all();

    return view('pages/perusahaan/buku-besar/list-buku', compact('jurnalUmum', 'kodeAkunList', 'jurnalList', 'kodeAkunFilter', 'jurnalIdFilter'));
}


public function projectSearch(Request $request)
{
    // Ambil kode akun dan jurnal id dari query string jika ada
    $kodeAkunFilter = $request->query('kode_app_id');
    $jurnalIdFilter = $request->query('jurnal_id');

    $query = JurnalUmum::query();

    // Filter berdasarkan kode akun jika ada
    if ($kodeAkunFilter) {
        $query->where('kode_app_id', $kodeAkunFilter);
    }

    // Filter berdasarkan jurnal id jika ada
    if ($jurnalIdFilter) {
        $query->where('jurnal_id', $jurnalIdFilter);
    }

    $jurnalUmum = $query->get();

    $kodeAkunList = KodeApp::all();
    $jurnalList = Jurnal::all();

    return view('pages/perusahaan/buku-besar/list-buku', compact('jurnalUmum', 'kodeAkunList', 'jurnalList', 'kodeAkunFilter', 'jurnalIdFilter'));
}





    
}
