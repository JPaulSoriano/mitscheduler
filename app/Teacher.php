<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = [
        'lastname', 'firstname', 'mi', 'address', 'gender', 'contactno', 'department_id', 'specialization_id'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function specialization(){
        return $this->belongsTo('App\Specialization');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function getFullNameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->mi}";
    }
}
