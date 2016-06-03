<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

	public function categories()
    {
    	return $this->belongsTo('App\Project_cat');
    }

    public function getActive()
    {
    	return $this->published()->get();
    }
    
    public function scopePublished($query)
    {
    	$query->where(['active'=>1]);
    }
}
