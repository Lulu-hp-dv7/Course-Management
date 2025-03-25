<?php

namespace App\Http\Controllers;

use App\Http\Requests\sector\SectorStoreRequest;
use App\Models\Level;
use App\Models\Sector;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SectorController extends Controller
{
    public function export()
    {}
    public function import(Request $request, SectorController $requestS)
    {
        
        if ($request->hasFile('csv_file')) {
            $request->validate([
                'csv_file' => 'required|mimes:csv,xlsx,txt|max:2048'
            ]);

            $file = $request->file('csv_file');

            // Process the file and import data
            // reading of document
            $spreadsheet = IOFactory::load($file->getPathname());
            // get sheet (Feuille) 2 of document
            $sheet2 = $spreadsheet->getSheet(1);
            // convert to array of ligne (TUPLE) (Feuille) 1 of document
            $dataSheet  = $sheet2->toArray();
            // dd($dataSheet);
            foreach ($dataSheet  as $key => $row) {
                if ($key == 0) {
                    continue;
                }
                $sector = Sector::create([
                    'code_sec' => $row[0],
                    'name_sec' => $row[1],
                    'desc_sec' => $row[2]
                ]);
            }
            return redirect()->route("admin.sector.index")
            ->with('success', 'Importation avec succès');
        }
        return redirect()->route("admin.sector.index")
            ->with('success', 'Echec de l\'importation');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::orderBy("created_at", 'asc')->paginate(10);
        
        return view("admin.sectors.index", [
            "sectors" => $sectors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sectors.form', [
            'sector' => new Sector(),
            'levels' => Level::pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectorStoreRequest $request)
    {

        $sector = Sector::create($request->validated());
        $sector->levels()->sync($request->validated('levels'));
        
        return redirect()->route("admin.sector.index")
            ->with('success', 'La Filière créer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sector $sector)
    {
        return view('admin.sectors.view', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        $levels = Level::pluck('name','id');
        return view('admin.sectors.form', compact(['sector', 'levels']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectorStoreRequest $request, Sector $sector)
    {
        $sector->update($request->validated());
        $sector->levels()->sync($request->validated('levels'));

        return redirect()->route('admin.sector.index')
            ->with('success', 'La Filière modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();

        return redirect()->route('admin.sector.index')
            ->with('success', 'La filière a bien été Supprimée');
    }
}
