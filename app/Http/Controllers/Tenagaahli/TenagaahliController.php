<?php

namespace App\Http\Controllers\Tenagaahli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Step;

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

        return view ('pages/tenagaahli/show-step', compact('step', 'experts'));
    }
}
