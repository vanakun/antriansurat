<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;

class StepController extends Controller
{
    public function create($projectId)
    {
        $project = Project::find($projectId);

        $tenagaahliUsers = User::where('role', 'tenagaahli')->get();

        return view('pages.admin.createTahap', ['project' => $project, 'tenagaahliUsers' => $tenagaahliUsers]);
    }


    public function store(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            // Handle jika proyek tidak ditemukan
        }

        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'fotorapat' => 'required|string',
            'berkaspdukung' => 'required|string',
            'user_id' => 'required|exists:users,id', // Pastikan user (tenaga ahli) dengan ID yang sesuai ada dalam tabel users
        ]);

        // Buat instance Step
        $step = new Step;
        $step->nama = $request->input('nama');
        $step->fotorapat = $request->input('fotorapat');
        $step->berkaspdukung = $request->input('berkaspdukung');
        $step->user_id = $request->input('user_id');

        // Simpan tahap dengan menghubungkannya dengan proyek yang sesuai
        $project->steps()->save($step);

        return redirect()->route('projectShow', $id);
    }
}
