<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'course_id', 'name', 'year'
    ];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
