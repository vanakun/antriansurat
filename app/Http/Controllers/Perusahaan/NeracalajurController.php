<?php

// app/Http/Controllers/JurnalUmumController.php

namespace App\Http\Controllers\Perusahaan;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KodeApp;
use App\Models\Jurnal;


class NeracalajurController extends Controller{
    public function indexNeracaLajur()
    {
        $kodeAkunList = KodeApp::all();
        $jurnalList = Jurnal::all();

        return view('pages/perusahaan/neraca-lajur/list-project', compact('kodeAkunList','jurnalList'));
    }
   
}