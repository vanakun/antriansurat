<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Step;
use Carbon\Carbon;

class StepController extends Controller
{
    public function create($projectId)
    {
        $project = Project::find($projectId);
        
        $tenagaahliUsers = User::where('role', 'Tenagaahli')->get();
        //dd($tenagaahliUsers);
        return view('pages.admin.createTahap', ['project' => $project, 'tenagaahliUsers' => $tenagaahliUsers]);
    }


    public function store(Request $request, $projectId)
    {

        // Validasi input
        $data = $request->validate([
            'tahap' => 'required|string',
            'nama' => 'required|string',
            'keterangan' => 'required|string',
            'user_id' => 'required|exists:users,id', // Pastikan user (tenaga ahli) dengan ID yang sesuai ada dalam tabel users
        ]);

        $data['project_id'] = $projectId;

        //dd($data);
        Step::create($data);
        
        return redirect()->route('projectIndex');
    }
}
