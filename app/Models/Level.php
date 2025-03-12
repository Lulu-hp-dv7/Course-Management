<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name', 
        'number',
        'cycle_id'
    ];

    public function cycle() {
        return $this->belongsTo(Cycle::class);
    }
}
