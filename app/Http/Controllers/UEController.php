<?php

namespace App\Http\Controllers;

use App\Http\Requests\ue\UEStoreRequest;
use App\Http\Requests\ue\UEUpdateRequest;
use App\Models\Semester;
use App\Models\UE;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Response;

class UEController extends Controller
{
    public function export()
    {
        $ues = UE::all();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'Code');
        $sheet->setCellValue('B1', 'NOM');
        $sheet->setCellValue('C1', 'Crédits');
        $sheet->setCellValue('D1', 'Heures CM');
        $sheet->setCellValue('E1', 'Heures TD');
        $sheet->setCellValue('F1', 'heures TP');
        $sheet->setCellValue('G1', 'Semestre');

        // Populate the data
        $rowNumber = 2;
        foreach ($ues as $ue) {
            $sheet->setCellValue('A' . $rowNumber, $ue->code);
            $sheet->setCellValue('B' . $rowNumber, $ue->name);
            $sheet->setCellValue('C' . $rowNumber, $ue->credit);
            $sheet->setCellValue('D' . $rowNumber, $ue->hCM);
            $sheet->setCellValue('E' . $rowNumber, $ue->hTD);
            $sheet->setCellValue('F' . $rowNumber, $ue->hTP);
            $sheet->setCellValue('G' . $rowNumber, $ue->semester?->name_sem );
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
            $sheet3 = $spreadsheet->getSheet(2);
            //dd($sheet3->getTitle());
            $dataSheet1  = $sheet3->toArray();
            
            //dd($dataSheet1 );
            foreach ($dataSheet1  as $key => $row) {
                if ($key == 0 || $row[0] == '') {
                    continue;
                }
                
                UE::create([
                    'code' => $row[0],
                    'name_ue' => $row[1],
                    'credit' => $row[2],
                    'hCM' => $row[3],
                    'hTD' => $row[4],
                    'hTP' => $row[5]
                ]);
               
            }
            return redirect()->route('admin.ue.index')
                ->with('success', 'Data imported successfully');
        }

        return redirect()->route('admin.ue.index')
            ->with('error', 'No file uploaded');
    }
   
    public function index()
    {
        $ues = UE::orderBy("created_at", 'asc')->paginate(10);
        return view("admin.ues.index", ["ues" => $ues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ues.form', [
            'ue' => new UE(),
            'semesters' => Semester::pluck('name_sem','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UEStoreRequest $request)
    {

        UE::create($request->validated());
        
        return redirect()->route("admin.ue.index")
            ->with('success', 'UE créer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(UE $ue)
    {
        return view('admin.ues.view', compact('ue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UE $ue)
    {
        $semesters = Semester::pluck('name_sem','id');
        return view('admin.ues.form', compact(['ue','semesters' ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UEUpdateRequest $request, UE $ue)
    {
        $ue->update($request->validated());

        return redirect()->route('admin.ue.index')
            ->with('success', 'UE updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UE $ue)
    {
        $ue->delete();

        return redirect()->route('admin.ue.index')
            ->with('success', 'Le UE a bien été Supprimée');
    }
}
