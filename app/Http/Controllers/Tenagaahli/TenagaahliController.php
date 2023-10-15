<?php

namespace App\Http\Controllers\Tenagaahli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

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
        return view ('pages/tenagaahli/show', compact('project'));
    }
}
