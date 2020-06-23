<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = "meeting";

    protected $fillable = [
      'id','title','date','place','type'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function comittee()
    {
        return $this->belongsTo('App\Comittee');
    }
}
