<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = [
        'code_sp',
        'name_sp',
        'desc_sp',
        'type',
        'hCM',
        'hTD',
        'hTP',
        'sector_id'
    ];

    public function sector() {
        return $this->belongsTo(Sector::class);
    } 
}
