<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'course_id', 'year', 'name'
    ];

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
