<?php

namespace App\Http\Controllers\Tenagaahli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Step;
use App\Models\StepMedia;

class TenagaahliController extends Controller
{
    public function index()
    {
        $post = Project::paginate(4);
        return view ('pages/tenagaahli/index', compact('post'));
    }

    public function show($id)
    {   
        $project = Project::findOrFail($id);
        // dd($post);
        $steps = Step::where('project_id', $project->id)->get();
        //dd($steps);
        return view ('pages/tenagaahli/show', compact('project', 'steps'));
    }

    public function showStep($id)
    {
        $step = Step::findOrFail($id);
        $experts = $step->experts;
        $stepMedia = StepMedia::all();
        //dd($stepMedia);

        return view ('pages/tenagaahli/show-step', compact('step', 'experts','stepMedia'));
    }
    
    public function create(Request $request, $step_id)
{
    $step = Step::find($step_id);

    // Validasi data yang dikirim melalui request jika diperlukan
    $request->validate([
        'file' => 'required|file|mimes:pdf,docx,jpg', // Validasi jenis berkas yang diizinkan
    ]);

    // Mengunggah berkas ke direktori penyimpanan
    $file = $request->file('file');
    $filePath = $file->store('storage/step_media'); // Mengganti direktori penyimpanan sesuai kebutuhan
    $file->move(public_path('storage/step_media'), $filePath);

    // Dapatkan nama file yang diunggah
    $fileName = $file->getClientOriginalName();

    // Membuat entri baru dalam tabel step_media dengan name_media yang diambil dari nama file
    StepMedia::create([
        'step_id' => $step_id,
        'file_path' => $filePath,
        'name_media' => $fileName, // Tambahkan kolom name_media sesuai kebutuhan
    ]);

    // Redirect atau kirim respons sukses
    return view('pages/admin/dashboard', compact('step', 'step_id'));
}


    public function shareLink($id)
    {
        // Temukan data posting berdasarkan ID atau sesuaikan dengan data yang ingin Anda bagikan
        $project = Project::find($id);

        // URL yang ingin Anda bagikan (gantilah dengan URL yang sesuai)
        $shareURL = route('showProject', $project->id); // Contoh: mengarahkan ke halaman detail posting

        // Redirect pengguna ke URL yang ingin Anda bagikan
        return response()->json(['share_url' => $shareURL]);
    }


}
