<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'code_class',
        'type_class',
        'capacity',
        'building_id'
    ];

    public function building() {
        return $this->belongsTo(Building::class);
    }

    public function timeslots(){
        return $this->belongsToMany(Timeslot::class);
    }
}
