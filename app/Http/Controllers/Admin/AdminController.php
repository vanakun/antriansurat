<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Step;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages/perusahaan/dashboard');
    }

    public function indexProject()
    {
        $post = Project::paginate(10);

        $date = Carbon::now();

        $currentDate = $date->format('Y-m-d');
        return view('pages/admin/list-project', compact('post', 'currentDate'));
    }

    public function searchProject(Request $request)
    {
        $search = $request->input('search');

        $post = Project::where('nama', 'like', "%$search%")
            ->orWhere('lokasi', 'like', "%$search%")
            ->orWhere('status', 'like', "%$search%")
            ->paginate(10);

        return view('pages.admin.list-project', compact('post', 'search'));
    }

    public function createProject()
    {
        return view('pages/admin/create');
    }

    public function storeProject(Request $request)
    {
        // Proses penyimpanan data proyek ke dalam database
        $project = new Project;
        $project->nama = $request->input('nama');
        $project->image = $request->input('image');
        $project->lokasi = $request->input('lokasi');
        
        // Periksa apakah input 'status' ada, jika tidak, gunakan nilai default "active"
        $project->status = $request->input('status', 'active');

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('dist/poster_project'), $filename);
            $project->image =  $filename;
        }
    
        $project->save();
    
        return redirect('/project')->with('success', 'Proyek telah berhasil dibuat.');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        //dd($post);
        $steps = Step::where('project_id', $project->id)->get();
        //dd($steps);
        return view ('pages/admin/show', compact('project','steps'));
    }

    public function editProject($id)
    {
        // Temukan proyek yang akan diubah berdasarkan ID
        $project = Project::find($id);
        
        if ($project) {
            return view('pages/admin/edit', compact('project'));
        } else {
            return redirect('/project')->with('error', 'Proyek tidak ditemukan.');
        }
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::find($id);
        
        // dd($request->all());

        if ($project) {
            // Update data proyek
            $project->nama = $request->input('nama');
            $project->lokasi = $request->input('lokasi');

            // Periksa apakah input 'status' ada, jika tidak, gunakan nilai default "active"
            $project->status = $request->input('status', 'active');

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('dist/poster_project'), $filename);
                $project->image = $filename;
            }

            $project->save();

            return redirect('/project')->with('success', 'Proyek telah berhasil diupdate.');
        } else {
            return redirect('/project')->with('error', 'Proyek tidak ditemukan.');
        }
    }

    public function getCurrentTime()
    {
        Carbon::setLocale('id_ID');

        $now = Carbon::now();
        $currentDateTime = $now->format('H:i:s');

        return $currentDateTime;
    }


    public function deleteProject($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/project')->with('error', 'Proyek tidak ditemukan.');
        }

        if (File::exists(public_path($project->image)) && !empty($project->image)) {
            File::delete(public_path($project->image));
        }

        $project->delete();

        return redirect('/project')->with('success', 'Proyek berhasil dihapus.');
    }

    public function delete(Request $request)
    {
        $projectId = $request->input('id');

        // Lakukan logika penghapusan proyek berdasarkan $projectId

        return response()->json(['success' => true]);
    }
}
