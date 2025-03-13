<?php

namespace App\Http\Controllers;

use App\Http\Requests\speciality\SpecialityStoreRequest;
use App\Models\Sector;
use App\Models\Semester;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $specialities = Speciality::orderBy("name", 'asc')->paginate(20);
        return view("admin.specialities.index", ["specialities" => $specialities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.specialities.form', [
            'speciality' => new Speciality(),
            'sectors'=> Sector::pluck('name_sec','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecialityStoreRequest $request)
    {
        Speciality::create($request->validated());
        
        return redirect()->route('admin.speciality.index')
            ->with('success', 'Le niveau a bien été Créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Speciality $speciality)
    {
        return view('admin.specialities.view', compact('speciality'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speciality $level)
    {
        $cycles = Sector::pluck('name','id');
        return view('admin.specialities.form', compact('level', 'cycles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speciality $level)
    {
        $level->update($request->validate([
            'name' => 'required|min:4',
            'number' => 'required|integer|min:0',
            'cycle_id' => 'exists:cycles,id|required'
        ]));

        return redirect()->route('admin.speciality.index')
            ->with('success', 'level updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speciality $level)
    {
         $level->delete();

        return redirect()->route('admin.speciality.index')
            ->with('success', 'Le Niveau a bien été Supprimée');
    }
}
