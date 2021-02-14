<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function company(){
        // one to many
        return $this->belongsTo('App\Company');
    }
}