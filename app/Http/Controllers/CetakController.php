<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Step;
use App\Models\Project;
use PDF;

class CetakController extends Controller
{
    public function generatePDF($id)
    {
        $step = Step::findOrFail($id);
        $experts = $step->experts;
    
        $project = Project::find($step->project_id);
        
        $timestamp = Carbon::now()->format('mdYHis');
        $filename = $project->nama . '_' . $step->nama . '_' . $timestamp . '.pdf';

        $pdf = PDF::loadView('pages.cetak-step', compact('step', 'experts', 'project'));
        // $pdf->setPaper('A4');
        return $pdf->stream($filename);
    }

    public function cetakPDF($project_id)
    {
        // Mengambil semua tahap (steps) yang memiliki project_id yang sesuai
        $step = Step::where('project_id', $project_id)->get();

        $project = Project::find($project_id);
        
        $timestamp = Carbon::now()->format('mdYHis');
        $filename = $project->nama . '_all_steps_' . $timestamp . '.pdf';

        $pdf = PDF::loadView('pages.cetak', compact('step', 'project'));
        // $pdf->setPaper('A4');
        return $pdf->stream($filename);
    }
}
