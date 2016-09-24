<?php

namespace ESCOJ;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    //
    protected $fillable = [
        'name','author','start_date' 'end_date','description','acces_type','penalization','frozen_time','offcontest','offcontes_start_date','offcontest_end_date','offcontest_penalization',
    ];



    //building relationships

    public function users(){
        return $this->belongsToMany('ESCOJ\User');
    }

    public function problems(){
        return $this->belongsToMany('ESCOJ\Problem');
    }
}
