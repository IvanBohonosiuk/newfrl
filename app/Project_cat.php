<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_cat extends Model
{
    public function project()
    {
    	return $this->hasMany('App\Projects');
    }
}
