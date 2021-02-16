<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded= [];
    public function jobs(){
        // one to many inverse
        return $this->hasMany('App\Job');
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}