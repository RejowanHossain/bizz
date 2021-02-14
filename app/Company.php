<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function jobs(){
        // one to many inverse
        return $this->hasMany('App\Jobs');
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}