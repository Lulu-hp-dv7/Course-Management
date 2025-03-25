<?php

namespace App\Http\Controllers;

use App\Http\Requests\classroom\ClassroomRequest;
use App\Models\Building;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.classroom.index', compact('classrooms'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::pluck('code_build','id');
        return view('admin.classroom.form')->with(
            [
                'classroom' => new Classroom(),
                'buildings' => $buildings
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        Classroom::create($request->validated());
        
        return redirect()->route("admin.classroom.index")
            ->with('success', 'Batiment créer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        return view('admin.classroom.view', compact('classrooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        return view('admin.classroom.form', compact('classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->validated());
        
        return redirect()->route("admin.classroom.index")
            ->with('success', 'Batiment modifié avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route("admin.classroom.index")
            ->with('success', 'Batiment supprimé avec succes');
    }
}
