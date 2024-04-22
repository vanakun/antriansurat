<?php

namespace App\Http\Controllers\Perusahaan;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurnal;

class JurnalController extends Controller
{
    public function indexjurnal()
    {
        
       
        return view('pages.perusahaan.jurnal.list-project');
    }

    public function createjurnal()
    {
        return view('pages.perusahaan.jurnal.create');
    }

    public function storeJurnal(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
        ]);

        jurnal::create($request->all());

        $jurnal = Jurnal::all();
        return view('pages.perusahaan.jurnal.list-project', compact('jurnal'));
    }

    public function edit(jurnal $jurnal)
    {
        return view('jurnals.edit', compact('jurnal'));
    }

    public function update(Request $request, jurnal $jurnal)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
        ]);

        $jurnal->update($request->all());

        return redirect()->route('jurnals.index')
            ->with('success', 'jurnal updated successfully');
    }

    public function destroy(jurnal $jurnal)
    {
        $jurnal->delete();

        return redirect()->route('jurnals.index')
            ->with('success', 'jurnal deleted successfully');
    }
}
