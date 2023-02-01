<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'teacher_id', 'subject_id', 'room_id', 'time_start', 'time_end', 'day'
    ];

    public function section(){
        return $this->belongsTo('App\Section');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    public function room(){
        return $this->belongsTo('App\Room');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
}
