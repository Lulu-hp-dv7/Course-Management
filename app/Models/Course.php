<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'code_course',
        'name_course',
        'type_course',
        'desc_course',
    ];

    public function ues() {
        return $this->belongsToMany(UE::class);
    }
}
