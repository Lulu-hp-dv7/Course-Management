<?php

use App\Http\Controllers\CycleController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layout');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('cycle', CycleController::class);
    Route::resource('level', LevelController::class);
    Route::post('cycle-import', [CycleController::class, 'import'])->name('cycle.import');
    Route::get('cycle-export', [CycleController::class, 'export'])->name('cycle.export');
});
