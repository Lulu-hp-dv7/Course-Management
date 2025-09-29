<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\UEController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('login', [AuthController::class, 'signin'])->name('signin');
Route::delete('logout', [AuthController::class, 'logout'])
->middleware('auth')    
->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('cycle', CycleController::class);
    Route::resource('level', LevelController::class);
    Route::resource('ue', UEController::class);
    Route::resource('sector', SectorController::class);
    Route::resource('speciality', SpecialityController::class);
    Route::resource('course', CourseController::class);
    Route::resource('classroom', ClassroomController::class);
    Route::resource('building', BuildingController::class);
    Route::resource('timeslot', TimeslotController::class)->except('show');
    Route::post('cycle-import', [CycleController::class, 'import'])->name('cycle.import');
    Route::get('cycle-export', [CycleController::class, 'export'])->name('cycle.export');
    Route::post('ue-import', [UEController::class, 'import'])->name('ue.import');
    Route::get('ue-export', [UEController::class, 'export'])->name('ue.export');
    Route::post('course-import', [CourseController::class, 'import'])->name('course.import');
    Route::get('course-export', [CourseController::class, 'export'])->name('course.export');
    Route::post('sector-import', [SectorController::class, 'import'])->name('sector.import');
    Route::get('sector-export', [SectorController::class, 'export'])->name('sector.export');
    Route::post('classroom-import', [ClassroomController::class, 'import'])->name('classroom.import');
    Route::get('classroom-export', [ClassroomController::class, 'export'])->name('classroom.export');
    Route::post('building-import', [ClassroomController::class, 'import'])->name('building.import');
    Route::get('building-export', [ClassroomController::class, 'export'])->name('building.export');
});
