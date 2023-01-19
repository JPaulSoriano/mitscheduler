<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name'
    ];

    public function building(){
        return $this->belongsTo('App\Building');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
