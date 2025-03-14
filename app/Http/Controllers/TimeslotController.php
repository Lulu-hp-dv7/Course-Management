<?php

namespace App\Http\Controllers;

use App\Http\Requests\timeslot\timeslotRequest;
use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeslots = Timeslot::orderBy("name", 'asc')->paginate(20);
        return view("admin.timeslots.index", ["timeslots" => $timeslots]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.timeslots.form", ["timeslot" => new Timeslot()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(timeslotRequest $request)
    {
        Timeslot::create($request->validated());
        
        return redirect()->route('admin.timeslot.index')
            ->with('success', 'Le Créneau a bien été Créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Timeslot $timeslot)
    {
        return view('admin.timeslots.view', compact('timeslot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timeslot $timeslot)
    {
        return view('admin.timeslots.form', compact( 'timeslot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(timeslotRequest $request, Timeslot $timeslot)
    {
        $timeslot->update($request->validated());

        return redirect()->route('admin.timeslot.index')
            ->with('success', 'Le Créneau a bien été Modifié.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timeslot $timeslot)
    {
        $timeslot->delete();

        return redirect()->route('admin.timeslot.index')
            ->with('success', 'Le Creneau a bien été Supprimé');
    }
}
