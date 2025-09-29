<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Sector;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $cycles = Cycle::orderBy('id', 'desc')->get();
        $cycleCount = Cycle::count(); // Get the total number of cycles
        $sectorCount = Sector::count(); // Get the total number of sectors
        return view("admin.dashboard", compact('cycles', 'cycleCount', 'sectorCount'));
    }
}
