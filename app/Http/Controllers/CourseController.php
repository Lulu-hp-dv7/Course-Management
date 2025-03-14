<?php

namespace App\Http\Controllers;

use App\Http\Requests\course\CourseStoreRequest;
use App\Http\Requests\course\CourseUpdateRequest;
use App\Models\Course;
use App\Models\UE;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy("created_at", 'desc')->paginate(20);
        return view("admin.courses.index", compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.form')->with([
            'course' => new Course(),
            'ues' => UE::pluck('name_ue','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->Validated());
        $course->ues()->sync($request->validated('ues'));

        return redirect()->route('admin.course.index')
            ->with('success', 'Le cours a bien été Créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.view')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.form')->with([
            'course' => $course,
            'ues' => UE::pluck('name_ue','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->update($request->Validated());
        $course->ues()->sync($request->validated('ues'));

        return redirect()->route('admin.course.index')
            ->with('success', 'Le cours a bien été Créé.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.course.index')
            ->with('success', 'Le cours a bien été Sppurimée.');
    }
}
