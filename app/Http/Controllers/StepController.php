<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;
use App\Models\Project;


class StepController extends Controller
{
    public function showByProject($projectId){
    // Ambil proyek berdasarkan ID
    $project = Project::find($projectId);

    if (!$project) {
        // Handle kasus proyek tidak ditemukan
        // Misalnya, tampilkan pesan error atau redirect ke halaman lain.
    }

    // Ambil tahap yang terkait dengan proyek berdasarkan relasinya
    $steps = $project->steps;

    return view('pages.admin.show', compact('steps', 'project'));
    }

}
