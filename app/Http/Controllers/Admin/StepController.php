<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Step;
use App\Models\StepMedia;
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
        $project = Project::find($projectId);

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
        
        return redirect()->route('projectShow', $project->id);
    }

    public function show(Step $step)
    {   
        $project_id = $step->project_id;
        $project = Project::findOrFail($project_id);
        $experts = $step->experts;
        $stepMedia = StepMedia::all();
        $experts = $step->experts;
        //dd($step);
        
        return view('pages.admin.showStep', compact('step', 'experts', 'project', 'stepMedia'));
    }

    

    public function addToStep($stepId)
    {
        $step = Step::find($stepId);
        //dd($step);
        $tenagaahliUsers = User::where('role', 'Tenagaahli')->get();
        //dd($tenagaahliUsers);

        if (auth()->user()->role === 'Tenagaahli') {
            return view('pages/tenagaahli/add-expert', ['step' => $step,'tenagaahliUsers' => $tenagaahliUsers]);
        } if (auth()->user()->role === 'Admin') {
            return view('pages/admin/add-tahap-tostep', ['step' => $step,'tenagaahliUsers' => $tenagaahliUsers]);
        }
        

        return view('pages/admin/add-tahap-tostep', ['step' => $step,'tenagaahliUsers' => $tenagaahliUsers]);
    }

    public function storeExpert(Request $request, $stepId)
    {
        $user = auth()->user();

        $step = Step::find($stepId);

        // Validasi input
        $data = $request->validate([
            'expert_id' => 'required|exists:users,id',
        ]);

        $data['step_id'] = $stepId;

        // Periksa apakah tenaga ahli sudah terkait dengan langkah
        if ($step->experts()->where('users.id', $data['expert_id'])->exists()) {
            return redirect()->route('showStep', $step->id)->with('error', 'Tenaga ahli tersebut sudah terkait dengan langkah ini.');
        }

        $step->experts()->attach($data['expert_id']);

        if ($user->role === 'Admin') {
            return redirect()->route('showSteps', $step->id)->with('success', 'Tenaga ahli berhasil ditambahkan ke langkah.');
        } else if ($user->role === 'Tenagaahli') {
            return redirect()->route('stepProject', $step->id)->with('success', 'Tenaga ahli berhasil ditambahkan ke langkah.');
        }
    }

    public function approveStep($id, $action)
    {
        $step = Step::find($id);

        if (!$step) {
            return abort(404); // Tindakan jika langkah tidak ditemukan
        }

        if ($action === 'approve') {
            $step->update(['status' => 1]); // Mengubah status menjadi approved
        } elseif ($action === 'reject') {
            $step->update(['status' => 3]); // Mengubah status menjadi rejected
        }

        return redirect()->back()->with('success', 'Status langkah berhasil diubah');
    }

}
