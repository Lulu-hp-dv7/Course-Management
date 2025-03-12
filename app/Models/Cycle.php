<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'nb_level',
    ];

    public function levels()
    {
        return $this->hasMany(Level::class);
    }
}
