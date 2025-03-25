<?php

namespace App\Http\Controllers;

use App\Http\Requests\building\BuildingRequest;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::orderBy("created_at", 'desc')->paginate(20);
        return view("admin.building.index", compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.building.form')->with('building' ,new Building());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuildingRequest $request)
    {
        Building::create($request->validated());
        
        return redirect()->route("admin.building.index")
            ->with('success', 'Batiment créer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return view('admin.building.view', compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        return view('admin.building.form', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BuildingRequest $request, Building $building)
    {
        $building->update($request->validated());
        
        return redirect()->route("admin.building.index")
            ->with('success', 'Batiment créer avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->delete();
        
        return redirect()->route("admin.building.index")
            ->with('success', 'Batiment Supprimé avec succes');
    }
}
