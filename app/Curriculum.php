<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'name', 'year'
    ];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
}
