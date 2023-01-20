<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'name'
    ];

    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
}
