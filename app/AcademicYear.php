<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $fillable = [
        'name', 'status'
    ];

    public function sections(){
        return $this->hasMany('App\Section');
    }
}
