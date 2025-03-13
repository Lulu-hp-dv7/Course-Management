<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UE extends Model
{
    protected $fillable = [
        'code',
        'name_ue',
        'credit',
        'hCM',
        'hTD',
        'hTP',
        'semester_id'
    ];

    public function semester() {
        return $this->belongsTo(Semester::class);
    }
}
