<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = [
        'period', 'level', 'code', 'name', 'lec', 'lab', 'units', 'specialization_id'
    ];

    public function curriculum(){
        return $this->belongsTo('App\Curriculum');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function specialization(){
        return $this->belongsTo('App\Specialization');
    }
}
