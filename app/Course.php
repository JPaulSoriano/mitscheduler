<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name'
    ];

    public function sections(){
        return $this->hasMany('App\Section');
    }
    public function curricula(){
        return $this->hasMany('App\Curriculum');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }
}
