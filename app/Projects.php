<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function getActive()
    {
    	return $this->published()->get();
    }
    public function scopePublished($query)
    {
    	$query->where(['active'=>1]);
    }
}
