<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'course_id', 'level', 'name', 'academic_year'
    ];

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function academic_year(){
        return $this->belongsTo('App\AcademicYear');
    }
}
