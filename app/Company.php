<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

     
    protected $fillable = [
        'company_name', 'designation', 'from_month','from_year', 'to_month', 'to_year','job_type', 'user_id'
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
