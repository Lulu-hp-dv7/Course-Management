<?php

namespace App\Http\Controllers;

use App\Http\Requests\level\LevelStoreRequest;
use App\Models\Cycle;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::orderBy("name", 'asc')->paginate(20);
        return view("admin.levels.index", ["levels" => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.levels.form', [
            'level' => new Level(),
            'cycles'=> Cycle::select('id', 'name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelStoreRequest $request)
    {
        Level::create($request->validated());
        
        return redirect()->route('admin.level.index')
            ->with('success', 'Le niveau a bien été Créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        return view('admin.levels.view', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        $cycles = Cycle::pluck('name','id');
        return view('admin.levels.form', compact('level', 'cycles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $level->update($request->validate([
            'name' => 'required|min:4',
            'number' => 'required|integer|min:0',
            'cycle_id' => 'exists:cycles,id|required'
        ]));

        return redirect()->route('admin.level.index')
            ->with('success', 'level updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
         $level->delete();

        return redirect()->route('admin.level.index')
            ->with('success', 'Le Niveau a bien été Supprimée');
    }
}
