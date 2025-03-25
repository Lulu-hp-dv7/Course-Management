<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_sec',
        'name_sec',
        'desc_sec',
    ];

    public function levels() {
        return $this->belongsToMany(Level::class);
    }
    public function specialities() {
        return $this->hasMany(Speciality::class);
    } 
}
