<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name_sem',
    ];
    public function ues() {
        return $this->hasMany(UE::class);
    }
}
