<?php

use App\Http\Controllers\CycleController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UEController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layout');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('cycle', CycleController::class);
    Route::resource('level', LevelController::class);
    Route::resource('ue', UEController::class);
    Route::resource('sector', SectorController::class);
    Route::resource('speciality', SpecialityController::class);
    Route::post('cycle-import', [CycleController::class, 'import'])->name('cycle.import');
    Route::get('cycle-export', [CycleController::class, 'export'])->name('cycle.export');
    Route::post('ue-import', [UEController::class, 'import'])->name('ue.import');
    Route::get('ue-export', [UEController::class, 'export'])->name('ue.export');
});
