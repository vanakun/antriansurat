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

        $pdf = PDF::loadView('pages.cetak', compact('step', 'experts', 'project'));
        // $pdf->setPaper('A4');
        return $pdf->stream($filename);
    }
}
