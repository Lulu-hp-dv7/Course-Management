<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected $fillable = [
        'date',
        'startTime',
        'endTime'
    ];

    public function classrooms(){
        return $this->belongsToMany(Classroom::class);
    }
}
