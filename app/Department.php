<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name'
    ];

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }
}
