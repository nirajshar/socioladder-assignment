<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill_name', 'proficiency', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
