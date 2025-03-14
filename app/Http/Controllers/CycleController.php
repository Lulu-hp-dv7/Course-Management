<?php

namespace App\Http\Controllers;

use App\Http\Requests\cycle\CycleUpdateRequest;
use App\Http\Requests\cycle\CycleStoreRequest;
use App\Models\Cycle;
use App\Models\Level;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CycleController extends Controller
{
    public function export()
    {
        $cycles = Cycle::all();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Description');

        // Populate the data
        $rowNumber = 2;
        foreach ($cycles as $cycle) {
            $sheet->setCellValue('A' . $rowNumber, $cycle->name);
            $sheet->setCellValue('B' . $rowNumber, $cycle->description);
            $rowNumber++;
        }

        // Create a writer and save the file to a temporary location
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        $fileName = 'cycles_export_' . date('Y-m-d_H-i-s') . '.xlsx';
        $tempFilePath = sys_get_temp_dir() . '/' . $fileName;
        $writer->save($tempFilePath);

        // Return the file as a download response
        return Response::download($tempFilePath, $fileName)->deleteFileAfterSend(true);
    }

    public function import(Request $request)
    {
        // Handle the import logic here
        
        if ($request->hasFile('csv_file')) {

            $request->validate([
                'csv_file' => 'required|mimes:csv,xlsx,txt|max:2048',
            ]);

            $file = $request->file('csv_file');

            // Process the file and import data
            // reading of document
            $spreadsheet = IOFactory::load($file->getPathname());
            // get sheet 2 of document
            $sheet1 = $spreadsheet->getSheet(0);
            //dd($sheet1->getTitle());
            $dataSheet1  = $sheet1->toArray();
            
            //dd($dataSheet1);

            //dd($dataSheet1 );
            $nb_level_max = 0;
            // LECTURE DES TUPLES SUR EXCEL
            foreach ($dataSheet1  as $key => $row) {
                if ($key == 0) {
                    continue;
                }
                if ($nb_level_max <  $row[3]) {
                    $nb_level_max = $row[3];
                }
                Cycle::create([
                    'code' => $row[0],
                    'name' => $row[1],
                    'description' => $row[2],
                    'nb_level' => $row[3]
                ]);
                $index = Cycle::where('code', $row[0])->firstOrFail()->getAttribute('id');
                for ($i=1; $i <= $row[3]; $i++) { 
                    Level::create([
                        'name'=> $row[0] .' '. $i, 
                        'number'=> $i,
                        'cycle_id'=> $index
                    ]);
                }
            }
            for ($i=1; $i <= $nb_level_max * 2; $i++) { 
                Semester::create([
                    'name_sem'=> 'Semestre '. $i, 
                ]);
            }
            return redirect()->route('admin.cycle.index')
                ->with('success', 'Data imported successfully');
        }

        return redirect()->route('admin.cycle.index')
            ->with('error', 'No file uploaded');
    }
   
    public function index()
    {
        $cycles = Cycle::orderBy("created_at", 'desc')->paginate(20);
        return view("admin.cycles.index", ["cycles" => $cycles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cycles.form', [
            'cycle' => new Cycle(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CycleStoreRequest $request)
    {

        Cycle::create($request->validated());
        
        return redirect()->route("admin.cycle.index")
            ->with('success', 'Cycle créer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cycle $cycle)
    {
        return view('admin.cycles.view', compact('cycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cycle $cycle)
    {
        return view('admin.cycles.form', compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CycleUpdateRequest $request, Cycle $cycle)
    {
        $cycle->update($request->validated());

        return redirect()->route('admin.cycle.index')
            ->with('success', 'cycle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cycle $cycle)
    {
        $cycle->delete();

        return redirect()->route('admin.cycle.index')
            ->with('success', 'Le Cycle a bien été Supprimée');
    }
}
